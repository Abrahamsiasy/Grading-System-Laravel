<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCurriculum extends Model
{
    use HasFactory;

    protected $table = 'new_curriculum';
    protected $primaryKey = 'curriculum_id';
    public $timestamps = false;

    public function getTotalCh() {
    	$curriculum_id = $this->attributes['curriculum_id'];
        $cur_details = NewCurriculumDetails::where('curriculum_id', $curriculum_id)->get();

        $sum = 0;

        foreach($cur_details as $cur_detail) {
            $sum += $cur_detail->course->ch;
        }

        return $sum;
    }

    public function getTotalEcts() {
    	$curriculum_id = $this->attributes['curriculum_id'];
        $cur_details = NewCurriculumDetails::where('curriculum_id', $curriculum_id)->get();

        $sum = 0;

        foreach($cur_details as $cur_detail) {
            $sum += $cur_detail->course->ects;
        }

        return $sum;
    }



    public function getSemTotalCh() {
    	$curriculum_id = $this->attributes['curriculum_id'];
        $cur_details = NewCurriculumDetails::where('curriculum_id', $curriculum_id)->get();

        $sum = 0;

        foreach($cur_details as $cur_detail) {
            $sum += $cur_detail->course->ch;
        }

        return $sum;
    }

    public function getSemTotalEcts() {
    	$curriculum_id = $this->attributes['curriculum_id'];
        $cur_details = NewCurriculumDetails::where('curriculum_id', $curriculum_id)->get();

        $sum = 0;

        foreach($cur_details as $cur_detail) {
            $sum += $cur_detail->course->ects;
        }

        return $sum;
    }

    public function getCources(){
        $curriculum_id = $this->attributes['curriculum_id'];
        $cur_details = NewCurriculumDetails::where('curriculum_id', $curriculum_id)->get();
        $cources = [];
    }

    public function curriculumDetails()
    {
        return $this->hasMany('App\Models\Neww\NewCurriculumDetails', 'curriculum_id', 'curriculum_id');
    }

    public function classes()
    {
        return $this->hasMany('App\Models\Neww\NewClass', 'curriculum_id', 'curriculum_id');
    }

    public function students()
    {   
        return $this->hasMany('App\Models\Neww\NewStudent', 'curriculum_id', 'curriculum_id');
    }
}
