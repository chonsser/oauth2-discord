<?php
namespace Discord\OAuth2\Client\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidEmailException;

/**
 * Class UserName
 * @package Discord\OAuth2\Client\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class EmailAddress
{
    /**
     * @var string
     */
    private $email;

    /**
     * @param string $email
     */
    public function __construct($email)
    {
        $this->guardEmail($email);

        $this->email = $email;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return $this->email;
    }

    /**
     * @param $email
     *
     * @throws InvalidEmailException
     */
    private function guardEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new InvalidEmailException($email . ' is not a valid email address');
        }
    }

    /**
     * @param EmailAddress $email
     *
     * @return bool
     */
    public function isEqualTo(EmailAddress $email){
        return $this->email == $email->email;
    }
}