<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studens')->insert([
            ['full_name' => 'Jorge Puerto','created_at' =>'2021-08-23','program_id'=>2],
            ['full_name' => 'Stefan Xu','created_at' =>'2021-08-23','program_id'=>1],
            ['full_name' => 'González Garcia','created_at' =>'2021-08-23','program_id'=>1],
            ['full_name' => 'Rodríguez López','created_at' =>'2021-08-23','program_id'=>1],
            ['full_name' => 'Juan Albornoz','created_at' =>'2021-08-27','program_id'=>2],
            ['full_name' => 'Ricardo Perez','created_at' =>'2021-08-25','program_id'=>3],
            ['full_name' => 'Alicia Centeno','created_at' =>'2021-08-25','program_id'=>2],
            ['full_name' => 'Juan Ku','created_at' =>'2021-08-25','program_id'=>1],
            ['full_name' => 'Maria Delgado','created_at' =>'2021-08-2','program_id'=>1],
            ['full_name' => 'Karen Sarmiento','created_at' =>'2021-08-2','program_id'=>3],
            ['full_name' => 'Juan Ruiz','created_at' =>'2021-08-2','program_id'=>3],
        ]);
    }
}













