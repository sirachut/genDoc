@extends('documents.app')

@section('content')
 
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
            {{ $show->project_name }}
            {{ $show->store_name }}

            </div>
        </div>
    
</div>
@endsection