<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewAcadTerm extends Model
{
    use HasFactory;


    public function getSem()
    {
        $sem = $this->attributes['semester'];

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
                $sem = 'summerrr';
                break;
    		default:
    			break;
        }

        return $sem;
    }

    public function getAcadTerm()
    {
    	$year = $this->attributes['year'];
        $sem = $this->getSem();

    	return 'YEAR. ' . $year . ' ' . $sem;
	}


    public function newStudents()
    {
        return $this->hasMany('App\Models\Neww\NewStudent', 'acad_term_admitted_id', 'acad_term_id');
    }

    public function newClasses()
    {
        return $this->hasMany('App\Models\Neww\NewClass', 'acad_term_id', 'acad_term_id');
	}

    public function creditedCourses()
    {
        return $this->hasMany('App\Models\Neww\CourseCreditationDetails', 'acad_term_id', 'acad_term_id');
	}
}
