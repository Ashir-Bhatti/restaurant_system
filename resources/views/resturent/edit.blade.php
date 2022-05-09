@extends('resturent.layouts.master')

@section('content')

<table class="table table-bordered-hover">
	<thead>  
		<tr> 
			<th>Item</th>
			<th>Quantity</th>
			<th>Action</th>
			<th>
				<a href="{{ route('items.edit', $resturent->id) }}" class="btn btn-secondary"> Items</a>
			</th>
		</tr>  
	</thead>
	<tbody>
		@foreach ($item_res as $resturant_item)
		<tr> 
			<td>
				{{ $resturant_item->item->name }}	
			</td>
			<td>
				{{ $resturant_item->quantity }}
			</td>
			<td>
				<form action="{{ route('itemresturent.store') }}" method="POST">
					@csrf
					
					<input type="hidden" name="resturent_id" value="{{ $resturent->id }}">
					<input type="hidden" name="item_id" value="{{ $resturant_item->item_id }}">
					<input type="number" name="quantity">
					
					<button class="btn btn-success">Add Qunatity</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection