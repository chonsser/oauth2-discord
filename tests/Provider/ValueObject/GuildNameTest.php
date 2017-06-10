<?php

namespace Discord\OAuth2\Client\Tests\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidGuildNameException;
use Discord\OAuth2\Client\Provider\ValueObject\GuildName;
use PHPUnit\Framework\TestCase;

/**
 * Class GuildNameTest
 * @covers \Discord\OAuth2\Client\Provider\ValueObject\GuildName
 * @package Discord\OAuth2\Client\Tests\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class GuildNameTest extends TestCase
{
    public function testCanBeCreatedFromValidGuildName()
    {
        $this->assertInstanceOf(
            GuildName::class,
            new GuildName("me")
        );

        $this->assertInstanceOf(
            GuildName::class,
            new GuildName(str_repeat("me", 50))
        );
    }

    public function testCannotBeCreatedFromInt(){
        $this->expectException(InvalidGuildNameException::class);

        new GuildName(1234);
    }

    public function testCannotBeCreatedFromTooLongGuildName()
    {
        $this->expectException(InvalidGuildNameException::class);

        new GuildName(str_repeat("me", 50) . 'm');
    }

    public function testCannotBeCreatedFromTooShortGuildName()
    {
        $this->expectException(InvalidGuildNameException::class);

        new GuildName('m');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'me',
            new GuildName('me')
        );
    }

    public function testIsEqualTo()
    {
        $name = new GuildName('me');

        $this->isTrue($name->isEqualTo(new GuildName('me')));
    }
}
