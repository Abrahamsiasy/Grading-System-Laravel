<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCourseCreditation extends Model
{
    use HasFactory;

    public function getTotalCh() {
        $sum = 0;

        foreach($this->creditedCourses as $cur_detail) {
            $sum += $cur_detail->ch;
        }

        return $sum;
    }

    public function getTotalEcts() {
        $sum = 0;

        foreach($this->creditedCourses as $cur_detail) {
            $sum += $cur_detail->ects;
        }

        return $sum;
    }

    public function newstudent()
    {
        return $this->belongsTo('App\Models\NewStudent', 'student_no', 'student_no');
    }

    public function newcreditedCourses()
    {
        return $this->hasMany('App\Models\NewCourseCreditationDetails', 'credit_id', 'credit_id');
    }

}
