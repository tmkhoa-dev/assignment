<?php
namespace Tmkhoa\Assignment\Test;

use PHPUnit\Framework\TestCase;
use Tmkhoa\Assignment\Entity\Cart;
use Tmkhoa\Assignment\Entity\LineItem;
use Tmkhoa\Assignment\Entity\Money;
use Tmkhoa\Assignment\Entity\Product;
use Tmkhoa\Assignment\Entity\User;

/***
 * Class CartTest
 * @package Tmkhoa\Assignment\Test
 */
class CartTest extends TestCase
{
    public function testConstructor()
    {
        $cart = new Cart();
        self::assertInstanceOf(Cart::class, $cart);
    }

    public function testGetterAndSetter()
    {
        $product1 = (new Product())
            ->setId('product-1')
            ->setName('product-name-1')
            ->setPrice(Money::ofCurrencyAndAmount('USD', 1000));
        $lineItem1 = new LineItem($product1, 2);

        $product2 = (new Product())
            ->setId('product-2')
            ->setName('product-name-2')
            ->setPrice(Money::ofCurrencyAndAmount('USD', 5000));
        $lineItem2 = new LineItem($product2, 1);

        $cart = new Cart();
        self::assertNull($cart->getUser());
        self::assertTrue(is_array($cart->getLineItems()));

        $cart->setLineItems([$lineItem1, $lineItem2]);
        self::assertEquals(2, count($cart->getLineItems()));

        $user = (new User())
            ->setId('user-id')
            ->setEmail('tranminhkhoa1402@gmail.com');

        $cart->setUser($user);
        self::assertInstanceOf(User::class, $cart->getUser());
        self::assertEquals('user-id', $cart->getUser()->getId());
    }
}
