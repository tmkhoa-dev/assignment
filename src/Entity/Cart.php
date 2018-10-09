<?php
namespace Tmkhoa\Assignment\Entity;

/**
 * Class User
 * @package Tmkhoa\Assignment
 */
class Cart extends AbstractEntity
{
    /** @var User */
    private $user;

    /** @var array */
    private $lineItems;

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $this->lineItems = [];
    }

    /**
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Cart
     */
    public function setUser(User $user): Cart
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return array
     */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }

    /**
     * @param array $lineItems
     * @return Cart
     */
    public function setLineItems(array $lineItems): Cart
    {
        $this->lineItems = $lineItems;

        return $this;
    }
}
