<?php
namespace Discord\OAuth2\Client\Tests\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidEmailException;
use Discord\OAuth2\Client\Provider\ValueObject\EmailAddress;
use PHPUnit\Framework\TestCase;

/**
 * Class EmailAddressTest
 * @covers \Discord\OAuth2\Client\Provider\ValueObject\EmailAddress
 * @package Discord\OAuth2\Client\Tests\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class EmailAddressTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress()
    {
        $this->assertInstanceOf(
            EmailAddress::class,
            new EmailAddress("me@example.com")
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidEmailException::class);

        new EmailAddress("invalid");
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'me@example.com',
            new EmailAddress('me@example.com')
        );
    }

    public function testIsEqualTo()
    {
        $email = new EmailAddress('me@example.com');

        $this->isTrue($email->isEqualTo(new EmailAddress('me@example.com')));
    }
}
