@foreach ($jobs as $job)
  <div class="card job">
    <div class="left">
      <img class="job__image" src="http://lorempixel.com/400/200" alt="Card image cap" width="200px" height="200">
    </div>
    <div class="right">
      <h1 class="job__title">{{ $job->title }}</h1>
      <h2 class="job__company">{{ $job->company }}</h2>
      <p class="job__description">{!! str_limit($job->description, 150) !!}</p>
      <div class="job__footer">
        <p class="job__location">Location: {{ $job->city }}</p>
        <div class="d-flex">
          <form action="/changeJobStatus/{{ $job->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <button type="submit" name="status" class="btn btn-primary mr-2" value="show">Show</button>
          </form>
          <form action="/changeJobStatus/{{ $job->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <button type="submit" name="status" class="btn btn-primary" value="hide">Hide</button>
          </form>
        </div>
      </div>      
    </div>
  </div>
@endforeach