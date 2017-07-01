<?php
namespace Discord\OAuth2\Client\Provider;

use Discord\OAuth2\Client\Provider\Entity\Guild;
use Discord\OAuth2\Client\Provider\Entity\Invite;
use Discord\OAuth2\Client\Provider\Enum\ErrorCode;
use Discord\OAuth2\Client\Provider\Exception\ApiException;
use Discord\OAuth2\Client\Provider\Exception\MissingBotException;
use Discord\OAuth2\Client\Provider\Exception\RatelimitException;
use Discord\OAuth2\Client\Provider\Entity\User;
use Discord\OAuth2\Client\Provider\Enum\Scope;
use Discord\OAuth2\Client\Provider\Exception\UnknownInviteException;
use Discord\OAuth2\Client\Provider\ValueObject\VoiceChannelName;
use Discord\OAuth2\Client\Provider\ValueObject\TextChannelName;
use Discord\OAuth2\Client\Provider\ValueObject\ChannelType;
use Discord\OAuth2\Client\Provider\ValueObject\EmailAddress;
use Discord\OAuth2\Client\Provider\ValueObject\GuildName;
use Discord\OAuth2\Client\Provider\ValueObject\UserDiscriminator;
use Discord\OAuth2\Client\Provider\ValueObject\UserName;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

/**
 * Represents Discord's OAuth2 provider
 * @author Dominik Szymański <toja@chonsser.me>
 */
class Discord extends AbstractProvider
{
    /**
     * @var string API_VERSION Discord's API version
     * @var string API_URL Discord's API url
     */
    const
        API_VERSION = 'v1',
        API_URL = 'https://discordapp.com/api/' . self::API_VERSION;

    /**
     * {@inheritdoc}
     */
    public function getBaseAuthorizationUrl()
    {
        return self::API_URL . '/oauth2/authorize';
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        return self::API_URL . '/oauth2/token';
    }

    /**
     * {@inheritdoc}
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return self::API_URL . '/users/@me';
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultScopes()
    {
        return Scope::DEFAULT_SCOPES;
    }

    /**
     * @inheritDoc
     */
    protected function getScopeSeparator()
    {
        return ' ';
    }

    /**
     * {@inheritdoc}
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        if ($response->getStatusCode() === 429) {
            throw new RatelimitException('Globally: ' . ($data['global'] ? 'yes' : 'no'));
        }

        if ($response->getStatusCode() === 401) {
            throw new ApiException('Unauthorized');
        }

        if (isset($data['error']) === true) {
            throw new ApiException('Discord API exception: ' . $data['error']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthorizationHeaders($token = null)
    {
        return [
            'Authorization' => 'Bearer ' . $token->getToken(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        $user = new User();

        $user
            ->setAccessToken($token);

        if (array_key_exists('id', $response) === true &&
            array_key_exists('username', $response) === true
        ) { // Has 'identify' scope
            $user
                ->setId($response['id'])
                ->setUsername(new UserName($response['username']))
                ->setDiscriminator(new UserDiscriminator((string)$response['discriminator']))
                ->setAvatar($response['avatar'])
                ->setBot(array_key_exists('bot', $response) ? $response['bot'] : false)
                ->setMfaEnabled($response['mfa_enabled']);
        }

        if (array_key_exists('email', $response) === true && $response['email'] !== null) { // Has 'email' scope
            $user
                ->setEmail(new EmailAddress($response['email']))
                ->setVerified($response['verified']);
        }

        $guilds = $this->getParsedResponse(
            self::getAuthenticatedRequest(
                'GET',
                self::API_URL . '/users/@me/guilds',
                $token
            )
        );

        foreach ($guilds as $key => $guild) {
            if($guild['id'] !== null){
                $_guild = new Guild();

                $_guild
                    ->setId($guild['id'])
                    ->setName(new GuildName($guild['name']))
                    ->setIcon($guild['icon'])
                    ->setOwner($guild['owner'])
                    ->setPermissions($guild['permissions']);

                $user->addGuild($_guild);
            }
        }

        return $user;
    }

    /**
     * @param User $user
     *
     * @deprecated Inaccessible api (such scope doesn't exists. Thanks @discord)
     */
    public function fetchUser(User $user)
    {
        $this->getParsedResponse(self::getAuthenticatedRequest(
            'PATCH',
            self::API_URL . '/users/@me',
            $user->getAccessToken(),
            [
                'body' => json_encode([
                    'username' => (string)$user->getUsername(),
                    'avatar' => $user->getAvatar()
                ])
            ]
        ));
    }

    /**
     * @param User $user
     * @param string $code
     *
     * @return Invite
     * @throws MissingBotException
     * @throws UnknownInviteException
     */
    public function acceptInvite(User $user, string $code)
    {
        $response = $this->getParsedResponse(self::getAuthenticatedRequest(
            'POST',
            self::API_URL . '/invites/' . $code,
            $user->getAccessToken(),
            [
                'body' => json_encode([
                    'username' => (string)$user->getUsername(),
                    'avatar' => $user->getAvatar()
                ])
            ]
        ));

        switch ((int)$response['code']) {
            case ErrorCode::UNKNOWN_INVITE:
                throw new UnknownInviteException("Unknown invite code");
            case ErrorCode::MISSING_BOT:
                throw new MissingBotException("Bot's missing on the server");
        }

        if ((int)$response['code'] === ErrorCode::UNKNOWN_INVITE) {
            throw new UnknownInviteException("Unknown invite code");
        }

        $invite = new Invite();

        $channel_type = new ChannelType($response['channel']['type']);

        $invite
            ->setInviterAvatar($response['inviter']['avatar'])
            ->setInviterDiscriminator(new UserDiscriminator((string)($response['inviter']['discriminator'])))
            ->setInviterId($response['inviter']['id'])
            ->setInviterAvatar($response['inviter']['avatar'])
            ->setCode($response['code'])
            ->setGuildSplash($response['guild']['splash'])
            ->setGuildId($response['guild']['id'])
            ->setGuildIcon($response['guild']['icon'])
            ->setGuildName(new GuildName($response['guild']['name']))
            ->setChannelType($channel_type)
            ->setChannelId($response['channel']['id'])
            ->setChannelName(
                (string)$channel_type === $channel_type::TEXT_CHANNEL ?
                    new TextChannelName($response['channel']['name']) :
                    new VoiceChannelName($response['channel']['name'])
            );

        return $invite;
    }
}
