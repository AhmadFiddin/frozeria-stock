<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Ayam',
                'description' => 'Kategori produk frozen food berbahan dasar ayam.'
            ],

            [
                'name' => 'Daging',
                'description' => 'Kategori produk olahan daging sapi dan daging lainnya.'
            ],

            [
                'name' => 'Seafood',
                'description' => 'Kategori makanan laut beku seperti udang, ikan, dan cumi.'
            ],

            [
                'name' => 'Sayuran',
                'description' => 'Kategori sayuran beku siap masak dan siap saji.'
            ],

            [
                'name' => 'Snack Frozen',
                'description' => 'Kategori camilan frozen food seperti nugget, kentang, dan dimsum.'
            ],

        ];

        foreach ($categories as $category) {

            Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
            ]);
        }
    }
}
