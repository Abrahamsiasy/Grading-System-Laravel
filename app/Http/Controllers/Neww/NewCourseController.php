<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Neww\NewCourse;
use App\DataTables\newcourseDataTable;

use DataTables;


class NewCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(newcourseDataTable $dataTable)
    {
        //
        
        //$courses = NewCourse::orderBy('course_code')->paginate(15);
        //return view('neww.courses.index')->with('courses', $courses);
        //return view('neww.courses.index');

        return $dataTable->render('neww.courses.index');

    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = NewCourse::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
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
        return view('neww.courses.create');
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
            'course_code' => 'required',
            'description' => 'required',
            'ch' => 'required',
            'ects' => 'required'
        ]);

        //Add New cource 
        $course = new NewCourse;
        $course->course_code = $request->input('course_code');
        $course->description = $request->input('description');
        $course->ch = $request->input('ch');
        $course->ects = $request->input('ects');
        $course->save();

        return redirect('/newcourse')->with('success', 'Course Created');
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
