<?php
namespace Discord\OAuth2\Client\Tests\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidVoiceChannelNameException;
use Discord\OAuth2\Client\Provider\ValueObject\VoiceChannelName;
use PHPUnit\Framework\TestCase;

/**
 * Class TextChannelNameTest
 * @covers \Discord\OAuth2\Client\Provider\ValueObject\VoiceChannelName
 * @package Discord\OAuth2\Client\Tests\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class VoiceChannelNameTest extends TestCase
{
    public function testCanBeCreatedFromValidVoiceChannelName()
    {
        $this->assertInstanceOf(
            VoiceChannelName::class,
            new VoiceChannelName("me")
        );

        $this->assertInstanceOf(
            VoiceChannelName::class,
            new VoiceChannelName(str_repeat("me", 50))
        );
    }

    public function testCannotBeCreatedFromTooLongTextChannelName()
    {
        $this->expectException(InvalidVoiceChannelNameException::class);

        new VoiceChannelName(str_repeat("me", 50) . 'm');
    }

    public function testCannotBeCreatedFromTooShortTextChannelName()
    {
        $this->expectException(InvalidVoiceChannelNameException::class);

        new VoiceChannelName('m');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'me',
            new VoiceChannelName('me')
        );
    }

    public function testIsEqualTo(){
        $name = new VoiceChannelName('me');

        $this->isTrue($name->isEqualTo(new VoiceChannelName('me')));
    }
}