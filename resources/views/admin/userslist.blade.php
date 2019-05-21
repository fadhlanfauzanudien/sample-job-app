@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5 mt-2">Manage Users</h1>    
    <table class="table">
        <thead>
            <tr>
            <th>No</th>
            <th scope="col">firstname</th>
            <th scope="col">lastname</th>
            <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
            <td></td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection