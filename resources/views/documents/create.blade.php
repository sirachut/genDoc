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

    legend.scheduler-border {
        width:inherit; /* Or auto */
        padding:0 10px; /* To give a bit of padding on the left and right */
        border-bottom:none;
    }   
    .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 20px;
    }
    .topleft {
        float: left;
        top: 8px;
        left: 16px;
    }
</style>    
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="pull-left">
                <h2>เพิ่มเอกสาร ฟอร์มสั่งซื้อ โรงเรียนบ้านเทอดไทย</h2>
                <br>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home.index') }}"> Back</a>
            </div> --}}
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ route('home.store') }}" method="POST">
        @csrf

        <div class="container" >
            <div class="row">
              <div class="col-sm-12" >
                <fieldset class="scheduler-border">
                    {{-- <legend class="scheduler-border" id="list-item-1"><h4>ข้อมูลของเอกสาร</h4></legend> --}}
                    
                    <br>

                    <h5 style="color:blueviolet">ข้อมูลพื้นฐาน</h3><hr>
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="project_department">{{ __('ฝ่ายงาน') }}</label>
                                <input type="text" id="project_department" class="form-control" name="project_department" placeholder="กรุณาป้อนฝ่ายงาน">
                            </div>
                            <div class="form-group col-md-8 ">
                                <label for="project_name">{{ __('กิจกรรม/โครงการ') }}</label>
                                <input type="text" id="project_name" class="form-control" name="project_name" placeholder="ชื่อกิจกรรมหรือโครงการ">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_subject">{{ __('กลุ่มสาระ') }}</label>
                                <input type="text" id="project_subject" class="form-control" name="project_subject" placeholder="กลุ่มสาระของกิจกรรมหรือโครงการนี้">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="created_at">{{ __('วันเดือนปี ที่จัดซื้อ') }}</label>
                                <input class="form-control" data-toggle="datepicker" name="created_at">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_number">{{ __('เลขที่จัดซื้อ') }}</label>
                                <input type="text" id="project_number" class="form-control" name="project_number" placeholder="ป้อนเลขที่จัดซื้อ">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_orderNumber">{{ __('เลขที่คำสั่ง') }}</label>
                                <input type="text" id="project_orderNumber" class="form-control" name="project_orderNumber" placeholder="ป้อนเลขที่จัดซื้อ">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_getday">{{ __('กำหนดใช้ภายใน') }}</label>
                                <select class="form-control" id="project_getday" name="project_getday">
                                    <option value="3">3 วัน</option>
                                    <option value="5">5 วัน</option>
                                    <option value="7">7 วัน</option>
                                    <option value="10">10 วัน</option>
                                    <option value="15">15 วัน</option>
                                    <option value="30">30 วัน</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_getproduct">{{ __('วันเดือนปี ที่ต้องการใช้พัสดุ') }}</label>
                                <input class="form-control" data-toggle="datepicker2" name="project_getproduct" value="ระบุวันที่ต้องการใช้พัสดุ">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_typemoney">{{ __('ประเภทของเงิน') }}</label>
                                <input type="text" id="project_typemoney" class="form-control" name="project_typemoney" placeholder="กลุ่มสาระของกิจกรรมหรือโครงการนี้">
                            </div>


                        </div>
                        <hr>

                        <h5 style="color:blueviolet">ข้อมูลการตรวจรับ</h3><hr>
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="store_fk">{{ __('กรุณาเลือกร้านค้า') }}</label>
                                <select class="form-control" id="store_fk" name="store_fk">

                                    @foreach ($create_Q as $item) 
                                        <option value="{{ $item->store_id }}">{{ $item->store_name }}</option>
                                    @endforeach
                            
                                </select>
                                    
                            </div>
                            <div class="form-group col-md-2">
                                <label for="project_typemoney">{{ __('เพิ่มร้านค้า') }}</label>
                                @include('documents.store')
                            </div>
                            
                        </div>

                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="project_typemoney">{{ __('ห้างร้านที่จัดซื้อ') }}</label>
                            <input type="text" id="project_typemoney" class="form-control" placeholder="{{ $store_name }}">
                            </div>
                        </div>
                        



                </fieldset>

              </div>
            </div>
        </div>

    <button type="submit" class="btn btn-primary" style="float:right">บันทึกข้อเอกสาร</button>

    </form>
    <div style="padding-bottom: 500px">

    </div>

</div>

<script>
    $(document).ready(function() {
        $('[data-toggle="datepicker"]').datepicker({
            autoPick: true,
            language: 'th-TH',
            format: 'dd/mm/yyyy',
        });
    });
    $(document).ready(function() {
        $('[data-toggle="datepicker2"]').datepicker({
            // autoPick: true,
            language: 'th-TH',
            format: 'dd/mm/yyyy',
        });
    });
    
</script>
    
@endsection