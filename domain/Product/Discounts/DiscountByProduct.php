<?php

namespace Domain\Product\Discounts;

use Domain\Product\Models\Product;

class DiscountByProduct
{
    protected $product;

    protected $rules = [
        'bySku',
        'byCategory',
    ];

    function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    /**
     * get total percentage
     *
     * @return int
     */
    public function getPercentage(): int
    {
        $percentage = 0;

        foreach ($this->rules as $rule) {
            if (method_exists($this, $rule)) $percentage += $this->$rule();
        }

        return $percentage;
    }
    
    /**
     * discount by sku
     *
     * @return int
     */
    protected function bySku(): int
    {
        return $this->product->sku == '000003' ? 15 : 0;
    }
    
    /**
     * discount by category
     *
     * @return int
     */
    protected function byCategory(): int
    {
        return $this->product->category == 'insurance' ? 30 : 0;
    }
}
