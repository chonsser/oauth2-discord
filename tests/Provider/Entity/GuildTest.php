<?php
/**
 * Created by PhpStorm.
 * User: piotrmacha
 * Date: 01/10/2017
 * Time: 14:06
 */

namespace Provider\Entity;

use Discord\OAuth2\Client\Provider\Entity\Guild;
use Discord\OAuth2\Client\Provider\Enum\Permission;
use Discord\OAuth2\Client\Provider\ValueObject\GuildName;
use PHPUnit\Framework\TestCase;

class GuildTest extends TestCase
{
    public function testIfConstructs()
    {
        $guild = new Guild();
        $guild->setId('identity');
        $guild->setName(new GuildName('An awesome guild'));
        $guild->setIcon('icon_link');
        $guild->setOwner(TRUE);

        $this->assertEquals('identity', $guild->getId());
        $this->assertTrue($guild->getName()->isEqualTo(new GuildName('An awesome guild')));
        $this->assertEquals('icon_link', $guild->getIcon());
        $this->assertTrue($guild->isOwner());
    }

    public function testIfManagesPermissionsCorrectly()
    {
        $guild = new Guild();
        $guild->setPermissions(
            Permission::ADD_REACTIONS | Permission::KICK_MEMBERS
        );
        $this->assertEquals(
            Permission::ADD_REACTIONS | Permission::KICK_MEMBERS,
            $guild->getPermissions()
        );

        $this->assertTrue($guild->hasPermission(Permission::ADD_REACTIONS));
        $this->assertTrue($guild->hasPermission(Permission::KICK_MEMBERS));
        $this->assertFalse($guild->hasPermission(Permission::MANAGE_GUILD));
    }
}
