<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstractorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('instractors')->delete();
        
        \DB::table('instractors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'full_name' => 'i1',
                'sex' => 1,
                'email' => 'asd@eac.com',
                'address' => 'sda',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}