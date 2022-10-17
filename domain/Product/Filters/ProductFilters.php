<?php

namespace Domain\Product\Filters;

class ProductFilters extends Filters
{
    protected $filters = ['category', 'price', 'minPrice', 'maxPrice'];
    
    /**
     * filter by category
     *
     * @param  mixed $category
     * @return void
     */
    protected function category($category)
    {
        return $this->builder->where('category', $category);
    }
    
    /**
     * filter by price
     *
     * @param  mixed $price
     * @return void
     */
    protected function price($price)
    {
        return $this->builder->where('price', $price);
    }
    
    /**
     * filter by minimum price
     *
     * @param  mixed $minPrice
     * @return void
     */
    protected function minPrice($minPrice)
    {
        return $this->builder->where('price', '>=', $minPrice);
    }
    
    /**
     * filter by max price
     *
     * @param  mixed $maxPrice
     * @return void
     */
    protected function maxPrice($maxPrice)
    {
        return $this->builder->where('price', '<=', $maxPrice);
    }
}
