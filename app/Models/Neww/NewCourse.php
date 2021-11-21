<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'description ',
        'ch',
        'ects',
        'created_at ',
    ];

    protected $primaryKey = 'course_code';
    protected $casts = ['course_code' => 'string'];
    public $incrementing = false;


    public function getCourse()
    {
        $course_code = $this->attributes['course_code'];
        $description = $this->attributes['description'];

        return $course_code . ' ' . $description;
    }


    public function getCredits()
    {
        $credits = $this->attributes['ch'];
        $ectss = $this->attributes['ects'];


	    return $credits . ' CH , '. $ectss . ' ECTS';
    }
    public function curriculumDetails()
    {
        return $this->hasMany('App\Models\Neww\NewCurriculumDetails', 'course_code', 'course_code');
    }


}
