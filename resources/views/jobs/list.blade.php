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

      </div>      
    </div>
  </div>
@endforeach
@else

  <h1 class="text-center">No Jobs Posted</h1>

@endif