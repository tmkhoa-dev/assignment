<?php
namespace Tmkhoa\Assignment\Test;

use PHPUnit\Framework\TestCase;
use Tmkhoa\Assignment\Entity\Money;
use Tmkhoa\Assignment\Entity\Product;

/**
 * Class ProductTest
 * @package Tmkhoa\Assignment\Test
 */
class ProductTest extends TestCase
{
    public function testConstructor()
    {
        $product = new Product();
        self::assertInstanceOf(Product::class, $product);
    }

    public function testGetterAndSetter()
    {
        /** @var Product $product */
        $product = (new Product())
            ->setId('product-id')
            ->setName('product-name')
            ->setPrice(Money::ofCurrencyAndAmount('USD', 999));

        self::assertEquals('product-id', $product->getId());
        self::assertEquals('product-name', $product->getName());
        self::assertInstanceOf(Money::class, $product->getPrice());
        self::assertTrue($product->getPrice()->isEqual(Money::ofCurrencyAndAmount('USD', 999)));
    }
}
