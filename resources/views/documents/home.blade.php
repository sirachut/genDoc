@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container">
    <div>
        <h2>เอกสารการสั่งซื้อโรงเรียนบ้านเทอดไทย</h2>
        
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
            <div id="new_doc" class="container tab-pane active"><br>

                <div class="row">

                    @foreach ($documentsN as $key => $value)
                        <div class="col-sm-4">
                            <div class="card form-group">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{ $value->project_name }}</b></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $value->project_number }}</h6>
                                        <p class="card-text">{{ $value->project_department }}</p>
                                    <a href="#" class="btn btn-success">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            <div id="datatable" class="container tab-pane fade"><br>
                @include('documents.datatable_doc_withbill')
        
            </div>

            <div id="menu2" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>

        </div>
    </div>
</div>



@endsection
