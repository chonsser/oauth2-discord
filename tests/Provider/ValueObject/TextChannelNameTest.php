<?php
namespace Discord\OAuth2\Client\Tests\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidTextChannelNameException;
use Discord\OAuth2\Client\Provider\ValueObject\TextChannelName;
use PHPUnit\Framework\TestCase;

/**
 * Class TextChannelNameTest
 * @covers \Discord\OAuth2\Client\Provider\ValueObject\TextChannelName
 * @package Discord\OAuth2\Client\Tests\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class TextChannelNameTest extends TestCase
{
    public function testCanBeCreatedFromValidTextChannelName()
    {
        $this->assertInstanceOf(
            TextChannelName::class,
            new TextChannelName("me")
        );

        $this->assertInstanceOf(
            TextChannelName::class,
            new TextChannelName(str_repeat("me", 50))
        );
    }

    public function testCannotBeCreatedFromInt(){
        $this->expectException(InvalidTextChannelNameException::class);

        new TextChannelName(1234);
    }

    public function testCannotBeCreatedFromTooLongTextChannelName()
    {
        $this->expectException(InvalidTextChannelNameException::class);

        new TextChannelName(str_repeat("me", 50) . 'm');
    }

    public function testCannotBeCreatedFromTooShortTextChannelName()
    {
        $this->expectException(InvalidTextChannelNameException::class);

        new TextChannelName('m');
    }

    public function testCannotBeCreatedFromWhitespacedTextChannelName()
    {
        $this->expectException(InvalidTextChannelNameException::class);

        new TextChannelName('m m');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'me',
            new TextChannelName('me')
        );
    }

    public function testIsEqualTo()
    {
        $name = new TextChannelName('me');

        $this->isTrue($name->isEqualTo(new TextChannelName('me')));
    }
}
