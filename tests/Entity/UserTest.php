<?php
namespace Tmkhoa\Assignment\Test;

use PHPUnit\Framework\TestCase;
use Tmkhoa\Assignment\Entity\User;

/**
 * Class UserTest
 * @package Tmkhoa\Assignment\Test
 */
class UserTest extends TestCase
{
    public function testConstructor()
    {
        $user = new User();
        self::assertInstanceOf(User::class, $user);
    }

    public function testGetterAndSetter()
    {
        /** @var User $user */
        $user = (new User())
            ->setId('user-id')
            ->setName('Khoa Tran')
            ->setEmail('tranminhkhoa1402@gmail.com');

        self::assertEquals('user-id', $user->getId());
        self::assertEquals('Khoa Tran', $user->getName());
        self::assertEquals('tranminhkhoa1402@gmail.com', $user->getEmail());
        self::assertNull($user->getCart());
    }
}
