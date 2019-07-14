@extends('documents.app')
   
@section('content')

<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                

                <h4>แก้ไขข้อมูลของโครงการ : {{ $value->project_name }} </h4>

            </div>
            <div class="pull-right">
            </div>
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

    <form method="post" action="{{ action('DocumentController@update', $id) }}">
        @csrf
        @method('PUT')
            <div class="container">
                <div class="row">
                  <div class="col-sm-12" >
                    <fieldset class="scheduler-border">
                      <br>
                        <h5 style="color:blueviolet">ข้อมูลพื้นฐาน</h3><hr>
                            <div class="form row">
                                <div class="form-group col-md-4">
                                    <label for="project_department">{{ __('ฝ่ายงาน') }}<span style="color:red;">*</span></label>
                                    <input type="text" id="project_department" class="form-control" name="project_department" value="{{ $value->project_department}}" required>
                                    <small id="project_department" class="form-text text-muted">คำอธิบาย : ฝ่ายงานทางโรงเรียนที่เขียนเอกสารสั่งซื้อ</small>
                                </div>
                                <div class="form-group col-md-8 ">
                                    <label for="project_name">{{ __('กิจกรรม/โครงการ') }}<span style="color:red;">*</span></label>
                                    <textarea type="text" id="project_name" class="form-control" name="project_name" required >{{ $value->project_name}}</textarea>
                                    <small id="project_name" class="form-text text-muted">คำอธิบาย : ชื่อกิจกรรมหรือโครงการของเอกสารสั่งซื้อ</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="project_subject">{{ __('กลุ่มสาระ') }}<span style="color:red;">*</span></label>
                                    <input type="text" id="project_subject" class="form-control" name="project_subject" required value="{{ $value->project_subject}}">
                                    <small id="project_subject" class="form-text text-muted">คำอธิบาย : กลุ่มสาระของกิจกรรมหรือโครงการนี้</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="project_datein">{{ __('วันเดือนปี ที่จัดซื้อ') }}<span style="color:red;">*</span></label>
                                    <input type="date" name="project_datein" class="form-control" value="{{ $value->project_datein }}" required> 
                                    <small id="project_datein" class="form-text text-muted">คำอธิบาย : วันเดือนปี ที่เอกสารถูกเขียนขึ้น</small>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="project_getday">{{ __('กำหนดใช้ภายใน') }}<span style="color:red;">*</span></label>
                                    <select class="form-control" id="project_getday" name="project_getday" required >
                                        <option disabled selected>กรุณากำหนดวันตรวจรับสินค้า</option>
                                        <option value="3" @if($value->project_getday == '3') selected="selected" @endif>3 วัน</option>
                                        <option value="5"  @if($value->project_getday == '5') selected="selected" @endif>5 วัน</option>
                                        <option value="7"  @if($value->project_getday == '7') selected="selected" @endif>7 วัน</option>
                                        <option value="10"  @if($value->project_getday == '10') selected="selected" @endif>10 วัน</option>
                                        <option value="15"  @if($value->project_getday == '15') selected="selected" @endif>15 วัน</option>
                                        <option value="30"  @if($value->project_getday == '30') selected="selected" @endif>30 วัน</option>
                                    </select>
                                    <small id="project_getday" class="form-text text-muted">คำอธิบาย : เพื่อกำหนดวันรับรายการของโครงการ</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="project_datein">{{ __('วันเดือนปี ที่ตรวจรับ') }}<span style="color:red;">*</span></label>
                                    <input type="date" name="project_dateget" class="form-control" value="{{ $value->project_dateget }}" required> 
                                    <small id="project_dateget" class="form-text text-muted">คำอธิบาย : วันเดือนปี รับสินค้า</small>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="project_number">{{ __('เลขที่จัดซื้อ') }}<span style="color:red;">*</span></label>
                                    <input type="text" id="project_number" class="form-control" value="{{ $value->project_number}}" name="project_number" autocomplete="off">
                                    <small id="project_number" class="form-text text-muted">คำอธิบาย : ลำดับเลขที่ของเอกสาร</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="project_orderNumber">{{ __('เลขที่คำสั่ง') }}<span style="color:red;">*</span></label>
                                    <input type="text" id="project_orderNumber" class="form-control" name="project_orderNumber" required autocomplete="off" value="{{ $value->project_orderNumber}}">
                                    <small id="project_orderNumber" class="form-text text-muted">คำอธิบาย : เลขที่คำสั่งในการสั่งซื้อสินค้า</small>
                                </div>
                               
                               
                                <div class="form-group col-md-4">
                                    <label for="project_typemoney">{{ __('ประเภทของเงิน') }}<span style="color:red;">*</span></label>
                                    <input type="text" id="project_typemoney" class="form-control" name="project_typemoney" autocomplete="off" value="{{ $value->project_typemoney}}">
                                    <small id="project_typemoney" class="form-text text-muted">คำอธิบาย : ประเภทของเงินที่ใช้ในการจัดซื้อสินค้า</small>
    
                                </div>
    
    
                            </div>
                            <br>
    
                            <h5 style="color:blueviolet">ข้อมูลการตรวจรับ</h3><hr>
                            <div class="form row">
                                <div class="form-group col-md-4">
                                    <label for="store_fk">{{ __('กรุณาเลือกร้านค้า') }}<span style="color:red;">*</span></label>
                                    <select class="form-control" id="store_fk" name="store_fk" required> 
                                            <option selected disabled>กรุณาเลือกร้านค้า</option>
                                        @foreach ($create_Q as $item) 
                                            <option value="{{ $item->store_id }}" @if($value->store_fk == $item->store_id ) selected="selected" @endif>{{ $item->store_name }}</option>
                                        @endforeach
                                
                                    </select>
                                        
                                </div>
                            
                    
                              
    
                                {{-- Hidden --}}
                                <div class="form-group col-md-12">
                                    
                                <input type="text" id="bill_number" class="form-control" name="bill_number" value="{{ $value->bill_number}}" hidden>
                                
    
                                </div>
    
    
                            </div>
                            <div class="form row">
    
                                <div class="form-group col-md-12">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_document" aria-expanded="false" aria-controls="collapseExample">
                                            เพิ่มข้อมูลบุคลากร
                                    </button>
                                    <small class="form-text text-muted">หมายเหตุ : หากไม่ได้เพิ่มข้อมูลบุคลากร ข้อมูลดังกล่าวจะถูกตั้งเป็น ค่าพื้นฐาน (Default) ที่ตั้งค่าโดย Admin</small>
            
                                    
                                </div>
                            
                            </div>
            
                        <div class="collapse" id="collapse_document">
                           
    
                            <div class="form row"> 
                                    <div class="form-group col-md-4">
                                        <label for="teacher_get_name">{{ __('ผู้ตรวจรับ') }}</label>
                                        <input type="text" id="teacher_get_name" class="form-control" name="teacher_get_name" value="{{ $director->teacher_getproduct_name }}">
                    
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="teacher_rank">{{ __('ตำแหน่ง') }}</label>
                                        <input type="text" id="teacher_rank" class="form-control" name="teacher_rank" value="{{ $director->teacher_rank }}">
                    
                                    </div>
                                </div>
    
                                <div class="form row">
                                        <div class="form-group col-md-4">
                                            <label for="parcel_name">{{ __('เจ้าหน้าที่พัสดุ') }}</label>
                                        <input type="text" id="parcel_name" class="form-control" name="parcel_name" value="{{ $director->parcelcheck_name }}">
                        
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="parcelLeader_name">{{ __('หัวหน้าเจ้าหน้าที่พัสดุ') }}</label>
                                            <input type="text" id="parcelLeader_name" class="form-control" name="parcelLeader_name" value="{{ $director->headerparcel_name }}">
                        
                                        </div>
                                    </div>
            
                                    <div class="form row">
                                        <div class="form-group col-md-4">
                                            <label for="manageschool_name">{{ __('ผู้อำนวยการโรงเรียน') }}</label>
                                            <input type="text" id="manageschool_name" class="form-control" name="manageschool_name" value="{{ $director->director_name }}">
                        
                                        </div>
                                    </div>

                                     {{-- Hidden --}}
                                <div class="form-group col-md-12">
                                <input type="text" id="id_fk" class="form-control" name="id_fk" value="{{ $user->id }}" hidden>
                                <input type="text" id="bill_number" class="form-control" name="bill_number" value="ยังไม่ได้ระบุ" hidden>
                                <input type="text" id="project_status" class="form-control" name="project_status" value="n" hidden>
                                {{-- <input type="datetime" class="form-control" data-toggle="datepicker2" name="project_dateget" hidden > --}}
                                {{-- <input type="date" name="project_dateget" value="0000-00-00 00:00:00" hidden> --}}

                            </div>
    
                                
            
                            
                        </div> 
    
                           
                            <div class="form row" style="float:right">
                                <button type="submit" class="btn btn-success">บันทึกข้อเอกสาร</button> 
                            </div>
                           
    
                    </fieldset>
    
                  </div>
                
            </div>
    
    
        
      </form>

</div>
<br><br><br>
 
@endsection