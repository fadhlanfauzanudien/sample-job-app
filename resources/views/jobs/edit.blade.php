@extends('layouts.main')

@section('title', 'Edit Job')

@section('content')
<form class="col-sm-8 mx-auto" action="/jobs/{{ $job->id }}" method="POST">
  @csrf
  @method('PUT')
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Job Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" placeholder="Job Title" value="{{ $job->title }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea rows="10" type="password" class="form-control" name="description" placeholder="Job Description">{{$job->description }}</textarea>
        </div>
    </div>
    <div class="form-group row">
      <label for="company" class="col-sm-2 col-form-label">Company</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="company" placeholder="Company name" value="{{ $job->company }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="city" class="col-sm-2 col-form-label">City</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="city" placeholder="Job place" value="{{ $job->city }}">
      </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Edit Job</button>
        </div>
    </div>
</form>
@endsection