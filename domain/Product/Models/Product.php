<?php

namespace Domain\Product\Models;

use Domain\Product\Filters\ProductFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
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
}
