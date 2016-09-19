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
        Brands::create([
            'brand' => 'Brand 1',
        ]);

        Brands::create([
            'brand' => 'Brand 2',
        ]);

        Brands::create([
            'brand' => 'Brand 3',
        ]);
    }
}
