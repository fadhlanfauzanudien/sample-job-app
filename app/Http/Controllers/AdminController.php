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
}
