@extends('documents.app')

@section('content')



<img style="background-size:cover;" width="100%" height="200px" src="{{ URL::to('/assets/img/action-bg.jpg') }}">

<div class="container">

    <div class="centered">
        @if (Auth::user()->status == "admin")
            <h1 style="color:aliceblue">รายการร้านค้าทั้งหมดในระบบ</h1>
            <small style="color:aliceblue" >หมายเหตุ : รายการห้างร้าน/บริษัทที่ผู้ใช้งานทั้งหมดได้ทำการบันทึกไว้</small>
        @else
            <h1 style="color:aliceblue">รายการร้านค้าของคุณ</h1>
            <small style="color:aliceblue" >หมายเหตุ : รายการห้างร้าน/บริษัทที่ได้ทำการบันทึกไว้</small>
        @endif
      

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


    <div class="container">
        <div class="row">
            <div class="col-sm-8" style="padding: 15px;">
                <div class="card col-sm-12" style="padding:15px">
                    <h4>ข้อมูลร้านค้า</h4>
                    <small class="form-text text-muted">หมายเหตุ : รายละเอียดพื้นฐาน ของ{{ $task->store_name }}</small><hr>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="">ห้างร้านที่จัดซื้อ</label>
                            <p  class="form-control" >{{ $task->store_name }}</p>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">โทรศัพท์</label>
                            <p class="form-control" >{{ $task->store_tel }}</p>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">โทรสาร</label>
                            <p class="form-control" >{{ $task->store_teletex }}</p>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="">ที่อยู่ร้านค้า</label>
                            <p class="form-control">{{ $task->store_address }}</p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">ผู้มีอำนาจลงนาม</label>
                            <p  class="form-control" >{{ $task->store_employee }}</p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">เลขประจำตัวผู้เสียภาษี</label>
                            <p  class="form-control" >{{ $task->store_employeeNumber }}</p>
                        </div>
                    </div>
                
                
                </div> 
            </div>
            <div class="col-sm-4" style="padding: 15px;">
                <div class="card col-sm-12" style="padding:15px">
                    <h4>ธนาคาร</h4>
                    <small class="form-text text-muted">หมายเหตุ : รายละเอียดธนาคารของห้างร้าน</small><hr>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">ชื่อบัญชี</label>
                            <p class="form-control" >{{ $task->bank_account }}</p>
                        
                        </div>
                        <div class="form-group col-sm-12">
                                <label for="">เลขที่บัญชีเงินฝากธนาคาร</label>
                                <p class="form-control" >{{ $task->bank_number }}</p>
                        </div>
                        <div class="form-group col-sm-6">
                                <label for="">ธนาคาร</label>
                                <p class="form-control" >{{ $task->bank_name }}</p>
                        </div>
                        <div class="form-group col-sm-6">
                                <label for="">สาขา</label>
                        <p class="form-control" >{{ $task->bank_branch }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="padding: 15px;">
                    <div class="card col-sm-12" style="padding:15px">
                        <h4>ตารางข้อมูลโครงการ ที่ร่วมรายการ</h4>
                        <small class="form-text text-muted">หมายเหตุ : รายละเอียดของเอกสารที่ติดต่อกับร้าน {{ $task->store_name }}</small><hr>
                            

                        @php
                            $i = 1;
                        @endphp


                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>กิจกรรม/โครงการ</th>
                                    <th>ฝ่ายงาน</th>
                                    <th>กลุ่มสาระ</th>
                                    <th>เมื่อวันที่</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getProject as $project)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>{{ $project->project_department }}</td>
                                        <td>{{ $project->project_subject }}</td> 
                                        <td>{{ formatDateThai($project->created_at) }}</td>
                                        <td width="10%">
                                            <a href="{{ route('home.show', $project->project_id) }}" class="btn btn-info btn-sm"><i class="fas fa-file-invoice"> ดูรายละเอียด</i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
    </div>

</div>
   


    <br><br><br>
@endsection