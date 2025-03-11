<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'Figurine Goku Super Saiyan', 'description' => 'Figurine de Goku en mode Super Saiyan, très détaillée et articulée.', 'price' => 159, 'active' => 1],
            ['name' => 'Figurine Vegeta', 'description' => 'Figurine de Vegeta, personnage emblématique de Dragon Ball Z.', 'price' => 159, 'active' => 1],
            ['name' => 'Figurine Freezer', 'description' => 'Freezer, l\'empereur de l\'univers, figurine très fidèle à l\'anime.', 'price' => 289, 'active' => 1],
            ['name' => 'Figurine Piccolo', 'description' => 'Piccolo, le grand Namek, prêt pour le combat.', 'price' => 89, 'active' => 1],
            ['name' => 'Figurine Trunks', 'description' => 'Trunks, fils de Vegeta et Bulma, la version jeune.', 'price' => 49, 'active' => 1],
            ['name' => 'Figurine Gohan', 'description' => 'Gohan, fils de Goku, dans son premier combat contre Cell.', 'price' => 149, 'active' => 1],
            ['name' => 'Figurine Majin Buu', 'description' => 'Majin Buu, le monstre maléfique aux multiples formes.', 'price' => 189, 'active' => 1],
            ['name' => 'Figurine Cell', 'description' => 'Cell, l\'un des plus grands méchants de Dragon Ball Z.', 'price' => 200, 'active' => 1],
            ['name' => 'Figurine Goku SSj4', 'description' => 'Goku SSj4, dans Dragon Ball Daïma.', 'price' => 459, 'active' => 1],
            ['name' => 'Figurine Broly', 'description' => 'Broly, le Super Saiyan légendaire de l\'univers Dragon Ball Z.', 'price' => 299, 'active' => 1]
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['name' => $product['name']],
                $product 
            );
        }
    }
}


