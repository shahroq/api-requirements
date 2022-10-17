<?php

namespace Domain\Product\Controllers;

use App\Http\Controllers\Controller;
use Domain\Product\Models\Product;
use Domain\Product\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke()
    {   
        $products = Product::latest()->get();

        return ProductResource::collection($products);
    }
}
