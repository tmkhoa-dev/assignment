<?php
namespace Tmkhoa\Assignment\Entity;

/**
 * Class Money
 * @package Tmkhoa\Assignment
 */
class Money
{
    /** @var string */
    private $currencyCode;

    /** @var int */
    private $amount;

    /**
     * Money constructor.
     *
     * @param string $currencyCode
     * @param int    $amount
     */
    public function __construct(string $currencyCode, int $amount)
    {
        $this->currencyCode = $currencyCode;
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     * @return Money
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return Money
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param Money $another
     * @return bool
     */
    public function isEqual(Money $another)
    {
        return $this->amount === $another->getAmount() && $this->currencyCode === $another->getCurrencyCode();
    }

    /**
     * @param string $currency
     * @param int $amount
     * @return Money
     */
    public static function ofCurrencyAndAmount(string $currency, int $amount): Money
    {
        return new static($currency, $amount);
    }
}
