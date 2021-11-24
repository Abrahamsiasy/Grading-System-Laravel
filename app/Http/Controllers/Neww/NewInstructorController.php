<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use App\Models\Neww\NewEmployee;
use App\Models\Neww\NewClass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
    // public function index()
    // {
    //     //
    //     $instructors = $this->getInstructors();
    //     return view('neww.instructor.index')
    //         ->with('instructors', $instructors);
    // }

    public function index()
    {
        //
        
        // $instructors = $this->getInstructors();
        // return view('neww.instructors.index')->with('instructors', $instructors);


        //
        $user_id = Auth::user()->id;
        $instructors = NewEmployee::where('user_id', $user_id)->get();
        

        $instdentrole = User::whereHas("roles", function($q){ $q->where('name', 'instartor'); })->get();
        $users_with_instructor_role_id_list = array();
        foreach ($instdentrole as $strole){
            $users_with_instructor_role_id_list[] = $strole->id;
        }

        if(in_array($user_id, $users_with_instructor_role_id_list)){
            NewEmployee::where('user_id', $user_id)->get();
            return view('neww.instructor.inst')->with('instructors', $instructors);
        }
        else {
            $instructors = $this->getInstructors();
            return view('neww.instructor.index')->with('instructors', $instructors);
        }
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
