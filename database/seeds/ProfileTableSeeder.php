<?php

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->delete();

        Profile::insert([
          [
            'user_id' => '1'
          ],
          [
            'user_id' => '2'
          ]
        ]);
    }
}
