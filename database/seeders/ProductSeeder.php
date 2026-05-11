<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            // ======================
            // CATEGORY 1 - AYAM
            // ======================

            [
                'category_id' => 1,
                'name' => 'Ayam Nugget Crispy',
            ],
            [
                'category_id' => 1,
                'name' => 'Chicken Katsu',
            ],
            [
                'category_id' => 1,
                'name' => 'Sosis Ayam',
            ],
            [
                'category_id' => 1,
                'name' => 'Chicken Wings',
            ],
            [
                'category_id' => 1,
                'name' => 'Ayam Fillet',
            ],
            [
                'category_id' => 1,
                'name' => 'Chicken Popcorn',
            ],
            [
                'category_id' => 1,
                'name' => 'Karage Ayam',
            ],
            [
                'category_id' => 1,
                'name' => 'Chicken Tempura',
            ],
            [
                'category_id' => 1,
                'name' => 'Spicy Chicken',
            ],
            [
                'category_id' => 1,
                'name' => 'Chicken Roll',
            ],

            // ======================
            // CATEGORY 2 - DAGING
            // ======================

            [
                'category_id' => 2,
                'name' => 'Bakso Sapi',
            ],
            [
                'category_id' => 2,
                'name' => 'Sosis Sapi Premium',
            ],
            [
                'category_id' => 2,
                'name' => 'Beef Slice',
            ],
            [
                'category_id' => 2,
                'name' => 'Beef Patty',
            ],
            [
                'category_id' => 2,
                'name' => 'Corned Beef',
            ],
            [
                'category_id' => 2,
                'name' => 'Smoked Beef',
            ],
            [
                'category_id' => 2,
                'name' => 'Meatball Frozen',
            ],
            [
                'category_id' => 2,
                'name' => 'Sapi Lada Hitam',
            ],
            [
                'category_id' => 2,
                'name' => 'Daging Slice BBQ',
            ],
            [
                'category_id' => 2,
                'name' => 'Burger Beef',
            ],

            // ======================
            // CATEGORY 3 - SEAFOOD
            // ======================

            [
                'category_id' => 3,
                'name' => 'Dimsum Udang',
            ],
            [
                'category_id' => 3,
                'name' => 'Fish Roll',
            ],
            [
                'category_id' => 3,
                'name' => 'Crab Stick',
            ],
            [
                'category_id' => 3,
                'name' => 'Fish Nugget',
            ],
            [
                'category_id' => 3,
                'name' => 'Tempura Udang',
            ],
            [
                'category_id' => 3,
                'name' => 'Cumi Ring',
            ],
            [
                'category_id' => 3,
                'name' => 'Shrimp Ball',
            ],
            [
                'category_id' => 3,
                'name' => 'Scallop Seafood',
            ],
            [
                'category_id' => 3,
                'name' => 'Fish Dumpling',
            ],
            [
                'category_id' => 3,
                'name' => 'Ebi Furai',
            ],

            // ======================
            // CATEGORY 4 - SAYURAN
            // ======================

            [
                'category_id' => 4,
                'name' => 'Edamame Beku',
            ],
            [
                'category_id' => 4,
                'name' => 'Mixed Vegetable',
            ],
            [
                'category_id' => 4,
                'name' => 'Jagung Manis',
            ],
            [
                'category_id' => 4,
                'name' => 'Wortel Beku',
            ],
            [
                'category_id' => 4,
                'name' => 'Kentang Frozen',
            ],
            [
                'category_id' => 4,
                'name' => 'Brokoli Beku',
            ],
            [
                'category_id' => 4,
                'name' => 'Bayam Beku',
            ],
            [
                'category_id' => 4,
                'name' => 'Jamur Frozen',
            ],
            [
                'category_id' => 4,
                'name' => 'Buncis Beku',
            ],
            [
                'category_id' => 4,
                'name' => 'Sweet Corn Frozen',
            ],

            // ======================
            // CATEGORY 5 - SNACK
            // ======================

            [
                'category_id' => 5,
                'name' => 'Kentang Goreng',
            ],
            [
                'category_id' => 5,
                'name' => 'Cireng Frozen',
            ],
            [
                'category_id' => 5,
                'name' => 'Risoles Mayo',
            ],
            [
                'category_id' => 5,
                'name' => 'Donat Frozen',
            ],
            [
                'category_id' => 5,
                'name' => 'Roti Maryam',
            ],
            [
                'category_id' => 5,
                'name' => 'Tahu Bakso',
            ],
            [
                'category_id' => 5,
                'name' => 'Pempek Frozen',
            ],
            [
                'category_id' => 5,
                'name' => 'Martabak Mini',
            ],
            [
                'category_id' => 5,
                'name' => 'Croissant Frozen',
            ],
            [
                'category_id' => 5,
                'name' => 'Sosis Solo Frozen',
            ],

        ];

        foreach ($products as $product) {

            Product::create([

                'category_id' => $product['category_id'],
                'name' => $product['name'],

                'unit' => fake()->randomElement([
                    'pcs',
                    'pack',
                    'box'
                ]),

                'stock' => rand(0, 120),

                'minimum_stock' => 20,

                'selling_price' => rand(15000, 50000),

                'purchase_price' => rand(10000, 40000),

                'weight' => fake()->randomElement([
                    '250 gram',
                    '500 gram',
                    '1 kg'
                ]),

                'storage_location' => fake()->randomElement([
                    'Rak A-1',
                    'Rak A-2',
                    'Rak B-1',
                    'Freezer 1',
                    'Freezer 2'
                ]),

                'description' => fake()->sentence(),

                'photo' => null,
            ]);
        }
    }
}