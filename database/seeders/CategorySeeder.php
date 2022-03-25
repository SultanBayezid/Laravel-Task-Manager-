<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reaction = array(
            array('id' => '1','name' => 'created'),
            array('id' => '2','name' => 'assigned'),
            array('id' => '3','name' => 'in-progress'),
            array('id' => '4','name' => 'done'),
   
        );
        DB::table('categories')->insert($reaction);
    }
}
