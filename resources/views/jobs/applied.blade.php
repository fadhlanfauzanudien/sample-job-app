@extends('layouts.app')

@section('content')
  @if ($jobs != null)
      
    <table class="table">
      <thead>
          <tr>
          <th>No</th>
          <th scope="col">Position</th>
          <th scope="col">Company</th>
          <th scope="col">Time When Applied</th>
          </tr>
      </thead>
    <tbody>
    @foreach ($jobs as $job)
        <tr>
        <td></td>
        <td>{{ $job->title }}</td>
        <td>{{ $job->company }}</td>
        <td>{{ $job->pivot->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
  @else 
    <h2 class="text-center mt-5">You havent applied for a job</h2>
  @endif

@endsection
