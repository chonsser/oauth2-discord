<?php
namespace Discord\OAuth2\Client\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidChannelNameException;

/**
 * Class TextChannelName
 * @package Discord\OAuth2\Client\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class TextChannelName
{
    const
        MIN_LENGTH = 2,
        MAX_LENGTH = 100;

    /**
     * @var string
     */
    private $channel_name;

    /**
     * @param string $channel_name
     */
    public function __construct($channel_name)
    {
        $this->guardChannelName($channel_name);

        $this->channel_name = $channel_name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->channel_name;
    }

    /**
     * @param $channel_name
     *
     * @throws InvalidChannelNameException
     */
    private function guardChannelName($channel_name)
    {
        if (preg_match('/\s/', $channel_name)) {
            throw new InvalidChannelNameException("Text channel name can't have whitespaces in it");
        }

        $name_length = strlen($channel_name);

        if ($name_length > self::MAX_LENGTH) {
            throw new InvalidChannelNameException("Text channel name must have less than 100 characters");
        }

        if ($name_length < self::MIN_LENGTH) {
            throw new InvalidChannelNameException("Text channel name must have more than 2 characters");
        }
    }

    /**
     * @param VoiceChannelName $channelName
     *
     * @return bool
     */
    public function isEqualTo(VoiceChannelName $channelName)
    {
        return $this->channel_name === (string)$channelName;
    }
}
