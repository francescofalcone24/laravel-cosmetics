<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newProduct = new Product();
        $newProduct->brand = "Dior";
        $newProduct->model = "Sauvage";
        $newProduct->type = "Eau de toilette";
        $newProduct->price = "59,99";
        $newProduct->size_ml = 100;
        $newProduct->img = "img/dior.webp";
        $newProduct->save();
    }
}
