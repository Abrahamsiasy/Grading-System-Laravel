<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Neww\NewClass;
use App\Models\Neww\NewCourse;
use App\Models\Neww\NewGrade;
use App\Models\Neww\NewCurriculum;
use App\Models\User;
use App\Models\Neww\NewAcadTerm;
use App\Models\Neww\NewEmployee;

use App\Models\Neww\NewStudent;

class NewEnrollStudentsController extends Controller
{
    public function index()
    {
    }

    public function enrollStudent($id)
    {
        // $this->validate($request, [
        //     'student_no' => 'required',
        //     'class_id' => 'required',
        // ]);

        // Add Grade
        // $grade = new NewGrade;
        // $grade->class_id = $request->input('class_id');
        // $grade->student_no = $request->input('student_no');
        // $grade->curriculum_details_id = $request->input('curriculum_details_id');
        // $grade->save();


        $class = NewClass::find($id);
        $grades = $class->grades;

        // Get students except those who are already enrolled
        $except_grades = [];

        foreach ($grades as $grade) {
            array_push($except_grades, $grade->student->student_no);
        }

        $students = NewStudent::join('users', 'users.id', '=', 'new_students.user_id')
            ->whereNotIn('student_no', $except_grades)
            ->orderBy('users.name')
            ->paginate(10);

        return view('neww.classes.enroll')
            ->with('grades', $grades)
            ->with('class', $class)
            ->with('students', $students);
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
        $this->validate($request, [
            'student_no' => 'required',
            'class_id' => 'required',
        ]);

        // Add Grade
        $grade = new NewGrade;
        $grade->class_id = $request->input('class_id');
        $grade->student_no = $request->input('student_no');
        $grade->curriculum_details_id = $request->input('curriculum_details_id');
        $grade->save();


        return redirect('/newclass/' . $request->input('class_id'))->with('success', 'Student Enrolled');
    }

    public function show($id)
    {

        $class = NewClass::find($id);
        $grades = $class->grades;

        // Get students except those who are already enrolled
        $except_grades = [];

        foreach ($grades as $grade) {
            array_push($except_grades, $grade->student->student_no);
        }

        $students = NewStudent::join('users', 'users.id', '=', 'new_students.user_id')
            ->whereNotIn('student_no', $except_grades)
            ->orderBy('users.name')
            ->paginate(10);

        return view('neww.classes.enroll')
            ->with('grades', $grades)
            ->with('class', $class)
            ->with('students', $students);
    }
}
