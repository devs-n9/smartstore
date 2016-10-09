<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->delete();

        Role::insert([
          [
            'role' => 'admin'
          ],
          [
            'role' => 'manager'
          ],
          [
            'role' => 'user'
          ]
        ]);
    }
}
