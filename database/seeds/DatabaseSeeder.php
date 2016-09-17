<?php

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusSeeder::class);
    }
}



class StatusSeeder extends Seeder
{

    public function run()
    {
        DB::table('Status')->delete();
        Status::create([
            'status' => '1',
        ]);

        Status::create([
            'status' => '2',
        ]);

        Status::create([
            'status' => '3',
        ]);
    }
}


