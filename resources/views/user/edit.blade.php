@extends('user.layouts.masters')

@section('content')
<div class="cardx fat mt-4">
    <div class="card-body">
     <table class="table table-bordered-hover">
        <tr>
           <thead >
              <th>User Name</th>
               <th>Resturent</th>
                <th>Action</th>
            </thead>
        </tr>
              <tr>
                <td>
                  {{ $user->name }}
                </td>
                  <td>
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                <select class="form-group" multiple aria-label="multiple select example" name="resturent_id[]" multiple="">
                  @foreach ($resturent as $resturents) 
                  <option value="{{ $resturents->id}}">{{ $resturents->name }}</option> 
                  @endforeach       
                </select>
                      </td>                
                      <td>   
                          @csrf
                          @method('PUT')
                        <button class="btn btn-success">Add Resturent</button>                        
                      </td>
                    </form>
                  </tr>
                  
        </table>
@endsection