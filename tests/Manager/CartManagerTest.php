<?php
namespace Tmkhoa\Assignment\Test;

use PHPUnit\Framework\TestCase;
use Tmkhoa\Assignment\Entity\Cart;
use Tmkhoa\Assignment\Entity\LineItem;
use Tmkhoa\Assignment\Entity\Money;
use Tmkhoa\Assignment\Entity\Product;
use Tmkhoa\Assignment\Entity\User;
use Tmkhoa\Assignment\Manager\CartManager;

/**
 * Class CartManagerTest
 * @package Tmkhoa\Assignment\Test
 */
class CartManagerTest extends TestCase
{
    /**
     * Test case 1 in assignment
     */
    public function testCase1()
    {
        $user = (new User())
            ->setId('user-id')
            ->setName('John Doe')
            ->setEmail('john.doe@example.com');

        $apple = (new Product())
            ->setId('product-1')
            ->setName('Apple')
            ->setPrice(Money::ofCurrencyAndAmount('USD', 495));
        $lineItem1 = new LineItem($apple, 2);

        $orange = (new Product())
            ->setId('product-2')
            ->setName('Orange')
            ->setPrice(Money::ofCurrencyAndAmount('USD', 399));
        $lineItem2 = new LineItem($orange, 1);

        $cart = new Cart();

        $cart->setUser($user);
        $cart->setLineItems([$lineItem1, $lineItem2]);

        self::assertEquals(3, CartManager::getTotalProducts($cart));
        self::assertTrue(CartManager::getTotalPrice($cart)->isEqual(
            Money::ofCurrencyAndAmount('USD', 495 * 2 + 399 * 1)
        ));
    }

    /**
     * Test case 2 in assignment
     * In this case, this action will belong to changeLineItemQuantity, the remove action happens when remove totally
     * that line item from shopping cart.
     */
    public function testCase2()
    {
        $user = (new User())
            ->setId('user-id')
            ->setName('John Doe')
            ->setEmail('john.doe@example.com');

        $apple = (new Product())
            ->setId('product-1')
            ->setName('Apple')
            ->setPrice(Money::ofCurrencyAndAmount('USD', 495));
        $lineItem1 = new LineItem($apple, 3);

        $cart = new Cart();
        $cart->setUser($user);
        $cart->setLineItems([$lineItem1]);
        self::assertTrue(CartManager::getTotalPrice($cart)->isEqual(
            Money::ofCurrencyAndAmount('USD', 495 * 3)
        ));

        CartManager::changeLineItemQuantity($cart, $apple, 2);

        self::assertTrue(CartManager::getTotalPrice($cart)->isEqual(
            Money::ofCurrencyAndAmount('USD', 495 * 2)
        ));
    }
}
