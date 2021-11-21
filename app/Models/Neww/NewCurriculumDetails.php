<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCurriculumDetails extends Model
{
    use HasFactory;

    protected $table = 'new_curriculum_details';
    protected $primaryKey = 'curriculum_details_id';
    public $timestamps = false;

    public function getAcadTerm()
    {
        $year = $this->attributes['year'];
        $sem = $this->attributes['semester'];

        switch ($year) {
            case 1:
                $year = '1st';
                break;
            case 2:
                $year = '2nd';
                break;
            case 3:
                $year = '3rd';
            case 4:
                $year = '4th';
            case 5:
                $year = '5th';

            case 6:
                $year = '6rd';
                break;

            default:
                $year =  $year . 'th';
                break;
        }

        switch ($sem) {
            case 1:
                $sem = '1st Semester';
                break;
            case 2:
                $sem = '2nd Semester';
                break;
            case 3:
                $sem = '3rd Semester';
                break;
            case 4:
                $sem = 'Summer';
                break;

            default:
                break;
        }

        return $year . ' Year ' . $sem;
    }




    public function curriculum()
    {
        return $this->belongsTo('App\Models\Neww\NewCurriculum', 'curriculum_id', 'curriculum_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Neww\NewCourse', 'course_code', 'course_code');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Neww\NewGrade', 'curriculum_details_id', 'curriculum_details_id');
    }

    public function creditedCourses()
    {
        return $this->hasMany('App\Models\Neww\NewCourseCreditationDetails', 'curriculum_details_id', 'curriculum_details_id');
    }
}
