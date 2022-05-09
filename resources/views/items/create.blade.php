@extends('items.layouts.master')

@section('content')
<div class="card-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>New Item</h4></div>
                     <div class="card-body">
                        <form method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                <label class="label"> Item Name: </label>
                                <input type="text" name="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>    
</div>

</div>
@endsection
