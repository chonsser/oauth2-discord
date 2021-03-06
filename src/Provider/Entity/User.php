<?php
namespace Discord\OAuth2\Client\Provider\Entity;

use Discord\OAuth2\Client\Provider\Collection\GuildCollection;
use Discord\OAuth2\Client\Provider\ValueObject\EmailAddress;
use Discord\OAuth2\Client\Provider\ValueObject\UserDiscriminator;
use Discord\OAuth2\Client\Provider\ValueObject\UserName;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;

/**
 * Class User
 * @package Discord\OAuth2\Client\Provider\Entity
 * @author Dominik Szymański <toja@chonsser.me>
 */
class User implements ResourceOwnerInterface
{
    /**
     * @var string
     * "to stay on the safe place"
     *                  ~ Twitter
     */
    private $id;

    /**
     * @var UserName
     */
    private $username;

    /**
     * @var UserDiscriminator
     */
    private $discriminator;

    /**
     * @var ?string
     */
    private $avatar;

    /**
     * @var bool
     */
    private $bot;

    /**
     * @var bool
     */
    private $mfa_enabled;

    /**
     * @var bool
     */
    private $verified;

    /**
     * @var EmailAddress
     */
    private $email;

    /**
     * @var GuildCollection
     */
    private $guilds;

    /**
     * @var int
     */
    private $flags;

    /**
     * @var int
     */
    private $public_flags;

    /**
     * @var int
     */
    private $premium_type;

    /**
     * @var AccessToken
     */
    protected $access_token;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->guilds = new GuildCollection();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getFlags(): int
    {
        return $this->flags;
    }

    /**
     * @param int $flags
     * @return $this
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;
        return $this;
    }

    /**
     * @return int
     */
    public function getPublicFlags()
    {
        return $this->public_flags;
    }

    /**
     * @param int $flags
     * @return User
     */
    public function setPublicFlags($flags)
    {
        $this->public_flags = $flags;
        return $this;
    }

    /**
     * @return int
     */
    public function getPremiumType()
    {
        return $this->premium_type;
    }

    /**
     * @param int $premiumType
     * @return $this
     */
    public function setPremiumType($premiumType)
    {
        $this->premium_type = $premiumType;
        return $this;
    }

    /**
     * @return UserName
     */
    public function getUsername(): UserName
    {
        return $this->username;
    }

    /**
     * @param UserName $username
     *
     * @return $this
     */
    public function setUsername(UserName $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return UserDiscriminator
     */
    public function getDiscriminator(): UserDiscriminator
    {
        return $this->discriminator;
    }

    /**
     * @param UserDiscriminator $discriminator
     *
     * @return $this
     */
    public function setDiscriminator(UserDiscriminator $discriminator)
    {
        $this->discriminator = $discriminator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     *
     * @return $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBot()
    {
        return $this->bot;
    }

    /**
     * @param bool $bot
     *
     * @return $this
     */
    public function setBot($bot)
    {
        $this->bot = $bot;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMfaEnabled()
    {
        return $this->mfa_enabled;
    }

    /**
     * @param bool $mfa_enabled
     *
     * @return $this
     */
    public function setMfaEnabled($mfa_enabled)
    {
        $this->mfa_enabled = $mfa_enabled;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVerified()
    {
        return boolval($this->verified);
    }

    /**
     * @param bool $verified
     *
     * @return $this
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;
        return $this;
    }

    /**
     * @return EmailAddress
     */
    public function getEmail(): EmailAddress
    {
        return $this->email;
    }

    /**
     * @param EmailAddress $email
     *
     * @return $this
     */
    public function setEmail(EmailAddress $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return GuildCollection
     */
    public function getGuilds(): GuildCollection
    {
        return $this->guilds;
    }

    /**
     * @param Guild $guild
     *
     * @return $this
     */
    public function addGuild(Guild $guild)
    {
        $this->guilds->add($guild);

        return $this;
    }

    /**
     * @param GuildCollection $guilds
     *
     * @return $this
     */
    public function setGuilds(GuildCollection $guilds)
    {
        $this->guilds = $guilds;
        return $this;
    }


    /**
     * @return AccessToken
     */
    public function getAccessToken(): AccessToken
    {
        return $this->access_token;
    }

    /**
     * @param AccessToken $access_token
     *
     * @return $this
     */
    public function setAccessToken(AccessToken $access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id'            => $this->id,
            'username'      => $this->username,
            'discriminator' => $this->discriminator,
            'avatar'        => $this->avatar,
            'flags'         => $this->flags,
            'public_flags'  => $this->public_flags,
            'premium_type'  => $this->premium_type
        ];
    }
}
