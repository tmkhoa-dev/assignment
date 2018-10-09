<?php
namespace Tmkhoa\Assignment\Test;

use PHPUnit\Framework\TestCase;
use Tmkhoa\Assignment\Entity\LineItem;
use Tmkhoa\Assignment\Entity\Product;

/**
 * Class LineItemTest
 * @package Tmkhoa\Assignment\Test
 */
class LineItemTest extends TestCase
{
    public function testConstructor()
    {
        /** @var Product $product */
        $product = (new Product())
            ->setId('product-1');

        $lineItem = new LineItem($product, 2);
        self::assertInstanceOf(LineItem::class, $lineItem);
        self::assertEquals(2, $lineItem->getQuantity());
        $product = (new Product())
            ->setId('product-2');
        $lineItem->setProduct($product);
        self::assertEquals('product-2', $lineItem->getProduct()->getId());
    }
}
