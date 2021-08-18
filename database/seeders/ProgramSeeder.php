<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            ['name' => 'Program 1'],
            ['name' => 'Program 2'],
            ['name' => 'Program 3'],
        ]);
    }
}
