<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Domain\Product\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $products = $this->getDataset()->products;
        
        foreach ($products as $product) {
            Product::create((array) $product);
        }
    }
    
    /**
     * getDataset
     *
     * @return void
     */
    protected function getDataset()
    {
        $dataset = '{ "products": [ { "sku": "000001", "name": "Full coverage insurance", "category": "insurance", "price": 89000 }, { "sku": "000002", "name": "Compact Car X3", "category": "vehicle", "price": 99000 }, { "sku": "000003", "name": "SUV Vehicle, high end", "category": "vehicle", "price": 150000 }, { "sku": "000004", "name": "Basic coverage", "category": "insurance", "price": 20000 }, { "sku": "000005", "name": "Convertible X2, Electric", "category": "vehicle", "price": 250000 } ] }';

        return json_decode($dataset);
    }    
}
