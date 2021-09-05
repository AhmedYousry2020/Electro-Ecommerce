<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'OPPO A15',
            'description' => 'Oppo A15 Dual Sim, 32GB, 2GB RAM, 4G LTE - Mystery Blue',
            'sale_price' => 2590.99,
            'purchase_price' => 2199.99,
            'stock'=>5,
            'category_id' => 1,
            'color'=>'red'
        ]);

        Product::create([
            'name' => 'Oppo Reno6',
            'purchase_price' => 1499.99,
            'sale_price' => 1599,
            'stock'=>3,
            'description' => 'Oppo Reno6 5G -8GB RAM - 128GB - Aurora (Pre-Order)',
            'category_id' => 1,
            'color'=>'blue'
            
        ]);

        Product::create([
            'name' => 'Samsung A12',
            'purchase_price' => 4499.99,
            'sale_price' => 5500,
            'description' => 'Samsung A12 - 4GB RAM - 64GB - Black',
            'category_id' => 1,
            'stock'=>3,
            'color'=>'black'
            
        ]);
        Product::create([
            'name' => 'Realme 7i',
            'purchase_price' => 5499.99,
            'sale_price' => 6910,
            'stock'=>3,
            'description' => 'Realme 7i - 8GB RAM - 128GB - Aurora Green',
            'category_id' => 1,
            'color'=>'Green'
            
        ]);
       

       
    }
}
