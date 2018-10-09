<?php
namespace Tmkhoa\Assignment\Manager;

use Tmkhoa\Assignment\Entity\Cart;
use Tmkhoa\Assignment\Entity\LineItem;
use Tmkhoa\Assignment\Entity\Money;
use Tmkhoa\Assignment\Entity\Product;

/**
 * Class CartManager
 * @package Tmkhoa\Assignment\Manager
 */
class CartManager
{
    /** DEFAULT_CURRENCY_CODE */
    const DEFAULT_CURRENCY_CODE = 'USD';

    /**
     * @param Cart $cart
     * @return Money
     */
    public static function getTotalPrice(Cart $cart)
    {
        $currencyCode = count($cart->getLineItems()) > 0
            ? $cart->getLineItems()[0]->getProduct()->getPrice()->getCurrencyCode()
            : CartManager::DEFAULT_CURRENCY_CODE;
        $amount = 0;

        foreach ($cart->getLineItems() as $lineItem) {
            /** @var LineItem $lineItem */
            $amount += $lineItem->getProduct()->getPrice()->getAmount() * $lineItem->getQuantity();
        }

        return Money::ofCurrencyAndAmount($currencyCode, $amount);
    }

    /**
     * @param Cart $cart
     * @return int
     */
    public static function getTotalProducts(Cart $cart)
    {
        $count = 0;
        foreach ($cart->getLineItems() as $lineItem) {
            /** @var LineItem $lineItem */
            $count += $lineItem->getQuantity();
        }

        return $count;
    }

    /**
     * @param Cart $cart
     * @param Product $product
     * @param int $quantity
     * @return Cart
     */
    public static function addProduct(Cart $cart, Product $product, int $quantity = 1)
    {
        $found = false;
        foreach ($cart->getLineItems() as $lineItem) {
            /** @var LineItem $lineItem */
            if ($lineItem->getProduct()->getId() === $product->getId()) {
                $found = true;
                $lineItem->setQuantity($lineItem->getQuantity() + $quantity);
                break;
            }
        }
        if (!$found) {
            $lineItems = $cart->getLineItems();
            $lineItems[] = new LineItem($product, $quantity);
            $cart->setLineItems($lineItems);
        }

        return $cart;
    }

    /**
     * @param Cart $cart
     * @param Product $product
     * @param int $quantity
     * @return Cart
     */
    public static function changeLineItemQuantity(Cart $cart, Product $product, int $quantity = 1)
    {
        foreach ($cart->getLineItems() as $lineItem) {
            /** @var LineItem $lineItem */
            if ($lineItem->getProduct()->getId() === $product->getId()) {
                $lineItem->setQuantity($quantity);
                break;
            }
        }

        return $cart;
    }


    /***
     * @param Cart $cart
     * @param Product $product
     * @return Cart
     */
    public static function removeProduct(Cart $cart, Product $product)
    {
        $lineItems = $cart->getLineItems();
        foreach ($cart->getLineItems() as $key => $lineItem) {
            /** @var LineItem $lineItem */
            if ($lineItem->getProduct()->getId() === $product->getId()) {
                unset($lineItems[$key]);
                break;
            }
        }

        $cart->setLineItems($lineItems);

        return $cart;
    }
}
