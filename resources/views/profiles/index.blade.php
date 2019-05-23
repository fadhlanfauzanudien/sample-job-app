@extends('layouts.app')

@section('content')
  <div class="container profile-form">
    <div class="info">
    
    <h1 class="mt-3 text-center">Your Personal Profile</h1>
    @if (session()->has('message'))     
      <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
      </div>
    @endif
    @if(Auth::user()->image != null)
      <form action="/image/{{ Auth::user()->image->id }}" method="POST" enctype="multipart/form-data" class="border-top mt-5">
        @csrf
        @method('PUT')
        <div class="form-row pt-5 mt-3">
          <div class="input-group col-5 mx-auto mb-5 d-flex flex-column justify-content-center">
            <img class="profile-photo" src="{{ Auth::user()->image->file }}" alt="profile=photo">
            <div>
              <div class="custom-file">
                <input type="file" name="imageFile" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Change Photo</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Change Photo</button>
            @error('imageFile')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </form>
    @else
      <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row pt-5 mt-3">
          <div class="input-group col-5 mx-auto mb-5 d-flex flex-column justify-content-center">
            <div class="mb-5 text-center">You dont have photo profile, Upload now!</div>
            <div>
              <div class="custom-file">
                <input type="file" name="imageFile" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Upload Photo</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            @error('imageFile')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </form>
    @endif
    <form action="/user/{{ Auth::user()->id }}" class="border-top mt-5" method="POST">
      @csrf
      @method('PUT')
      <h3 class="text-center my-5">Basic Info</h3>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="firstname">Firstname</label>
          <input class="form-control" type="text" name="firstname" value="{{ $firstname }}">
        </div>
        <div class="form-group col-6">
          <label for="lastname">Lastname</label>
          <input class="form-control" type="text" name="lastname" value="{{ $lastname }}">
        </div>
      </div>

      <div class="form-row">
          <div class="form-group pl-0 col-6">
            <label for="dateOfBirth">Date Of Birth</label>
            <input type="date" class="form-control" value="{{ $date }}" readonly>
          </div>
        <div class="form-group col-6">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" value="{{ $email }}" readonly>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <button class="btn btn-secondary">Cancel</button>
    </form>


    <form action="@if($profile != null) /profile/{{$profile->id }} @else /profile @endif" method="POST" class="border-top mt-5">
      @csrf
      @if($profile != null)
        @method('PUT')
      @endif
      <h3 class="text-center my-5">Details</h3>
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <div class="form-row">
        <div class="form-group col-6">
          <label for="gender">Gender</label>
          <select class="form-control" name="gender" >
            <option value="male" {{ $profile != null && ($profile->gender == 'male') ? 'selected' : ''}}>Male</option>
            <option value="female" {{ $profile != null && ($profile->gender == 'female') ? 'selected' : ''}}>Female</option>
          </select>
        </div>
        <div class="form-group col-6">
          <label for="phone">Phone Number</label>
          <input class="form-control" type="text" name="phone" placeholder="ex: 089123123123" value="@if($profile != null) {{ $profile->phone }} @endif">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="address1">Address 1</label>
          <input class="form-control" type="text" name="address1" placeholder="Your Address" value="@if($profile != null) {{ $profile->address1 }} @endif">
        </div>
        <div class="form-group col-6">
          <label for="address2">Address 2</label>
          <input class="form-control" type="text" name="address2" placeholder="Your Address" value="@if($profile != null) {{ $profile->address2 }} @endif">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="city">City</label>
          <input class="form-control" type="text" name="city" placeholder="City" value="@if($profile != null) {{ $profile->city }} @endif">
        </div>
        <div class="form-group col-6">
          <label for="postCode">Post Code</label>
          <input class="form-control" type="text" name="postCode" placeholder="Post Code" value="@if($profile != null) {{ $profile->postCode }} @endif">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="country">Country</label>
          <input class="form-control" type="text" name="country" placeholder="Country" value="@if($profile != null) {{ $profile->country }} @endif">
        </div>
        <div class="form-group col-6">
          <label for="province">Province</label>
          <input class="form-control" type="text" name="province" placeholder="Province" value="@if($profile != null) {{ $profile->province }} @endif">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <button class="btn btn-secondary">Cancel</button>
    </form>
  </div>
</div>
@endsection