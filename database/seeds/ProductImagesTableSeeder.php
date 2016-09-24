<?php

use App\Models\ProductImages;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->delete();

        ProductImages::insert([
            [
                'image' => 'brand_logo_1.jpg',
                'product_id' => '1'
            ],
            [
                'image' => 'brand_logo_2.jpg',
                'product_id' => '1'
            ],
            [
                'image' => 'brand_logo_4.jpg',
                'product_id' => '2'
            ],
            [
                'image' => 'brand_logo_5.jpg',
                'product_id' => '1'
            ],
            [
                'image' => 'brand_logo_6.jpg',
                'product_id' => '3'
            ],
            [
                'image' => 'brand_logo_1.jpg',
                'product_id' => '3'
            ]
        ]);

    }
}
