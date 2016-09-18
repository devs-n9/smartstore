<?php

use App\Models\Products;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Products')->delete();
        Products::create([
            'product' => 'Тестовый продукт №1',
            'category_id' => '4',
            'brand_id' => '1',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт c длинным заголовком для теста отображения на фронте №2',
            'category_id' => '5',
            'brand_id' => '2',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт №3',
            'category_id' => '6',
            'brand_id' => '3',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт №4',
            'category_id' => '7',
            'brand_id' => '1',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт c длинным заголовком для теста отображения на фронте №5',
            'category_id' => '8',
            'brand_id' => '2',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт №6',
            'category_id' => '9',
            'brand_id' => '3',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт №7',
            'category_id' => '10',
            'brand_id' => '1',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт c длинным заголовком для теста отображения на фронте №8',
            'category_id' => '10',
            'brand_id' => '2',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт №9',
            'category_id' => '10',
            'brand_id' => '3',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
        Products::create([
            'product' => 'Тестовый продукт №10',
            'category_id' => '10',
            'brand_id' => '3',
            'description' => 'Краткое описание товара',
            'content' => 'Полное описание товара',
            'price' => '1000',
            'preview' => 'product_img.jpg',
            'count' => '100',
            'rating' => '0'
        ]);
    }
}
