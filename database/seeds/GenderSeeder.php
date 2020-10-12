<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Gender::create([
            'name'  =>  'Female',
        ]);
        \App\Gender::create([
            'name'  =>  'Male',
        ]);
        \App\Gender::create([
            'name'  =>  'Other',
        ]);
    }
}
