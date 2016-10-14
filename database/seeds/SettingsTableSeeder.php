<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        Settings::insert([
            [
                'description' => 'british online store',
                'keywords' => 'shopping, clothes, shoes, bags',
                'author' => 'php 16-1',
                'title' => 'Assan'
            ]
        ]);
    }
}
