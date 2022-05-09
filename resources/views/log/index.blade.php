@extends('log.layouts.master')

@section('content')

<table class="table table-striped">
    <thead>	
	<tr>
        <th>Name</th>
        <th>Action Type</th>           
    </tr>   
	</thead>
	<tbody>
        @foreach ($activity as $item)  
          <tr>                
              <td> 
				  {{ $item->username }}
			  </td>
              <td>
				  {{ $item->type }}
			  </td>
           </tr>
        @endforeach
	</tbody>
</table>
@endsection