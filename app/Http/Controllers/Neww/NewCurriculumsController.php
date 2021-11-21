<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Neww\NewCurriculum;
use App\Models\Neww\NewCurriculumDetails;


class NewCurriculumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $curriculums = NewCurriculum::orderBy('curriculum_id', 'desc')->paginate(15);

        return view('neww.curriculums.index')->with('curriculums', $curriculums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('neww.curriculums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // function department_name_to_number(Request $request)
    // {
    //     $this->validate($request, [
    //         'curriculum_id' => 'required',
    //         'department_name' => 'required',
    //         'effective_year' => 'required'
    //     ]);

    //     $department_name = $request->input('department_name');
    //     $splitted = str_split($department_name);

    //     foreach ($splitted as $value) {
    //         $asichvalues[] = ord($value);
    //       }
    //     return join($asichvalues);
    // }
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'curriculum_id' => 'required',
            'department_name' => 'required',
            'effective_year' => 'required'
        ]);

        // Add Curriculum
        $department_name = $request->input('department_name');
        $c_id = $request->input('curriculum_id');
        

        $splitted = str_split($department_name);

        foreach ($splitted as $value) {
            $asichvalues[] = ord($value);
          }
        $joind= join($asichvalues);

        $curriculum_id = $c_id . $joind;
        $curriculum = new NewCurriculum;
        $curriculum->curriculum_id = $curriculum_id;
        $curriculum->department_name = $request->input('department_name');
        $curriculum->effective_year = $request->input('effective_year');
        $curriculum->save();

        return redirect('/newcurriculum')->with('success', 'Curriculum Created');
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
        $curriculum = NewCurriculum::find($id);

        $curriculum_details = NewCurriculumDetails::where('curriculum_id', $curriculum->curriculum_id)
            ->orderBy('year', 'asc')->orderBy('semester', 'asc')->get()->groupBy('year');


        return view('neww.curriculums.show')
            ->with('curriculum', $curriculum)
            ->with('curriculum_details', $curriculum_details);
        //return view('neww.curriculums.show');
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
        $curriculum = NewCurriculum::find($id);

        $curriculum->delete();
        return redirect()->to('/newcurriculum');
    }
}
