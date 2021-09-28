<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";


    protected $fillable = ['course_name', 'course_desc'];


    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function semester(){
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class, 'grade_id');
    }


}
