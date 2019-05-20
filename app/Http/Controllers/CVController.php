<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PDFRequest;

class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(PDFRequest $request)
    {
        $file = $request->file('cvFile');
        $path = $file->store('public/cv');
        
        $cv = new \App\CV();
        $cv->file = $path;
        $cv->name = $file->getClientOriginalName();
        $cv->user_id = Auth::user()->id;
        $cv->save();

        return back();
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
        $cv = \App\CV::find($id);
        $file_exists = \Storage::exists($cv->file);
        if($file_exists) {
            \Storage::delete($cv->file);
            $file = $request->file('cvFile');
            $path = $file->store('public/cv');
            $cv->file = $path;
            $cv->name = $file->getClientOriginalName();
            $cv->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function upload()
    {
        return view('cv.upload');
    }

    public function download($id)
    {
        $cv = \App\CV::find($id);
        return \Storage::download($cv->file, $cv->name);
    }
}
