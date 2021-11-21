<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use App\Models\Neww\NewEmployee;
use App\Models\Neww\NewClass;
use DB;

use Illuminate\Http\Request;

class NewInstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getInstructors()
    {

        $instructors = NewEmployee::join('users', 'users.id', '=', 'new_employees.user_id')
            ->orderBy('users.name')
            ->paginate(15);

        return $instructors;
    }
    public function index()
    {
        //
        $instructors = $this->getInstructors();
        return view('neww.instructor.index')
            ->with('instructors', $instructors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employee_no)
    {
        //
        $instructor = NewEmployee::find($employee_no);
        $instructor=$instructor->employee_no;

        //$classes = DB::table('new_classes')->where('instructor_id', $instructor)->get();

        $classes = NewClass::where('instructor_id', 'LIKE', $instructor)
            ->orderBy('course_code')
            ->paginate(10);


        return view('neww.instructor.classes')
            ->with('classes', $classes)
            ->with('instructor', $instructor);

        return $classes;
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
