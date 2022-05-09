@extends('user.layouts.masters')

@section('content')

<a href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>
          <table class="table table-bordered-hover">
              <tr>
                  <thead class="thead-dark">
                     <th>Name</th>
                     <th>Email</th>
                     <th>Action</th>
                  </thead>
               </tr>
             @foreach ($user as $users)
               <tr>    
                  <td>{{ $users->name }}</td>  
                  <td>{{ $users->email }}</td>
                  <td><a href="{{ route('user.edit' ,$users->id) }}" class="btn btn-primary">Resturents</a></td>
               </tr>
             @endforeach
          </table>
@endsection