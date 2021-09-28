<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instractor extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'sex','email', 'address'];


    public function course(){
        return $this->hasMany('App\Models\Course');
    }
}
