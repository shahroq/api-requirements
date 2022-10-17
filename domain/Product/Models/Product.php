<?php

namespace Domain\Product\Models;

use Domain\Product\Discounts\DiscountByProduct;
use Domain\Product\Filters\ProductFilters;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    const CURRENCY = 'EUR';
    
    /**
     * scopeFilter
     *
     * @param  mixed $query
     * @param  mixed $filters
     * @return void
     */
    public function scopeFilter($query, ProductFilters $filters)
    {
        return $filters->apply($query);
    }
    
    /**
     * currency attribute
     *
     * @return Attribute
     */
    protected function currency(): Attribute
    {
        return Attribute::make(
            get: fn () => Product::CURRENCY
        );
    }

    /**
     * discount_percentage attribute
     *
     * @return Attribute
     */
    protected function discountPercentage(): Attribute
    {
        return Attribute::make(
            get: function () { 
                return (new DiscountByProduct($this))->getPercentage();
            }
        );
    }
}
