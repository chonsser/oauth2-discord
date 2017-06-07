<?php
namespace Discord\OAuth2\Client\Tests\Provider\ValueObject;

use Discord\OAuth2\Client\Provider\Exception\ValueObject\InvalidChannelTypeException;
use Discord\OAuth2\Client\Provider\ValueObject\ChannelType;
use PHPUnit\Framework\TestCase;

/**
 * Class ChannelTypeTest
 * @covers \Discord\OAuth2\Client\Provider\ValueObject\ChannelType
 * @package Discord\OAuth2\Client\Tests\Provider\ValueObject
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class ChannelTypeTest extends TestCase
{
    public function testCanBeCreatedFromValidChannelType()
    {
        $this->assertInstanceOf(
            ChannelType::class,
            new ChannelType('text')
        );

        $this->assertInstanceOf(
            ChannelType::class,
            new ChannelType('voice')
        );
    }

    public function testCannotBeCreatedFromInvalidChannelType()
    {
        $this->expectException(InvalidChannelTypeException::class);

        new ChannelType('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'text',
            new ChannelType('text')
        );

        $this->assertEquals(
            'voice',
            new ChannelType('voice')
        );
    }

    public function testIsEqualTo()
    {
        $text = new ChannelType('text');

        $this->isTrue($text->isEqualTo(new ChannelType('text')));

        $voice = new ChannelType('voice');

        $this->isTrue($voice->isEqualTo(new ChannelType('voice')));
    }
}
