<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            ['title' => 'Мужская кепка', 'anons' => 'Отличная кепка, которой будут рады все', 'price' => 200, 'category' => 'Категория 1'],
            ['title' => 'Женская кепка', 'anons' => 'Отличная кепка, которой будут рады все', 'price' => 400, 'category' => 'Категория 2'],
            ['title' => 'Пальто', 'anons' => 'Турция отличное качество', 'price' => 10000, 'category' => 'Категория 1'],
        ]);
    }
}