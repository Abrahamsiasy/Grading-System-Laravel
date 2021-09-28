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
                'course_name' => 'C1S1',
                'course_desc' => 'C1S1',
                'ests' => 7.0,
                'credithour' => 4.0,
                'student_id' => 1,
                'semester_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'grade_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'course_name' => 'C2S2',
                'course_desc' => 'C2S2',
                'ests' => 7.0,
                'credithour' => 4.0,
                'student_id' => 2,
                'semester_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'grade_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'course_name' => 'C2S1',
                'course_desc' => 'C2S1',
                'ests' => 8.0,
                'credithour' => 4.0,
                'student_id' => 1,
                'semester_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'grade_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'course_name' => 'C2S1',
                'course_desc' => 'C2S1',
                'ests' => 6.0,
                'credithour' => 3.0,
                'student_id' => 1,
                'semester_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'grade_id' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'course_name' => 'C2S1',
                'course_desc' => 'C2S1',
                'ests' => 6.0,
                'credithour' => 3.0,
                'student_id' => 1,
                'semester_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'grade_id' => 1,
            ),
        ));
        
        
    }
}