<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class InitialProductSeeder extends Seeder
{
    public function run(): void
    {
        $initialProducts = [
            [
                'name' => 'Juice',
                'price' => 163,
                'quantity' => 10,
                'age_restriction' => 0,
            ],
            [
                'name' => 'Eggs',
                'price' => 157,
                'quantity' => 6,
                'age_restriction' => 0,
            ],
            [
                'name' => 'Ecological Eggs',
                'price' => 256,
                'quantity' => 8,
                'age_restriction' => 0,
            ],
            [
                'name' => 'Kvass 0.5l',
                'price' => 120,
                'quantity' => 6,
                'age_restriction' => 0,
            ],
            [
                'name' => "Rye Bread",
                'price' => 200,
                'quantity' => 1,
                'age_restriction' => 0,
            ],
            [
                'name' => 'Alcoholic beer',
                'price' => 164,
                'quantity' => 33,
                'age_restriction' => 20,
            ],
            [
                'name' => '“Unhealthy” Cigarettes',
                'price' => 358,
                'quantity' => 7,
                'age_restriction' => 20,
            ],
            [
                'name' => 'A Fairytale book for children',
                'price' => 1089,
                'quantity' => 10,
                'age_restriction' => 0,
            ],
            [
                'name' => 'Book “Criminal minds”',
                'price' => 1568,
                'quantity' => 4,
                'age_restriction' => 18,
            ],
            [
                'name' => 'Donut',
                'price' => 53,
                'quantity' => 13,
                'age_restriction' => 0,
            ],
        ];

        Product::query()->insert($initialProducts);
    }
}
