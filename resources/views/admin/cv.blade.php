@extends('layouts.app')

@section('content')
  <h1 class="text-center mt-2 mb-5">Manage CV</h1>
  <form action="/admin/cv/filter" method="POST" class="d-flex justify-content-end mb-3 mr-5">
    @csrf
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filter By Status
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <button type="submit" name="filter" value="no-filter" class="dropdown-item">No Filter</button>
        <button type="submit" name="filter" value="unread" class="dropdown-item">Unread</button>
        <button type="submit" name="filter" value="accepted" class="dropdown-item">Accepted</button>
        <button type="submit" name="filter" value="rejected" class="dropdown-item">Rejected</button>
      </div>
    </div>
  </form>
  <div class="container">
    @include('cv.list');
  </div>
@endsection