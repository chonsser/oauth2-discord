<?php
namespace Discord\OAuth2\Client\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidGuildNameException;

/**
 * Class GuildName
 * @package Discord\OAuth2\Client\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class GuildName
{
    const
        MIN_LENGTH = 2,
        MAX_LENGTH = 100;

    /**
     * @var string
     */
    private $guild_name;

    /**
     * @param string $server_name
     */
    public function __construct($server_name)
    {
        $this->guardGuildName($server_name);

        $this->guild_name = $server_name;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return $this->guild_name;
    }

    /**
     * @param $guild_name
     *
     * @throws InvalidGuildNameException
     */
    private function guardGuildName($guild_name){
        $name_length = strlen($guild_name);

        if($name_length > self::MAX_LENGTH){
            throw new InvalidGuildNameException("Guild name must have less than 100 characters");
        }

        if($name_length < self::MIN_LENGTH) {
            throw new InvalidGuildNameException("Guild name must have more than 2 characters");
        }
    }

    /**
     * @param GuildName $guildName
     *
     * @return bool
     */
    public function isEqualTo(GuildName $guildName){
        return $this->guild_name === (string)$guildName;
    }
}