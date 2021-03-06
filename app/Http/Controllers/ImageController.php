<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Http\Requests\ImageRequest;
use \App\Image;

class ImageController extends Controller
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
    public function store(ImageRequest $request)
    {
        $file = $request->file('imageFile');

        $destination_path = 'uploads/';

        $filename = str_random(6).'_'.$file->getClientOriginalName();
        
        $file->move($destination_path, $filename);


        $path = $destination_path . $filename;
        
        $image = new Image();
        $image->file = $path;
        $image->user_id = Auth::user()->id;
        $image->save();

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
        $image = Image::find($id);

            if ($request->hasFile('imageFile')) {
                $file = $request->file('imageFile');
                $filename = str_replace('uploads/', '', $image->file);
                // nama file ditambah dengan random string
                $destination_path = 'uploads/';
                $file->move($destination_path, $filename);
                $image->file = $destination_path . $filename;
                $image->save();
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
        //
    }
}
