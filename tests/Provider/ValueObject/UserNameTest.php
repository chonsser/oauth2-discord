<?php
namespace Discord\OAuth2\Client\Tests\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidUserNameException;
use Discord\OAuth2\Client\Provider\ValueObject\UserName;
use PHPUnit\Framework\TestCase;

/**
 * Class UserNameTest
 * @covers \Discord\OAuth2\Client\Provider\ValueObject\UserName
 * @package Discord\OAuth2\Client\Tests\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
class UserNameTest extends TestCase
{
    public function testCanBeCreatedByValidUserName(){
        $this->assertInstanceOf(
            UserName::class,
            new UserName("me")
        );

        $this->assertInstanceOf(
            UserName::class,
            new UserName(str_repeat("me", 16))
        );
    }

    public function testCannotBeCreatedByTooLongUsername() {
        $this->expectException(InvalidUserNameException::class);

        new UserName(str_repeat('me', 16) . 'm');
    }

    public function testCannotBeCreatedByTooShortUsername() {
        $this->expectException(InvalidUserNameException::class);

        new UserName('m');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'me',
            new UserName('me')
        );
    }

    public function testIsEqualTo(){
        $name = new UserName('me');

        $this->isTrue($name->isEqualTo(new UserName('me')));
    }
}