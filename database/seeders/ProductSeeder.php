<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = Category::factory()->count(3)->create();

        // Crée 200 produits
        Product::factory()->count(200)
        ->hasAttached($categories)->create();
        

    }
}
