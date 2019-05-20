@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="card pt-5">
        <h1 class="text-center">Upload Your CV</h1>
        @if(Auth::user()->cv != null)
      <form action="/cv/{{ Auth::user()->cv->id }}" method="POST" enctype="multipart/form-data" class="border-top mt-5">
        @csrf
        @method('PUT')
        <div class="form-row pt-5 mt-3">
          <div class="input-group col-5 mx-auto mb-5 d-flex flex-column justify-content-center">
            <div class="align-self-center d-flex flex-column align-items-center">
              <img class="mb-1" src="{{ asset('/images/icon-cv.png') }}" alt="cv icon" width="100" height="100">
              <p>{{ Auth::user()->cv->name }}</p>
              <a class="btn btn-success align-self-center mb-5" href="download/{{ Auth::user()->cv->id }}">Download</a>
            </div>
            <div>
              <div class="custom-file">
                <input type="file" name="cvFile" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Change CV</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Change CV</button>
            @error('cvFile')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </form>
    @else
      <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row pt-5 mt-3">
          <div class="input-group col-5 mx-auto mb-5 d-flex flex-column justify-content-center">
            <div class="mb-5 text-center">You dont have CV Uploaded, Upload now!</div>
            <div>
              <div class="custom-file">
                <input type="file" name="cvFile" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Upload CV</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            @error('cvFile')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </form>
    @endif
      </div>
    </div>
@endsection