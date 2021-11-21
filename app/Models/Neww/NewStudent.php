<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewStudent extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_no';
    protected $casts = ['student_no' => 'string'];
    public $incrementing = false;



    public function getStudentNo()
    {
        $student_no = $this->attributes['student_no'];

        return substr($student_no, 0, 2) . '-' .
               substr($student_no, 2, 4);
    }

    public function getStudnetCurriculum()
    {
        //user id or student id to cariculum 
        $studentCurriculum = $this->attributes['curriculum_id'];

        return $studentCurriculum;
    }

    public function gradedGrades()
    {
        return count($this->grades);
    }

    public function studentCourseGrade(){
        return count($this->grades);
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function acadTerm()
    {
        return $this->belongsTo('App\Models\Neww\NewAcadTerm', 'acad_term_admitted_id', 'acad_term_id');
    }

    public function curriculum()
    {
        return $this->belongsTo('App\Models\Neww\NewCurriculum', 'curriculum_id', 'curriculum_id');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Neww\NewGrade', 'student_no', 'student_no');
    }

    public function creditedCourses()
    {
        return $this->hasMany('App\Models\Neww\CourseCreditation', 'student_no', 'student_no');
    }
}
