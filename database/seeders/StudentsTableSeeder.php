<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('students')->delete();
        
        \DB::table('students')->insert(array (
            0 => 
            array (
                'id' => 1,
                'full_name' => 's1',
                'sex' => 1,
                'email' => 'stihs@gmail.com',
                'address' => 'asc',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'full_name' => 'Student 2',
                'sex' => 1,
                'email' => 'Studen@gmail.com',
                'address' => 'Student 2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}