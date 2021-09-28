<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'course_name' => 'Course 1',
                'course_desc' => 'Course 1 D',
                'created_at' => NULL,
                'updated_at' => NULL,
                'ests' => 7.0,
                'credithour' => 3.0,
                'corsecode' => 'C1',
                'student_id' => 1,
                'semester_id' => 1,

            ),
            1 => 
            array (
                'id' => 2,
                'course_name' => 'C2',
                'course_desc' => 'C2C2',
                'created_at' => NULL,
                'updated_at' => NULL,
                'ests' => 6.0,
                'credithour' => 4.0,
                'corsecode' => 'C2',
                'student_id' => 1,
                'semester_id' => 1,

                
            ),
            2 => 
            array (
                'id' => 3,
                'course_name' => 'C3',
                'course_desc' => 'C3C3',
                'created_at' => NULL,
                'updated_at' => NULL,
                'ests' => 5.0,
                'credithour' => 3.0,
                'corsecode' => 'C3',
                'student_id' => 1,
                'semester_id' => 1,

            ),
        ));
        
        
    }
}