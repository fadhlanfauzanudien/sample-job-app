@extends('layouts.app')

@section('content')
  <div class="container d-flex flex-column align-items-center">
    <h1 class="text-center my-5">{{ $message }}</h1>
    <a href="{{ $nextPage }}" class="btn btn-primary text-center">OK</a>
  </div>
@endsection