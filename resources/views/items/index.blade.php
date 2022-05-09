@extends('items.layouts.master')

@section('content')

  <div class="form-group">
    <a href="{{ route('items.create') }}" class="btn btn-primary float-right" data-toggle="button" aria-pressed="false"  autocomplete="off">
        Add New Item
    </a>
  </div>
 
    <div class="form-group">
        <table class="table table-striped">
        <tr>
            <th>Name</th>            
        </tr>
            @foreach ($item as $items)
               <tbody>
                 <tr> 
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                    @endif
                <td>
                    {{ $items->name }}
                </td>
                </tr>
                </tbody>
            @endforeach 
            </table>
        </div>
    </div>
</div>
@endsection