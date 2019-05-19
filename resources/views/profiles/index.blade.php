@extends('layouts.app')

@section('content')
  <div class="container profile-form">
    <h1>Your Personal Profile</h1>
    <form action="">
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
            <input type="date" class="form-control" value="{{ $date }}">
          </div>
        <div class="form-group col-6">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" value="{{ $email }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="gender">Gender</label>
          <select class="form-control" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="form-group col-6">
          <label for="phone">Phone Number</label>
          <input class="form-control" type="text" name="phone" placeholder="ex: 089123123123">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="address-1">Address 1</label>
          <input class="form-control" type="text" name="address-1" placeholder="Your Address">
        </div>
        <div class="form-group col-6">
          <label for="address-2">Address 2</label>
          <input class="form-control" type="text" name="address-2" placeholder="Your Address">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="city">City</label>
          <input class="form-control" type="text" name="city" placeholder="City">
        </div>
        <div class="form-group col-6">
          <label for="postCode">Post Code</label>
          <input class="form-control" type="text" name="postCode" placeholder="Post Code">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="country">Country</label>
          <input class="form-control" type="text" name="country" placeholder="Country">
        </div>
        <div class="form-group col-6">
          <label for="province">Province</label>
          <input class="form-control" type="text" name="province" placeholder="Province">
        </div>
      </div>
      <button class="btn btn-primary">Save</button>
      <button class="btn btn-secondary">Cancel</button>
    </form>
  </div>
@endsection