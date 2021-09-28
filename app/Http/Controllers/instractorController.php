<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instractor;

class instractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $instractorlist = Instractor::all();
        return view('instractor.index')->with('instractorlist', $instractorlist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('instractor.instractorcreate');
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
        //dd($request);
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'gender'=>'required',
        ]);
        $instractor = new Instractor();

        $instractor -> full_name = $request->input('full_name');
        $instractor -> address = $request->input('address');
        $instractor -> sex = $request->input('gender');
        $instractor -> email = $request->input('email');
        $instractor->save();

        return redirect()-> to('/instractor');

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
