<?php
namespace Discord\OAuth2\Client\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidUserDiscriminatorException;

/**
 * Class UserDiscriminator
 * @package Discord\OAuth2\Client\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class UserDiscriminator
{
    const
        LENGTH = 4;

    /**
     * @var string
     */
    private $discriminator;

    /**
     * UserDiscriminator constructor.
     *
     * @param $discriminator
     * @throws InvalidUserDiscriminatorException
     */
    public function __construct($discriminator)
    {
        $this->guardDiscriminator($discriminator);

        $this->discriminator = $discriminator;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->discriminator;
    }

    /**
     * @param $discriminator
     *
     * @throws InvalidUserDiscriminatorException
     */
    private function guardDiscriminator($discriminator)
    {
        if (!preg_match('/^\d{4}$/', $discriminator)) {
            throw new InvalidUserDiscriminatorException("Discriminator must consist of 4 numbers");
        }
    }

    /**
     * @param UserDiscriminator $userDiscriminator
     *
     * @return bool
     */
    public function isEqualTo(UserDiscriminator $userDiscriminator)
    {
        return $this->discriminator === (string)$userDiscriminator;
    }
}
