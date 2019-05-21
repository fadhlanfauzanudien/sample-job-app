<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use \App\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('apply')) {
            $jobs = Job::all()->where('status', 'show');
    
            return view('jobs.index')->with('jobs', $jobs);
        } else {
            return redirect('/profile');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Job::class);
        return view('jobs.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $this->authorize('create', Job::class);
        Job::create($request->all());

        return redirect('/admin/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);

        return view('jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        $this->authorize('update', $job);

        return view('jobs.edit')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        $job = Job::find($id);
        $this->authorize('update', $job);
        $job->update($request->all());

        return redirect('/admin/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $this->authorize('delete', $job);
        Job::destroy($id);

        return back();
    }

    /**
     * Change job status. 
     * if status is show then job will be showed in index
     * otherwise will be hidden from non admin user
     */
    public function changeStatus(Request $request, $id)
    {
        $job = Job::find($id);
        $this->authorize('update', $job);
        $job->status = $request->status;
        $job->save();

        return back();
    } 

    public function apply($id)
    {
        $job = Job::find($id);
        $user = Auth::user();
        if ($user->cv->status === 'accepted') {
            $user->jobs()->syncWithoutDetaching($job);

            $message = 'Lamaran telah dikirim!'; 
            $nextPage = '/jobs';
            return view('jobs.apply', compact('message', 'nextPage'));
        } elseif ($user->cv->status === 'unread') {
            $message = 'Your CV has not been accepted by admin';
            $nextPage = '/jobs';
            return view('jobs.apply', compact('message', 'nextPage'));
        } else {
            $message = 'Your CV has been Rejected! Please re-upload your new CV';
            $nextPage = '/cv/upload';
            return view('jobs.apply', compact('message', 'nextPage'));
        }
    }
}
