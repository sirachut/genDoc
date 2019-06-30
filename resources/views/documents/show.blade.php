@extends('documents.app')

@section('content')

<style>
    fieldset.scheduler-border {
        border: 2px solid #f5f5f0 !important;
        border-radius: 5px;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
    }
    
    .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 20px;
    }

    legend.scheduler-border {
        width:inherit; /* Or auto */
        padding:0 10px; /* To give a bit of padding on the left and right */
        border-bottom:none;
    }   
    .topleft {
        float: left;
        top: 8px;
        left: 16px;
    }
    .centered {
        position: absolute;
        top: 22%;
        left: 30%;
        transform: translate(-50%, -50%);
    }

    .card{
        -webkit-box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        -moz-box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        
    }
    .incard{
        padding: 6px;
        -webkit-box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        -moz-box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        background-color: dodgerblue;  
    }

    .left,
    .right {
        top: 55%;
        float: left;
    }

    .left {
        position: absolute;
        background: #337ab7;
        display: inline-block;
        white-space: nowrap;
        width: 50px;
        transition: width .5s;
    }

    .left:hover {     
        width: 200px;
        color: #fff
    }

    .item:hover {
        background-color: #222;
    }

    .item {
        height: 50px;
        overflow: hidden;
        color: #fff;
    }
</style>

@if (Auth::user()->name == "admin")
    <div class="left nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="item nav-link" data-toggle="pill" href="#">
            <i class="fas fa-list-ul"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </a>
        <a class="item nav-link" id="v-pills-home-tab" data-toggle="pill" href="#show_detail" role="tab" aria-controls="show_detail" aria-selected="true">
            <i class="far fa-credit-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ดูแบบปกติ
        </a>
        <a class="item nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#show_doc" role="tab" aria-controls="show_doc" aria-selected="false">
            <i class="far fa-file-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ดูแบบเอกสาร
        </a>
    </div>
@else
    <div class="left nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="item nav-link" data-toggle="pill" href="#">
            <i class="fas fa-list-ul"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </a>
        <a class="item nav-link" id="v-pills-home-tab" data-toggle="pill" href="#show_detail" role="tab" aria-controls="show_detail" aria-selected="false">
            <i class="far fa-credit-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ดูแบบปกติ
        </a>
        <a class="item nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#show_doc" role="tab" aria-controls="show_doc" aria-selected="false">
            <i class="far fa-file-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ดูแบบเอกสาร
        </a>
        <a class="item nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#list" role="tab" aria-controls="list" aria-selected="true">
            <i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; รายการสินค้า
        </a>
    </div>
    
@endif


    
<img style="background-size:cover;" width="100%" height="200px" src="{{ URL::to('/assets/img/bg-min.png') }}">

<div class="container">

    <div class="centered">
        
        <h2 style="color:aliceblue">ข้อมูลเอกสารของโครงการ</h2>
        <small style="color:aliceblue" >หมายเหตุ : รายการห้างร้าน/บริษัทที่ได้ทำการบันทึกไว้</small>

    </div>

</div>

<div class="container">


    @if (Auth::user()->name == "admin")
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="show_detail" role="tabpanel" aria-labelledby="v-pills-home-tab"><br>
                @include('showtype/show_detail.app')
            </div>
            <div class="tab-pane fade" id="show_doc" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                @include('showtype/show_doc.app')
            </div>
        </div>
    @else
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade " id="show_detail" role="tabpanel" aria-labelledby="v-pills-home-tab"><br>
                @include('showtype/show_detail.app')
            </div>
            <div class="tab-pane fade " id="show_doc" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                @include('showtype/show_doc.app')
            </div>
            <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                @include('showtype/list.app')
            </div>
        </div>
    @endif
   

    
</div>




@endsection