<?php
namespace Discord\OAuth2\Client\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidUserNameException;

/**
 * Class UserName
 * @package Discord\OAuth2\Client\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class UserName
{
    const
        MIN_LENGTH = 2,
        MAX_LENGTH = 32;

    /**
     * @var string
     */
    private $user_name;

    /**
     * @param string $user_name
     */
    public function __construct($user_name)
    {
        $this->guardUserName($user_name);

        $this->user_name = $user_name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->user_name;
    }

    /**
     * @param $user_name
     *
     * @throws InvalidUserNameException
     */
    private function guardUserName($user_name)
    {
        if (is_string($user_name) === false) {
            throw new InvalidUserNameException("Username has to be a string");
        }

        $name_length = mb_strlen($user_name);

        if ($name_length > self::MAX_LENGTH) {
            throw new InvalidUserNameException("Username must have less than " . self::MAX_LENGTH . " characters");
        }

        if ($name_length < self::MIN_LENGTH) {
            throw new InvalidUserNameException("Username must have more than " . self::MIN_LENGTH . " characters");
        }
    }

    /**
     * @param UserName $userName
     *
     * @return bool
     */
    public function isEqualTo(UserName $userName)
    {
        return $this->user_name === (string)$userName;
    }
}
