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
        if(is_string($discriminator) === false){
            throw new InvalidUserDiscriminatorException("Discriminator has to be a string");
        }
        if (strlen((string)$discriminator) !== self::LENGTH) {
            throw new InvalidUserDiscriminatorException("Discriminator must have 4 chars");
        }
        if (!is_numeric($discriminator)) {
            throw new InvalidUserDiscriminatorException("Discriminator must be numeric");
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
