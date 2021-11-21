<?php

namespace App\Models\Neww;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];   
    


    protected $casts = ['employee_no' => 'string'];
    protected $primaryKey = 'employee_no';
    public $timestamps = false;
    public $incrementing = false;


    public function getEmployeeNo()
    {
        $employee_no = $this->attributes['employee_no'];

        return $employee_no;
    }

    public function getTotalHandledClasses()
    {
        return count($this->classes);
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function classes()
    {
        return $this->hasMany('App\Models\Neww\NewClass', 'instructor_id', 'employee_no');
    }

    public function curriculumDetails()
    {
        return $this->belongsTo('App\Models\Neww\NewCurriculumDetails', 'curriculum_details_id', 'curriculum_details_id');
    }
}
