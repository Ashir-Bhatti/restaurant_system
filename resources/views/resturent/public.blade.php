@extends('resturent.layouts.master')

@section('content')
    
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
                <a href="{{ route('resturent.show', $resturents->id) }}" class="btn btn-primary">Items</a>
              </td>
         @endforeach
          </tr>
       </tbody>
  </table> 
@endsection