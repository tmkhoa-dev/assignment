<?php
namespace Tmkhoa\Assignment\Entity;

/**
 * Class User
 * @package Tmkhoa\Assignment
 */
class User extends AbstractEntity
{
    /** @var string */
    private $name;

    /** @var string */
    private $email;

    /** @var Cart */
    private $cart;

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Cart|null
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param Cart $cart
     * @return User
     */
    public function setCart(Cart $cart): User
    {
        $this->cart = $cart;

        return $this;
    }
}
