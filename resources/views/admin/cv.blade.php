@extends('layouts.app')

@section('content')
  <h1 class="text-center mt-2 mb-5">Manage CV</h1>
  <div class="container">
    @include('cv.list');
  </div>
@endsection