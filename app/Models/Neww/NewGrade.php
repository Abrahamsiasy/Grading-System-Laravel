<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewGrade extends Model
{
    use HasFactory;

    protected $primaryKey = 'grade_id';
    public $timestamps = false;

    public function getCourseCode()
    {
        return $this->curriculumDetails->course_code;
    }

    public function getDescription()
    {
        return $this->curriculumDetails->course->description;
    }

    public function getTotalScore()
    {
        $others = $this->attributes['others'];
        $midterms = $this->attributes['midterms'];
        $finals = $this->attributes['finals'];

        if($finals == null)
            return null;

        $totalScore = ($others + $midterms + $finals);
        $totalScore = $totalScore;

        return number_format($totalScore, '2', '.', '');
    }

    public function getGradeLetter($totalScore)
    {
        if ($totalScore == null)
            return null;

        $totalScore = round( $totalScore );

        if ($totalScore >= 85 && $totalScore <= 100)
            return 'A';
        else if ($totalScore >= 70 && $totalScore <= 84)
            return 'B';
        else if ($totalScore >= 55 && $totalScore <= 69)
            return 'C';
        else if ($totalScore >= 50 && $totalScore <= 54)
            return 'D';
        else if ($totalScore >= 40 && $totalScore <= 49)
            return 'FX';
        else if ($totalScore <= 40)
            return 'F';
    }

    public function getGrade()
    {


        $totalScore = $this->getTotalScore();

        return $this->getGradeLetter($totalScore);
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Neww\NewStudent', 'student_no', 'student_no');
    }

    public function class()
    {
        return $this->belongsTo('App\Models\Neww\NewClass', 'class_id', 'class_id');
    }

    public function curriculumDetails()
    {
        return $this->belongsTo('App\Models\Neww\NewCurriculumDetails', 'curriculum_details_id', 'curriculum_details_id');
    }
}
