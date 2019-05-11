@extends('documents.app')

@section('content')

<style>
   
</style>


<div class="container">
    <div>
        <br>

            
        <div class="row">
            <h2>เอกสารการสั่งซื้อโรงเรียนบ้านเทอดไทย &nbsp;</h2>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('home.create') }}"><i class="fas fa-plus-circle"> &nbsp; </i>เพิ่มเอกสาร</a>
            </div>
        </div>
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#new_doc">เอกสาร</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">ภาพรวม</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="new_doc" class="container tab-pane active" ><br>

                @include('card.offcanvas')
                
        
            </div>

            <div id="menu2" class="container tab-pane fade"><br>
                @include('summary.home')
          
            </div>

        </div>
    </div>

</div>

@endsection
