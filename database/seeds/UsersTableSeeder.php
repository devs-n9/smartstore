<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::insert([
          [
            'login' => 'admin',
            'email' => 'admin@smartstore.com',
            'password' => 'password',
            'activated' => '1',
            'role_id' => '1'
          ],
          [
            'login' => 'manager',
            'email' => 'manager@smartstore.com',
            'password' => 'password',
            'activated' => '1',
            'role_id' => '2'
          ]
        ]);
    }
}
