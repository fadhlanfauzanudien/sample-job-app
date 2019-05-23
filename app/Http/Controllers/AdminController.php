<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Gate::allows('view-admin-dashboard')) {
            $jobs = \App\Job::all();
            return view('admin.dashboard')->with('jobs', $jobs);
        } else {
            return abort(403, 'You are not Admin');
        }
    }

    public function cv()
    {
        if (Gate::allows('view-admin-dashboard')) {
            $CVs = \App\CV::where('status', '!=', 'accepted')->get();
            return view('admin.cv')->with('CVs', $CVs);
        } else {
            return abort(403, 'You are not Admin');
        }
    }

    public function users()
    {
        if (Gate::allows('view-admin-dashboard')) {
            $users = \App\User::all();
            return view('admin.userslist')->with('users', $users);
        } else {
            return abort(403, 'You are not Admin');
        }
    }
}
