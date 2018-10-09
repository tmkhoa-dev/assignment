<?php
namespace Tmkhoa\Assignment\Test;

use PHPUnit\Framework\TestCase;
use Tmkhoa\Assignment\Entity\Money;

/**
 * Class MoneyTest
 * @package Tmkhoa\Assignment\Test
 */
class MoneyTest extends TestCase
{
    public function testConstructor()
    {
        $money = new Money('USD', 495);
        self::assertInstanceOf(Money::class, $money);
        self::assertEquals('USD', $money->getCurrencyCode());
        self::assertEquals(495, $money->getAmount());
    }

    public function testIsEqual()
    {
        $money1 = Money::ofCurrencyAndAmount('USD', 495);
        $money2 = Money::ofCurrencyAndAmount('USD', 495);
        self::assertTrue($money1->isEqual($money2));
    }
}
