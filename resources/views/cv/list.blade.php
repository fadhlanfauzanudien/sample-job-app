<table class="table">
    <thead>
        <tr>
        <th>No</th>
        <th scope="col">Name</th>
        <th scope="col">CV</th>
        <th scope="col">Download</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($CVs as $CV)
        <tr>
        <td></td>
        <td><p class="d-inline">{{ $CV->user->firstname . ' ' . $CV->user->lastname }}</p></td>
        <td class="d-flex justify-content-between align-items-center">
          <p class="d-inline">{{ $CV->name }}</p> 
          @if ($CV->status === 'unread')  
            <span class="badge badge-info">unread</span>
          @elseif ($CV->status === 'accepted')
            <span class="badge badge-success">accepted</span>
          @elseif ($CV->status === 'rejected')
          <span class="badge badge-danger">rejected</span>
          @endif </td>
        <td><a href="/cv/download/{{$CV->id}}" class="btn btn-success">Download</a></td>
        <td>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form action="/cv/accept/{{ $CV->id }}">
                <button type="submit" class="dropdown-item">Accept</button>
              </form>
              <form action="/cv/reject/{{ $CV->id }}">
                <button type="submit" class="dropdown-item">Reject</but>
              </form>
            </div>
          </div>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>