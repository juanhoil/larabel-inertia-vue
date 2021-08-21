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
            ['name' => 'Programa 1'],
            ['name' => 'Programa 2'],
            ['name' => 'Programa 3'],
        ]);
    }
}
