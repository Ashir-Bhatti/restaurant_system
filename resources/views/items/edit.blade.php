@extends('resturent.layouts.master')

@section('content')

        <table class="table table-bordered-hover">
            <tr>
                <thead >
                <th>Item</th>
              </thead>
              </tr>
              @foreach ($items as $item)
              <tr>               
              <td>{{ $item ->name }}</td>
              <td>
                <form action="{{ route('itemresturent.add_item') }}" method="GET">
                  @csrf
                <input type="hidden" name="resturent_id" value="{{ $resturent->id }}">
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <button class="btn btn-success">Add Item</button>
                </form>
              </td>
            </tr>
            @endforeach
        </table>
         

    
@endsection