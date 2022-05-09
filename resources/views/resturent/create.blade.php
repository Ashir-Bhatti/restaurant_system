@extends('resturent.layouts.master')

@section('content')
<div class="card-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h4>Create Resturent</h4></div>
                        <div class="card-body">
                            
                            <form method="post" action="{{ route('resturent.store') }}" enctype="multipart/form-data">
                                <div class="form-group">
                                    @csrf
                                    <label class="label"> Resturent Name: </label>
                                    <input type="text" name="name" class="form-control" required/>
                                </div>
                        </div>
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
@endsection


