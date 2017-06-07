<?php
namespace Discord\OAuth2\Client\Provider\Entity;

use Discord\OAuth2\Client\Provider\ValueObject\VoiceChannelName;
use Discord\OAuth2\Client\Provider\ValueObject\ChannelType;
use Discord\OAuth2\Client\Provider\ValueObject\GuildName;
use Discord\OAuth2\Client\Provider\ValueObject\UserDiscriminator;
use Discord\OAuth2\Client\Provider\ValueObject\UserName;

/**
 * Class Invite
 * @package Discord\OAuth2\Client\Provider\Entity
 * @author Dominik Szymański <toja@chonsser.me>
 */
class Invite
{
    /**
     * @var UserName
     */
    private $inviter_username;

    /**
     * @var UserDiscriminator
     */
    private $inviter_discriminator;

    /**
     * @var int
     */
    private $inviter_id;

    /**
     * @var ?string
     */
    private $inviter_avatar;

    /**
     * @var string
     */
    private $code;

    /**
     * @var ?string
     */
    private $guild_splash;

    /**
     * @var int
     */
    private $guild_id;

    /**
     * @var ?string;
     */
    private $guild_icon;

    /**
     * @var GuildName
     */
    private $guild_name;

    /**
     * @var ChannelType
     */
    private $channel_type;

    /**
     * @var int
     */
    private $channel_id;

    /**
     * @var VoiceChannelName
     */
    private $channel_name;

    /**
     * @return UserName
     */
    public function getInviterUsername(): UserName
    {
        return $this->inviter_username;
    }

    /**
     * @param UserName $inviter_username
     *
     * @return $this
     */
    public function setInviterUsername(UserName $inviter_username)
    {
        $this->inviter_username = $inviter_username;
        return $this;
    }

    /**
     * @return UserDiscriminator
     */
    public function getInviterDiscriminator(): UserDiscriminator
    {
        return $this->inviter_discriminator;
    }

    /**
     * @param UserDiscriminator $inviter_discriminator
     *
     * @return $this
     */
    public function setInviterDiscriminator(UserDiscriminator $inviter_discriminator)
    {
        $this->inviter_discriminator = $inviter_discriminator;
        return $this;
    }

    /**
     * @return int
     */
    public function getInviterId(): int
    {
        return $this->inviter_id;
    }

    /**
     * @param int $inviter_id
     *
     * @return $this
     */
    public function setInviterId(int $inviter_id)
    {
        $this->inviter_id = $inviter_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInviterAvatar()
    {
        return $this->inviter_avatar;
    }

    /**
     * @param mixed $inviter_avatar
     *
     * @return $this
     */
    public function setInviterAvatar($inviter_avatar)
    {
        $this->inviter_avatar = $inviter_avatar;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode(string $code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGuildSplash()
    {
        return $this->guild_splash;
    }

    /**
     * @param mixed $guild_splash
     *
     * @return $this
     */
    public function setGuildSplash($guild_splash)
    {
        $this->guild_splash = $guild_splash;
        return $this;
    }

    /**
     * @return int
     */
    public function getGuildId(): int
    {
        return $this->guild_id;
    }

    /**
     * @param int $guild_id
     *
     * @return $this
     */
    public function setGuildId(int $guild_id)
    {
        $this->guild_id = $guild_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGuildIcon()
    {
        return $this->guild_icon;
    }

    /**
     * @param mixed $guild_icon
     *
     * @return $this
     */
    public function setGuildIcon($guild_icon)
    {
        $this->guild_icon = $guild_icon;
        return $this;
    }

    /**
     * @return GuildName
     */
    public function getGuildName(): GuildName
    {
        return $this->guild_name;
    }

    /**
     * @param GuildName $guild_name
     *
     * @return $this
     */
    public function setGuildName(GuildName $guild_name)
    {
        $this->guild_name = $guild_name;
        return $this;
    }

    /**
     * @return ChannelType
     */
    public function getChannelType(): ChannelType
    {
        return $this->channel_type;
    }

    /**
     * @param ChannelType $channel_type
     *
     * @return $this
     */
    public function setChannelType(ChannelType $channel_type)
    {
        $this->channel_type = $channel_type;
        return $this;
    }

    /**
     * @return int
     */
    public function getChannelId(): int
    {
        return $this->channel_id;
    }

    /**
     * @param int $channel_id
     *
     * @return $this
     */
    public function setChannelId(int $channel_id)
    {
        $this->channel_id = $channel_id;
        return $this;
    }

    /**
     * @return VoiceChannelName
     */
    public function getChannelName(): VoiceChannelName
    {
        return $this->channel_name;
    }

    /**
     * @param VoiceChannelName $channel_name
     *
     * @return $this
     */
    public function setChannelName(VoiceChannelName $channel_name)
    {
        $this->channel_name = $channel_name;
        return $this;
    }
}