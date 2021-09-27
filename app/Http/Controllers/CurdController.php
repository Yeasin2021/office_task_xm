<?php

namespace App\Http\Controllers;

use App\Curd;
use Illuminate\Http\Request;

class CurdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show blade file
        $data   =  Curd::all();
        //$dataum   =  Curd::all();
        return view('Curd/curd',compact('data',$data));
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
        //data add into a table 
        $flight                    = new Curd();
        $flight->Name              = $request->name;
        $flight->Address           = $request->address;
        $flight->Phone             = $request->phone;
        $flight->Email             = $request->email;
        $flight->Education         = $request->education;
        $flight->save();

        //only Api testing
        if($flight->save()){
           echo "Data Stored !!!!";
        }
        
        //return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curd  $curd
     * @return \Illuminate\Http\Response
     */
    public function show(Curd $curd)
    {
        //data iterate from table
        $data   =  Curd::all();
        //dd($data);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curd  $curd
     * @return \Illuminate\Http\Response
     */
    public function edit(Curd $curd,$id)
    {
        $dataum = Curd::find($id);
        return view('Curd/curd',compact('dataum',$dataum));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curd  $curd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curd $curd, $id)
    {
        //data update
        $dataum                    = Curd::find($id);
        $dataum->Name              = $request->name;
        $dataum->Address           = $request->address;
        $dataum->Phone             = $request->phone;
        $dataum->Email             = $request->email;
        $dataum->Education         = $request->education;
        $dataum->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curd  $curd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curd $curd, $id)
    {
        //delete data form table
        $delete = Curd::find($id);
        $delete->delete();
        return redirect()->back();
    }
}
