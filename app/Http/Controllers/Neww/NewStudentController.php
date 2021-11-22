<?php

namespace App\Http\Controllers\Neww;

use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Neww\NewStudent;
use App\Models\Neww\NewClass;
use App\Models\Neww\NewGrade;
use App\Models\Neww\NewAcadTerm;
use App\Models\Neww\NewCurriculum;
use App\Models\Neww\NewCurriculumDetails;
use Illuminate\Support\Facades\Auth;



class NewStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getStudents()
    {

        $students = NewStudent::join('users', 'users.id', '=', 'new_students.user_id')
            ->orderBy('users.name')
            ->paginate(15);

        return $students;
        
    }

    private function getUser(){
        $studentss = Auth::user()->students;
        return $studentss;
    }

    public function studentCourseGrade()
    {
    }

    public function index()
    {
        //

        $students = $this->getStudents();
        return view('neww.students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $curriculums = NewCurriculum::all();
        $acad_terms = NewAcadTerm::all();
        $cur_acad_term = $acad_terms->first()->acad_term_id;
        $cur_curriculum_id = $curriculums->first()->curriculum_id;

        return view('neww.students.create')
            ->with('curriculums', $curriculums)
            ->with('acad_terms', $acad_terms)
            ->with('cur_acad_term', $cur_acad_term)
            ->with('cur_curriculum_id', $cur_curriculum_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'student_no' => 'required|unique:new_students|min:5|max:10',
            'acad_term_admitted_id' => 'required|exists:new_acad_terms,acad_term_id',
            'curriculum_id' => 'required|exists:new_curriculum',
            'name' => 'required',
            'email' => 'required',
        ]);


        // Add Student
        // , Password: student name
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('name'));
        $user->save();

        $user->assignRole('student');

        $student = new NewStudent;
        $student->student_no = $request->input('student_no');
        $student->student_type = $request->input('student_type');
        $student->curriculum_id = $request->input('curriculum_id');
        $student->acad_term_admitted_id = $request->input('acad_term_admitted_id');
        $student->user_id = $user->id;
        $student->save();

        return redirect('/newstudent')->with('success', 'Student ' . $student->getStudentNo() . ' Created. Default password is the user name.' . $user->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($curriculum_id, $student_no)
    {
        //

        //new new trial to be done with soon
        $curriculum = NewCurriculum::find($curriculum_id);
        $student = NewStudent::find($student_no);
        $student_no = $student->student_no;

        //report trial
        $grades = NewGrade::where('student_no', 'LIKE', $student_no)->get();

        //$filtered_grades = array();

        // foreach ($grades as $grade) {
        //     if ($grade->class->curriculum == $curriculum) {
        //         array_push($filtered_grades, $grade);
        //     }
        // }

        $curriculum_details = NewCurriculumDetails::where('curriculum_id', $curriculum->curriculum_id)
            ->orderBy('year', 'asc')->orderBy('semester', 'asc')->get()->groupBy('year');



        $course_list = [];
        $cc = '';
        foreach ($grades as $grade){

            $course_list[]=$grade->curriculumDetails->course_code;
        }
        


        return view('neww.students.show')
            ->with('curriculum', $curriculum)
            ->with('student', $student)
            ->with('grades', $grades)
            ->with('course_list', $course_list)
            ->with('curriculum_details', $curriculum_details);
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
