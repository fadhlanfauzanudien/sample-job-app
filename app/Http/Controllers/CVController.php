<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
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
        if ($request->has('cvFile')) {
            DB::beginTransaction();

            try {
                $file = $request->file('cvFile');
                $path = $file->store('public/cv');
                $cv = new \App\CV();
                $cv->file = $path;
                $cv->name = $file->getClientOriginalName();
                $cv->user_id = Auth::user()->id;
                $cv->save();
            } catch(\Exception $e) {
                DB::rollBack();

                return back()->with('error', $e->getErrors());
            }

            DB::commit();
            return back();
        }

        
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
    public function update(PDFRequest $request, $id)
    {
        $cv = \App\CV::find($id);
        $file_exists = \Storage::exists($cv->file);
        if($file_exists) {
            DB::beginTransaction();
            
            try {
                \Storage::delete($cv->file);
                $file = $request->file('cvFile');
                $path = $file->store('public/cv');
                $cv->file = $path;
                $cv->name = $file->getClientOriginalName();
                $cv->status = 'unread';
                $cv->save();
            } catch(\Exception $e) {
                DB::rollBack();
                return back()->with('message', $e->getErrors());
            }

            DB::commit();
            return back();
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
        if (Gate::allows('apply')) {
            return view('cv.upload');
        } else {
            return redirect('/profile');
        }
        
    }

    public function download($id)
    {
        $cv = \App\CV::find($id);
        return \Storage::download($cv->file, $cv->name);
    }

    public function accept($id)
    {
        $cv = \App\CV::find($id);
        $cv->status = 'accepted';
        $cv->save();
        return back();
    }

    public function reject($id)
    {
        $cv = \App\CV::find($id);
        $cv->status = 'rejected';
        $cv->save();

        return back();
    }
}
