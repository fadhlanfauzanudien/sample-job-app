<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();
        return back();
    }
}
