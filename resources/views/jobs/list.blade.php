@if($jobs->count() > 0)
@foreach ($jobs as $job)
  <div class="card job">
    <div>
      <a href="/jobs/{{ $job->id }}"><h1 class="job__title">{{ $job->title }}</h1></a>
      <h2 class="job__company">{{ $job->company }}</h2>
      <p class="job__description mt-3">{!! str_limit($job->description, 150) !!}</p>
      <div class="job__footer mt-2">
        <p class="job__location">Location: {{ $job->city }}</p>
      </div>      
    </div>
  </div>
@endforeach
@else
  <h1 class="text-center">No Jobs Posted</h1>

@endif