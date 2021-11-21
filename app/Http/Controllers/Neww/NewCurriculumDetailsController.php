<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Neww\NewCurriculum;
use App\Models\Neww\NewCurriculumDetails;
use App\Models\Neww\NewCourse;

class NewCurriculumDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function filterCourses($id, $except_course = null) {
        $curriculum = NewCurriculum::find($id);
        $cur_details = NewCurriculumDetails::where('curriculum_id', $curriculum->curriculum_id)
                        ->orderBy('course_code', 'asc')->get();
        $all_courses = NewCourse::orderBy('course_code', 'asc')->get();

        $courses = array();

        foreach($all_courses as $course) {
            $found = false;
            foreach($cur_details as $cur_detail) {
                if($course->course_code == $except_course) {
                    break;
                } else if($course->course_code == $cur_detail->course_code) {
                    $found = true;
                    break;
                }
            }

            if(!$found)
                array_push($courses, $course);
        }

        return $courses;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $curriculum = NewCurriculum::find($id);
        $courses = $this->filterCourses($id);

        return view('neww.curriculum_details.create')
                ->with('curriculum', $curriculum)
                ->with('courses', $courses);
        //return view('neww.curriculum_details.create');
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
            'curriculum_id' => 'required',
            'course_code' => 'required',
            'year' => 'required',
            'semester' => 'required',
            //'is_year_active' => 'required'
        ]);

        // Add Curriculum Detail
        $cur_details = new NewCurriculumDetails;
        $cur_details->curriculum_id = $request->input('curriculum_id');
        $cur_details->course_code = $request->input('course_code');
        $cur_details->year = $request->input('year');
        $cur_details->semester = $request->input('semester');
        $cur_details->is_year_active = $request->input('is_year_active');
        $cur_details->save();

        //return dd($request);


        return redirect('/newcurriculum' .'/' . $request->input('curriculum_id'))->with('success', 'Course Added to Curriculum');
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
