<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    
    public function run()
    {
        $gradestable = 0.00;
        $a=0;
        $id = 1;
        $grade = '0';
        
        while ($gradestable <= 100) {


            if ($gradestable <= 35) {
                $grade = 'F';
            } elseif ($grade <= 50) {
                $grade = 'D';
            } elseif ($grade <= 60) {
                $grade = 'C-';
            } elseif ($grade <= 62) {
                $grade = 'C';
            } elseif ($grade <= 67) {
                $grade = 'C+';
            } elseif ($grade <= 570) {
                $grade = 'B-';
            } elseif ($grade <= 72) {
                $grade = 'B';
            } elseif ($grade <= 77) {
                $grade = 'B+';
            } elseif ($grade <= 80) {
                $grade = 'A-';
            } elseif ($grade <= 85) {
                $grade = 'A';
            } elseif ($grade <= 100) {
                $grade = 'A+';
            } else {
                $grade = "Null";
            }

            


            \DB::table('grade')->insert(array(
                $a =>
                array(
                    'id' => $id,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'mark' => $gradestable,
                    'grade' => $grade,
                    'status' => 1,
                ),
            ));
            $gradestable = $gradestable + 0.25;
            $id++;
            $a++;
        }
    }
}
