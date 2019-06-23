@extends('documents.app')

@section('content')

@foreach ($getDirector as $item)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">ข้อมูลบุคลากรโรงเรียนบ้านเทอดไทย</h5>
          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
          <p class="card-text">
              
              {{ $item->teacher_getproduct_name }}
              {{ $item->teacher_rank }}
              {{ $item->parcelcheck_name }}
              {{ $item->headerparcel_name }}
              {{ $item->director_name }}


          </p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
@endforeach
    

@endsection