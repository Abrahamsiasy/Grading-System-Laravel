<?php

namespace App\Models\Neww;

use App\Models\Neww\NewCourse;
use App\Models\Neww\NewGrade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewClass extends Model
{
    use HasFactory;
    protected $primaryKey = 'class_id';

    public function getCourse()
    {
        $course_code = $this->attributes['course_code'];
        $section = $this->attributes['section'];

        $description = NewCourse::where('course_code', 'LIKE', $course_code)->get()[0]->description;

        if($section != null)
            return $course_code . ' ' . $section . ' ' . $description;

        return $course_code . ' ' . $description;
    }

    public function getTotalStudents()
    {
        return count($this->grades);
        //return 1;
    }
    private function findGrade($student_no)
    {
        $class_id = $this->attributes['class_id'];
        $grade = NewGrade::where('student_no', 'LIKE', $student_no)
                        ->where('class_id', 'LIKE', $class_id)
                        ->first();
        return $grade;
    }
    public function getGrade($student_no)
    {
        $grade = $this->findGrade($student_no);

        return $grade->getGrade();
    }
    

    



    public function course()
    {
        return $this->belongsTo('App\Models\Neww\NewCourse', 'course_code', 'course_code');
    }

    public function instructor()
    {
        return $this->belongsTo('App\Models\Neww\NewEmployee', 'instructor_id', 'employee_no');
    }

    public function acadTerm()
    {
        return $this->belongsTo('App\Models\Neww\NewAcadTerm', 'acad_term_id', 'acad_term_id');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Neww\NewGrade', 'class_id', 'class_id');
    }

    public function curriculum()
    {
        return $this->belongsTo('App\Models\Neww\NewCurriculum', 'curriculum_id', 'curriculum_id');
    }
}
