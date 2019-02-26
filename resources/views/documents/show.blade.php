@extends('documents.app')

@section('content')
 
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $value->project_name }}
            </div>
        </div>
    
</div>
@endsection