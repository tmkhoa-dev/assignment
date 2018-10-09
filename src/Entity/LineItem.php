<?php
namespace Tmkhoa\Assignment\Entity;

/**
 * Class LineItem
 * @package Tmkhoa\Assignment\Entity
 */
class LineItem extends AbstractEntity
{
    /** @var Product */
    private $product;

    /** @var int */
    private $quantity;

    /**
     * LineItem constructor.
     * @param Product $product
     * @param int $quantity
     */
    public function __construct(Product $product, int $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return LineItem
     */
    public function setProduct(Product $product): LineItem
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return LineItem
     */
    public function setQuantity(int $quantity): LineItem
    {
        $this->quantity = $quantity;

        return $this;
    }
}
