<?php

namespace App\Http\Controllers\old;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$student = Student::find($id)->course()->get();
        $students = Auth::user()->students;
        return view('home')->with('students', $students);
    }
}
