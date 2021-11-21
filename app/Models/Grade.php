<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = "grades";

    protected $fillable = ['mark', 'grade','status'];

    public function studentgrade(){
        return $this->hasMany('App\Models\Course');
    }

    

}
