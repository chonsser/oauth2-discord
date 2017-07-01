<?php
namespace Discord\OAuth2\Client\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidVoiceChannelNameException;

/**
 * Class VoiceChannelName
 * @package Discord\OAuth2\Client\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class VoiceChannelName
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
     * @throws InvalidVoiceChannelNameException
     */
    private function guardChannelName($channel_name)
    {
        if(is_string($channel_name) === false){
            throw new InvalidVoiceChannelNameException(
                'Invalid text channel name given. Text channel name has to be a string'
            );
        }

        $name_length = mb_strlen($channel_name);

        if ($name_length > self::MAX_LENGTH) {
            throw new InvalidVoiceChannelNameException("Voice channel name must have less than 100 characters");
        }

        if ($name_length < self::MIN_LENGTH) {
            throw new InvalidVoiceChannelNameException("Voice channel name must have more than 2 characters");
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
