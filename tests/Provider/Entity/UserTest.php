<?php
/**
 * Created by PhpStorm.
 * User: piotrmacha
 * Date: 24/10/2017
 * Time: 18:17
 */

namespace Provider\Entity;


use Discord\OAuth2\Client\Provider\Entity\User;
use Discord\OAuth2\Client\Provider\ValueObject\UserDiscriminator;
use Discord\OAuth2\Client\Provider\ValueObject\UserName;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIfConstructsAndSerializesToArray()
    {
        $username = new UserName('John Doe');
        $discriminator = new UserDiscriminator('1234');

        $user = new User();
        $user->setId('ID');
        $user->setUsername($username);
        $user->setDiscriminator($discriminator);
        $user->setAvatar('avatar_link');

        $expected = [
          'id' => 'ID',
          'username' => $username,
          'discriminator' => $discriminator,
          'avatar' => 'avatar_link'
        ];

        $this->assertSame($expected, $user->toArray());
    }
}