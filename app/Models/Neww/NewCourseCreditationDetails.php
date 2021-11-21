<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCourseCreditationDetails extends Model
{
    use HasFactory;

    public function creditedCourse()
    {
        return $this->belongsTo('App\Models\Neww\NewCourseCreditation', 'credit_id', 'credit_id');
    }

    public function curriculumDetails()
    {
        return $this->belongsTo('App\Models\Neww\NewCurriculumDetails', 'curriculum_details_id', 'curriculum_details_id');
    }

    public function acadTerm()
    {
        return $this->belongsTo('App\Models\Neww\NewAcadTerm', 'acad_term_id', 'acad_term_id');
    }
}
