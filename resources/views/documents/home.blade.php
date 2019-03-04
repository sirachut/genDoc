@extends('documents.app')

@section('content')

<style>
   
</style>



<div class="container">
    <div>

        <div class="row">
            <h2>เอกสารการสั่งซื้อโรงเรียนบ้านเทอดไทย</h2>

            
            <button type="button" class="btn btn-outline-success">Success</button>
        </div>
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#new_doc">เอกสารล่าสุด</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#datatable">เอกสารที่ดำเนินการเสร็จแล้ว</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">ภาพรวม</a>
            </li>
        </ul>

       
            
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="new_doc" class="container tab-pane active" ><br>
            
                <div class="row">
                    
                    @php
                        $i=1;
                    @endphp

                    @foreach ($project_n_Q as $value)
                
                        <div class="col-sm-4">
                                
                            <div class="card form-group">
                                <div class="card-body">

                                <form class="form-horizontal" method="POST" action="{{ route('home.destroy',$value->project_id) }}" >
                                    <h5 class="card-title"><b>{{ $i++ }}.{{ $value->project_name }}</b></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        @php
                                            echo App\Http\Controllers\DocumentController::DateThai($value->created_at);
                                        @endphp
                                    </h6>
                                    <p class="card-text">ฝ่ายงาน: {{ $value->project_department }}</p>
                                    <a href="{{ route('home.show', $value->project_id) }}" class="btn btn-success">ดูรายละเอียด</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-xs btn-danger">ลบเอกสาร</button>
                                </form>

                                </div>
                            </div>
                        </div>

                    @endforeach



                </div>
            </div>

            <div id="datatable" class="container tab-pane fade"><br>
                {{-- @include('documents.dochasbill') --}}
            </div>

            <div id="menu2" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>

        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
</div>

{{-- <form class="form-horizontal" method="POST" action="{{ route('documents.destroy',$value->DOCUMENT_ID) }}">

    <a class="btn btn-xs btn-success" href="{{ route('documents.show',$value->DOCUMENT_ID) }}">Show</a>

    <a class="btn btn-xs btn-success" href="{{ URL::to('documentitem/' . $value->DOCUMENT_ID) }}">Show 2</a>

    <a class="btn btn-xs btn-info" href="{{ route('documents.edit',$value->DOCUMENT_ID) }}">Edit</a>

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
</form> --}}


@endsection
