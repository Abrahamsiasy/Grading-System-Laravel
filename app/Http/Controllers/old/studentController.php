<?php

namespace App\Http\Controllers\old;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Student;
use App\Models\Grade;
use App\Models\Course;
use App\Models\Semester;
use Illuminate\Support\Facades\Auth;



class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $studentlist = Auth::user()->students; 
        return view('student.index')->with('studentlist', $studentlist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.studentcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'gender'=>'required',
        ]);
        $student = new Student();

        $student -> full_name = $request->input('full_name');
        $student -> address = $request->input('address');
        $student -> sex = $request->input('gender');
        $student -> email = $request->input('email');
        $student->save();

        return redirect()-> to('/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calculator($id)
    {
        $estssum=0;
        $student = Student::find($id)->course()->get();
        foreach ($student as $students){
            if ($students->grade->grade == "A+") {
                $estssum = $estssum + $students->ests * 4;
                
            } elseif ($students->grade->grade == "A") {
                $estssum = $estssum + $students->ests * 3.5;
            }
            elseif ($students->grade->grade == "A-") {
                $estssum = $estssum + $students->ests * 3.5;
            }
            elseif ($students->grade->grade == "B+") {
                $estssum = $estssum + $students->ests * 3.5;
            } elseif ($students->grade->grade == "B") {
                $estssum = $estssum + $students->ests * 3.0;
            } elseif ($students->grade->grade == "B-") {
                $estssum = $estssum + $students->ests * 2.75;
            } elseif ($students->grade->grade == "C+") {
                $estssum = $estssum + $students->ests * 2.5;
            } elseif ($students->grade->grade == "C-") {
                $estssum = $estssum + $students->ests * 1.75;
            } elseif ($students->grade->grade == "D") {
                $estssum = $estssum + $students->ests * 1.0;
            } elseif ($students->grade->grade == "F-") {
                $estssum = $estssum + $students->ests * 0.0;
            } else {
                # code...
                $estssum = $estssum + $students->ests * 0.0;
            }
            
            
            }
            return $estssum;
        }


    public function show($id)
    {
        //
        $calcualtedGPA = $this->calculator($id);
        //$student single value
        $student = Student::find($id)->course()->get();
        //$studentgrade = Student::find(1)->grade()->get();

        $course = Course::with(['student','grade','semester'])->get();


        //multiple 
        //$students = Student::with('course')->get();

        //student to user students many to many realationship 
        //$students = Student::with('users')->get()

        //users with studnts role 
        //$users = User::with('students')->get();

        //$user = User::find(1);
        // foreach ($user->students as $role) {
        //     $role->id;
        // }
            



        
        //$smester = Semester::find($id)->semcourse;
        $smester = Semester::all();



        $s = Student::find($id)->course()->get();
        $estssum=0;

        //$sem = Semester::with('course')->find(2);
        //$semcourse = Semester::find(1)->course()->get();




        $ch = Course::where('student_id',$id)->sum('credithour');
        $ects = Course::where('student_id',$id)->sum('ests');
        
        


        //return view('student.studentdetail')->with('student', $student);
        return view('student.studentdetail',compact('student', 'ch', 'ects','smester','calcualtedGPA'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
