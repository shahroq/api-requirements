<?php

namespace Domain\Product\Controllers;

use App\Http\Controllers\Controller;
use Domain\Product\Filters\ProductFilters;
use Domain\Product\Models\Product;
use Domain\Product\Resources\ProductResource;

class ProductController extends Controller
{
    public function __invoke(ProductFilters $filters)
    {   
        $products = Product::latest()->filter($filters)->get();

        return ProductResource::collection($products);
    }
}
