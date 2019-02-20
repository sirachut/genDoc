@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div>
        <h2>เอกสารการสั่งซื้อโรงเรียนบ้านเทอดไทย</h2>
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">เอกสารล่าสุด</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">ค้นหาเอกสารอย่างละเอียด</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">ภาพรวม</a>
            </li>
        </ul>
            
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
                <div class="row">
                    <div class="col-sm-4">
                        @foreach ($documents as $key => $value)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{ $value->project_name }}</b></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $value->create_at }}</h6>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-success">ดูรายละเอียด</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
            <h3>Menu 1</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
        </div>
        </div>
        

    <br>


</div>


    


@endsection
