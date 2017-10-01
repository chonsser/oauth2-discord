<?php
namespace Discord\OAuth2\Client\Tests\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidUserDiscriminatorException;
use Discord\OAuth2\Client\Provider\ValueObject\UserDiscriminator;
use PHPUnit\Framework\TestCase;

/**
 * Class UserDiscriminatorTest
 * @covers \Discord\OAuth2\Client\Provider\ValueObject\UserDiscriminator
 * @package Discord\OAuth2\Client\Tests\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class UserDiscriminatorTest extends TestCase
{
    public function testCanBeCreatedByValidDiscriminator()
    {
        $this->assertInstanceOf(UserDiscriminator::class, new UserDiscriminator('1234'));
    }

    public function testCannotBeCreatedFromInt(){
        $this->expectException(InvalidUserDiscriminatorException::class);

        new UserDiscriminator(123);
    }

    public function testCannotBeCreatedByTooLongDiscriminator()
    {
        $this->expectException(InvalidUserDiscriminatorException::class);

        new UserDiscriminator('12345');
    }

    public function testCannotBeCreatedByTooShortDiscriminator()
    {
        $this->expectException(InvalidUserDiscriminatorException::class);

        new UserDiscriminator('123');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            '1234',
            new UserDiscriminator('1234')
        );
    }

    public function testIsEqualTo()
    {
        $email = new UserDiscriminator('1234');

        $this->assertTrue($email->isEqualTo(new UserDiscriminator('1234')));
    }
}
