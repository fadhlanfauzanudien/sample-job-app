@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <div class="container">
    <h1 class="text-center mb-5 mt-2">Admin Dashboard</h1>
    <ul class="nav d-flex justify-content-center mb-5">
      <li class="nav-item">
        <a href="/admin/cv" class="btn btn-primary mr-2">Manage CV</a>
      </li>
      <li class="nav-item">
        <a href="/admin/users" class="btn btn-primary">Manage Users</a>
      </li>
    </ul>
    @if($jobs->count() > 0)
@foreach ($jobs as $job)
  <div class="card job">
    <div>
      <div class="d-flex justify-content-between align-items-center">
        <a href="/jobs/{{ $job->id }}"><h1 class="job__title d-inline">{{ $job->title }}</h1></a>
        @if ($job->status === 'show')  
          <span class="badge badge-success">Active</span>
        @else
          <span class="badge badge-danger">Hidden</span>
        @endif
      </div>
      <h2 class="job__company">{{ $job->company }}</h2>
      <p class="job__description mt-4">{!! str_limit($job->description, 150) !!}</p>
      <div class="job__footer mt-2">
        <p class="job__location">Location: {{ $job->city }}</p>
        <div class="d-flex">
          <form action="/jobs/changeJobStatus/{{ $job->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Option
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if ($job->status == 'show')
                  <button type="submit" name="status" value="hide" class="dropdown-item">Hide</button>
                @else
                  <button type="submit" name="status" value="show" class="dropdown-item">Show</button>
                @endif
                <a class="dropdown-item" href="/jobs/{{ $job->id}}/edit">Edit</a>
              </div>
            </div>
          </form>
          <form action="/jobs/{{ $job->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link" href="">Delete</button>
          </form>
        </div>
      </div>      
    </div>
  </div>
@endforeach
@else

  <h1 class="text-center">No Jobs Posted</h1>

@endif
    </div>
@endsection