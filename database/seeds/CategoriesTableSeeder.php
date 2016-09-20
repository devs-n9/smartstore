<?php

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        Categories::create([
            'category' => 'Тестовая категория №1',
            'alias' => 'test_category_1',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория c с очень длинным названием для тестирования отображения во фронте №2',
            'alias' => 'test_category_2',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория №3',
            'alias' => 'test_category_3',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория №4',
            'alias' => 'test_category_4',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория c с очень длинным названием для тестирования отображения во фронте №5',
            'alias' => 'test_category_5',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория №6',
            'alias' => 'test_category_6',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория №7',
            'alias' => 'test_category_7',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория c с очень длинным названием для тестирования отображения во фронте №8',
            'alias' => 'test_category_8',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория №9',
            'alias' => 'test_category_9',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
        Categories::create([
            'category' => 'Тестовая категория №10',
            'alias' => 'test_category_10',
            'description' => 'Это краское описание категории для вывода на странице каталога',
            'content' => 'Это полное описание категории для вывода на старнице категории (товаров)',
            'preview' => 'category_img.jpg',
        ]);
    }
}
