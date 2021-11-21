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


class NewClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // private function filterCourses($id) {
    //     $curriculum = NewCurriculum::find($id);
    //     $cur_details = NewCurriculumDetails::where('curriculum_id', $curriculum->curriculum_id)
    //                     ->orderBy('course_code', 'asc')->get();
    //     $all_courses = NewCourse::orderBy('course_code', 'asc')->get();

    //     $courses = array();

    //     foreach($all_courses as $course) {
    //         $found = false;
    //         foreach($cur_details as $cur_detail) {
    //             $course->course_code == $cur_detail->course_code;
    //             $found = true;
    //         }

    //         if(!$found)
    //             array_push($courses, $course);
    //     }

    //     return $courses;
    // }
    public function index()
    {
        $acad_terms = NewAcadTerm::all();
        $selected_acad_term = $acad_terms->first()->year;
        $cur_acad_term = $selected_acad_term;

        // if ( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        // } else {
        //     $selected_acad_term = $cur_acad_term;
        // }

        $classes = NewClass::where('acad_term_id', 'LIKE', $selected_acad_term)
                        ->orderBy('course_code')
                        ->orderBy('section')
                        ->paginate(10);

        return view('neww.classes.index')
                ->with('classes', $classes)
                ->with('acad_terms', $acad_terms)
                ->with('cur_acad_term', $cur_acad_term)
                ->with('selected_acad_term', $selected_acad_term);
        
        //return view('neww.classes.index');

        //$setting->value = $acad_term_id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $acad_term_id= "212501";
        $acad_terms = NewAcadTerm::all();
        $departments = NewCurriculum::all();
        //$cur_acad_term = NewAcadTerm::find($acad_term_id);
        //$selected_acad_term = $cur_acad_term;
        $instructors = NewEmployee::all();
        $courses = NewCourse::all();
        return view('neww.classes..create')
                ->with('courses', $courses)
                ->with('instructors', $instructors)
                ->with('departments', $departments)
                ->with('acad_terms', $acad_terms);

        //return view('neww.classes.create');
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
            'acad_term_id' => 'required',
            'course_code' => 'required',
            'instructor_id' => 'required',
            'section' => 'nullable',
            'room' => 'nullable',
        ]);

        $class = new NewClass;
        $class->acad_term_id = $request->input('acad_term_id');
        $class->acad_term_id = $request->input('department_name');
        $class->course_code = $request->input('course_code');
        $class->instructor_id = $request->input('instructor_id');
        $class->section = $request->input('section');
        $class->room = $request->input('room');


        $course = NewCourse::find($request->input('course_code'));
        $class->save();

        return redirect('/newclass/'. $class->class_id)->with('success', $class->course_code . ' class has been successfully created.');
    }

    public function enrollStudent($id)
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
        
        
        //return view('neww.classes.show');
        return view('neww.classes.show')
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
