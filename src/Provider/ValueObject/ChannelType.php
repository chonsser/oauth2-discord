<?php
namespace Discord\OAuth2\Client\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidChannelTypeException;

/**
 * Class ChannelType
 * @package Discord\OAuth2\Client\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
class ChannelType
{
    const
        TEXT_CHANNEL = 'text',
        VOICE_CHANNEL = 'voice';

    /**
     * @var string
     */
    private $channel_type;

    /**
     * ChannelType constructor.
     *
     * @param string $channel_type
     */
    public function __construct($channel_type)
    {
        $this->channel_type = $channel_type;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->channel_type;
    }

    /**
     * @param string $channel_type
     *
     * @throws InvalidChannelTypeException
     */
    public function guardChannelType(string $channel_type)
    {
        if ($channel_type !== self::TEXT_CHANNEL || $channel_type !== self::VOICE_CHANNEL) {
            throw new InvalidChannelTypeException(
                "Invalid channel type given. Channel type has to be: 'text' or 'voice'");
        }
    }
}
