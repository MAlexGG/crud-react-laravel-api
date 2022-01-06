<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('cards')->insert([
        [
            'title' => 'Moonlight',
            'image' => 'imageOfMoon',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'title' => 'Waikiki beach',
            'image' => 'imageOfBeach',
            'created_at' => date('Y-m-d H:i:s')
        ]
       ]); 
    }
}
