<?php

namespace Domain\Product\ValueObjects;

final class Price implements \JsonSerializable
{
    private $price;
    private $currency;
    private $discount_percentage;
    
    /**
     * __construct
     *
     * @param  mixed $price
     * @param  mixed $currency
     * @param  mixed $discount_percentage
     * @return void
     */
    public function __construct($price, $currency, $discount_percentage = 0)
    {
        $filteredPrice = filter_var($price, FILTER_VALIDATE_INT);
        $filteredCurrency = filter_var($currency);
        $filteredDiscountPercentage = filter_var(
            $discount_percentage,
            FILTER_VALIDATE_REGEXP,
            ["options" => ["regexp" => "/^(100|[1-9]?[0-9])$/"]]
        );

        if ($filteredPrice === false) {
            throw new \InvalidArgumentException("Invalid argument $price: Not a price.");
        }

        if ($filteredCurrency === false) {
            throw new \InvalidArgumentException("Invalid argument $currency: Not a currency.");
        }

        if ($filteredDiscountPercentage === false) {
            throw new \InvalidArgumentException("Invalid argument $discount_percentage: Not a discount percentage.");
        }

        $this->price = $filteredPrice;
        $this->currency = $filteredCurrency;
        $this->discount_percentage = $filteredDiscountPercentage;
    }
    
    /**
     * __toArray
     *
     * @return void
     */
    public function __toArray()
    {
        return [
            'original' => $this->price,
            'final' => $this->discount_percentage ? $this->price - $this->discount_percentage * $this->price / 100 : $this->price,
            'discount_percentage' => $this->discount_percentage ? $this->discount_percentage . "%" : null,
            'currency' => $this->currency,
        ];
    }
    
    /**
     * jsonSerialize
     *
     * @return void
     */
    public function jsonSerialize()
    {
        return $this->__toArray();
    }
}
