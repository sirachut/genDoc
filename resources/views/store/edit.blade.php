@extends('documents.app')

@section('content')

<img style="background-size:cover;" width="100%" height="200px" src="{{ URL::to('/assets/img/action-bg.jpg') }}">

<div class="container">

    <div class="centered">
        
        <h1 style="color:aliceblue">รายการร้านค้าของคุณ</h1>
        <small style="color:aliceblue" >หมายเหตุ : รายการห้างร้าน/บริษัทที่ได้ทำการบันทึกไว้</small>

    </div>

<style>
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

</style>
<br>
    <h4>แก้ไขข้อมูลของร้านค้า {{ $value->store_name }}</h4>

<form method="post" action="{{ action('StoreManageController@update', $id) }}">
    @csrf
    @method('PUT')

    <div class="container">
        <div class="row">
            <div class="col-sm-8" style="padding: 15px;">
                <div class="card col-sm-12" style="padding:15px">
                    <h4>ข้อมูลร้านค้า</h4>
                    <small class="form-text text-muted">หมายเหตุ : รายละเอียดพื้นฐาน ของ{{ $value->store_name }}</small><hr>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="">ห้างร้านที่จัดซื้อ</label>
                            <input class="form-control" value="{{ $value->store_name}}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">โทรศัพท์</label>
                            <input class="form-control" value="{{ $value->store_tel}}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">โทรสาร</label>
                            <input class="form-control" value="{{ $value->store_teletex}}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="">ที่อยู่ร้านค้า</label>
                            <input class="form-control" value="{{ $value->store_address}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">ผู้มีอำนาจลงนาม</label>
                            <input class="form-control" value="{{ $value->store_employee}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">เลขประจำตัวผู้เสียภาษี</label>
                            <input class="form-control" value="{{ $value->store_employeeNumber}}">
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-sm-4" style="padding: 15px;">
                <div class="card col-sm-12" style="padding:15px">
                    <h4>ธนาคาร</h4>
                    <small class="form-text text-muted">หมายเหตุ : รายละเอียดธนาคาร ของ {{ $value->store_name }}</small><hr>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">ชื่อบัญชี</label>
                            <input class="form-control" value="{{ $value->bank_account}}">
                        
                        </div>
                        <div class="form-group col-sm-12">
                                <label for="">เลขที่บัญชีเงินฝากธนาคาร</label>
                                <input class="form-control" value="{{ $value->bank_number}}">
                        </div>
                        <div class="form-group col-sm-6">
                                <label for="">ธนาคาร</label>
                                <input class="form-control" value="{{ $value->bank_name}}">
                        </div>
                        <div class="form-group col-sm-6">
                                <label for="">สาขา</label>
                                <input class="form-control" value="{{ $value->bank_branch}}">
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Hidden --}}

        <input type="text" name="store_id_fk" value="{{ $value->store_id_fk}}" hidden>
        <input type="text" name="status" value="{{ $value->status}}" hidden>

        </div>

        <button type="submit" style="float:right" class="btn btn-sm">บันทึกข้อมูล</button>
    </div>
</form>
   


    <br><br><br><br><br><br><br><br>
@endsection