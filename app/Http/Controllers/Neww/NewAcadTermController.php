<?php

namespace App\Http\Controllers\Neww;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Neww\NewAcadTerm;


class NewAcadTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acadTerms = NewAcadTerm::orderBy('acad_term_id', 'desc')->paginate(15);
        return view('neww.acad_terms.index')->with('acadTerms', $acadTerms);
        //return view('neww.acad_terms.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('neww.acad_terms.create');
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
            'year' => 'required|min:4|max:9',
            'semester' => 'required'
        ]);

        $acad_term_id = substr($request->input('year'), 2, 2) . substr($request->input('year'), 7, 7) . $request->input('semester');

        $acadTerm = new NewAcadTerm;
        $acadTerm->acad_term_id = $acad_term_id;
        $acadTerm->year = $request->input('year');
        $acadTerm->semester = $request->input('semester');
        $acadTerm->save();

        return redirect('/newacad_term')->with('success', $acadTerm->getAcadTerm() . 'success Academic Term Created');
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
