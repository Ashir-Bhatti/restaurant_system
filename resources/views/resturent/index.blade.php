  @extends('resturent.layouts.master')

  @section('content')
  <div class="form-group">
  <a href="{{ route('resturent.create') }}" class="btn btn-primary float-right" data-toggle="button" aria-pressed="false"  autocomplete="off">
      Create New Resturent
  </a>
  </div>
  <div class="form-group">
      <table class="table table-striped">
          <thead>
           <tr>
             <th>Name</th>
             <th width="280px">Action</th>
           </tr>
          </thead>
            <tbody>
              @foreach ($resturent as $resturents)
                <tr>   
                  <td>
                      {{ $resturents->name }}
                  </td>
                    <td>
                    <a href="{{ route('resturent.edit', $resturents->id) }}" class="btn btn-primary">Items</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
      </table>
  </div>
   
  

  @endsection