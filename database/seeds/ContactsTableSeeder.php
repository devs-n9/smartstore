<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();
        Contacts::insert([
            [
                'phone' => '+41 123 789 457',
                'email' => 'assan@gmail.com',
                'address' => '5 Merchant Square, London, W2 1AS'
            ]
        ]);
    }
}
