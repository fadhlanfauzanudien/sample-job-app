@extends('layouts.app')

@section('content')
    <div class="container card p-5">
      <span>
        <a href="/jobs"><i class="fas fa-long-arrow-alt-left icon"></i></a>
      </span>
      <h1 class="text-center">{{ $job->title }}</h1>
      <h3 class="text-center display-5">{{ $job->company }}</h3>
      <p class="mt-5">
        {{ $job->description }}
      </p>
      <form action="/jobs/apply/{{ $job->id }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success mt-5">Apply</button>
      </form>
    </div>
@endsection