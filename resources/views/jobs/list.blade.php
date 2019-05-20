@if($jobs->count() > 0)
@foreach ($jobs as $job)
  <div class="card job">
    <div class="left">
      <img class="job__image" src="http://lorempixel.com/400/200" alt="Card image cap" width="200px" height="200">
    </div>
    <div class="right">
      <a href="/jobs/{{ $job->id }}"><h1 class="job__title">{{ $job->title }}</h1></a>
      <h2 class="job__company">{{ $job->company }}</h2>
      <p class="job__description">{!! str_limit($job->description, 150) !!}</p>
      <div class="job__footer mt-2">
        <p class="job__location">Location: {{ $job->city }}</p>
        <div class="d-flex">
          <form action="/changeJobStatus/{{ $job->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Option
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if ($job->status == 'show')
                  <button type="submit" name="status" value="hide" class="dropdown-item">Hide</button>
                @else
                  <button type="submit" name="status" value="show" class="dropdown-item">Show</button>
                @endif
                <a class="dropdown-item" href="/jobs/{{ $job->id}}/edit">Edit</a>
              </div>
            </div>
          </form>
          <form action="/jobs/{{ $job->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link" href="">Delete</button>
          </form>
        </div>
      </div>      
    </div>
  </div>
@endforeach
@else

  <h1 class="text-center">No Jobs Posted</h1>

@endif