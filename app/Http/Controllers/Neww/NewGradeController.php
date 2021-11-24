<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use App\Models\Neww\NewAcadTerm;
use App\Models\Neww\NewClass;
use App\Models\Neww\NewCurriculum;
use App\Models\Neww\NewGrade;
use App\Models\Neww\NewStudent;
use Illuminate\Http\Request;

class NewGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $acad_terms = NewAcadTerm::all();
        $selected_acad_term = $acad_terms->first()->year;
        $cur_acad_term = $selected_acad_term;

        // if (request()->has('select_acad_term')) {
            $selected_acad_term = request('select_acad_term');
        // } else {
        //     $selected_acad_term = $cur_acad_term;
        // }

        $classes = NewClass::where('acad_term_id', 'LIKE', $selected_acad_term)
            ->orderBy('course_code')
            ->orderBy('section')
            ->paginate(10);

        //return view('neww.grades.index');

        return view('neww.grades.index')
            ->with('classes', $classes)
            ->with('acad_terms', $acad_terms)
            ->with('cur_acad_term', $cur_acad_term)
            ->with('selected_acad_term', $selected_acad_term);
    }

    // public function enrollStudent($id)
    // {
    //     $class = NewClass::find($id);
    //     $grades = $class->grades;

    //     // Get students except those who are already enrolled
    //     $except_grades = [];

    //     foreach ($grades as $grade) {
    //         array_push($except_grades, $grade->student->student_no);
    //     }

    //     $students = NewStudent::join('users', 'users.id', '=', 'student.user_id')
    //         ->whereNotIn('student_no', $except_grades)
    //         ->orderBy('users.name')
    //         ->paginate(10);

    //     return view('neww.grades.create')
    //         ->with('grades', $grades)
    //         ->with('class', $class)
    //         ->with('students', $students);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $class = NewClass::find($id);

        $grades = NewGrade::join('new_students', 'new_grades.student_no', '=', 'new_students.student_no')
            ->join('users', 'users.id', '=', 'new_students.user_id')
            ->where('class_id', 'LIKE', $id)
            ->orderBy('new_students.student_no')->paginate(10);

        return view('neww.grades.show')
            ->with('class', $class)
            ->with('grades', $grades);
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
