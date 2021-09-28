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
                'full_name' => 'STU1',
                'sex' => 1,
                'email' => 'stu@dent.one',
                'address' => 'addis',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'full_name' => 'STU2',
                'sex' => 2,
                'email' => 'stu@dent.two',
                'address' => 'addis',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}