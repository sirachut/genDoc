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
                                <input type="text" class="form-control" id="project_department" placeholder="กรุณาป้อนฝ่ายงาน">
                            </div>
                            <div class="form-group col-md-8 ">
                                <label for="project_name">{{ __('กิจกรรม/โครงการ') }}</label>
                                <input type="text" class="form-control" id="project_name" placeholder="ชื่อกิจกรรมหรือโครงการ">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_subject">{{ __('กลุ่มสาระ') }}</label>
                                <input type="text" class="form-control" id="project_subject" placeholder="กลุ่มสาระของกิจกรรมหรือโครงการนี้">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_subject">{{ __('วันเดือนปี ที่จัดซื้อ') }}</label>
                                <input type="date" class="form-control" id="project_subject" placeholder="กลุ่มสาระของกิจกรรมหรือโครงการนี้">
                            </div>
                        </div>

                        {{-- <label class="col-sm-2 col-form-label" for="project_department" >{{ __('ฝ่ายงาน') }}</label>
                        <div class="col-sm-4">
                            <input id="project_department" class="form-control" type="text" name="project_department" required autofocus>
                        </div>

                        <label class="col-sm-2 col-form-label" for="project_name" >{{ __('กิจกรรม/โครงการ') }}</label>
                        <div class="col-sm-4">
                            <input id="project_name" class="form-control" type="text" name="project_name" required autofocus>
                        </div> --}}

                </fieldset>

              </div>
            </div>
        </div>

    <button type="submit" class="btn btn-primary" style="float:right">บันทึกข้อเอกสาร</button>

    </form>

</div>
    
@endsection