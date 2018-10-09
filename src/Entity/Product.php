<?php
namespace Tmkhoa\Assignment\Entity;

/**
 * Class Product
 * @package Tmkhoa\Assignment
 */
class Product extends AbstractEntity
{
    /** @var string */
    private $name;

    /** @var Money */
    private $price;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Money
     */
    public function getPrice(): Money
    {
        return $this->price;
    }

    /**
     * @param Money $price
     * @return Product
     */
    public function setPrice(Money $price): Product
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Product
     */
    public static function of()
    {
        return new self();
    }
}
