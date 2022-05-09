  @extends('resturent.layouts.master')
  
  @section('content')
  
  <div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			
			<table class="table table-bordered-hover">
				<thead>
					<tr>
						<th>Item</th>
						<th align="center">Quantity</th>
						<th>Reduced Quantity</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($resturant_items as $resturant_item)
					<tr>
						<td>
							{{ $resturant_item->item->name }}
						</td> 
						<td align="center">
							{{ $resturant_item->quantity }}
						</td>
						<td>
							<form action="{{ route('resturent.update', $resturent->id) }}" method="post">
								@csrf
								@method('Put')

								<input type="hidden" name="resturent_id" value="{{ $resturent->id }}">
								<input type="hidden" name="item_id" value="{{ $resturant_item->item_id }}">
								<input type="number" name="quantity" minlength="1" max="{{ $resturant_item->qunatity }}" >
								
								@if ($resturant_item->quantity > 0)
									<button class="btn btn-secondary">Change Qty</button>
								@else
									<button class="btn btn-danger" disabled>Empty</button>
								@endif
							</form>
						</td>
					</tr>
					@endforeach 
				</tbody> 
			</table>
		</div>
		
	</div>
</div>
</div>

@endsection