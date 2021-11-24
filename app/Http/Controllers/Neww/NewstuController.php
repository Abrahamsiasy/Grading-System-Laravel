<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Neww\NewStudent;
use Illuminate\Support\Facades\Auth;

class NewstuController extends Controller
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

    public function index()
    {
        //
        $user_id = Auth::user()->student_no;
        $students = NewStudent::where('student_no', $user_id)->get();
        if (count($students) > 0) {
            return view('neww.stu.index')->with('students', $students);
        }
        else {
            return view('neww.students.index')->with('students', $students);
        }


        //$students = $this->getStudents();
        //return view('neww.students.stu')->with('students', $students)
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
    public function show($id)
    {
        //
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
