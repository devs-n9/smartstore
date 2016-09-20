<?php

use App\Models\Brands;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Brands')->delete();
        Brands::insert([
            [
                'brand' => 'Brand 1',
                'logo' => 'brand_logo_1.jpg'
            ],
            [
                'brand' => 'Brand 2',
                'logo' => 'brand_logo_2.jpg'
            ],
            [
                'brand' => 'Brand 3',
                'logo' => 'brand_logo_3.jpg'
            ],
            [
                'brand' => 'Brand 4',
                'logo' => 'brand_logo_4.jpg'
            ],
            [
                'brand' => 'Brand 5',
                'logo' => 'brand_logo_5.jpg'
            ]
        ]);

    }
}
