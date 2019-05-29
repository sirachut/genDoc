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

<img style="background-size:cover;" width="100%" height="200px" src="{{ URL::to('/assets/img/bg1_create.jpg') }}">
<div class="container">

    <div class="centered">
        
        <h1>เพิ่มรายการเอกสาร</h1>
        <small>เพิ่มข้อมูล งาน/โครงการ ของโรงเรียนบ้านเทอดไทย</small>

    </div>

<style>
.centered {
  position: absolute;
  top: 22%;
  left: 30%;
  transform: translate(-50%, -50%);
}
</style>

</div>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="pull-left">
                <br>
                <h4>ฟอร์มสั่งซื้อ โรงเรียนบ้านเทอดไทย</h4>
                <small class="form-text text-muted">ฟอร์มกรอกข้อมูลประกอบไปด้วย ห้างร้านที่ติดต่อและรายละเอียดของงาน/โครงการเบื้องต้น</small>

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
                    <h5 style="color:blueviolet">ข้อมูลการตรวจรับ</h3><hr>
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="store_fk">{{ __('กรุณาเลือกร้านค้า') }}<span style="color:red;">*</span></label>
                                <select class="form-control" id="store_fk" name="store_fk" required>
                                        <option selected disabled>กรุณาเลือกร้านค้า</option>
                                    @foreach ($create_Q as $item) 
                                        <option value="{{ $item->store_id }}">{{ $item->store_name }}</option>
                                    @endforeach
                            
                                </select>
                                    
                            </div>
                                <div class="form-group col-md-2">
                                    <label for="project_typemoney">{{ __('เพิ่มร้านค้า') }}</label>
                                    <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">
                                    เพิ่มรายการร้านค้า
                                </button>    
                                
                                </div>

                            {{-- Hidden --}}
                            <div class="form-group col-md-12">
                                <input type="text" id="id_fk" class="form-control" name="id_fk" value="{{ $user->id }}" hidden>
                                <input type="text" id="bill_number" class="form-control" name="bill_number" value="ยังไม่ได้ระบุ" hidden>
                                <input type="text" id="project_status" class="form-control" name="project_status" value="n" hidden>
                                <input type="datetime" class="form-control" data-toggle="datepicker2" name="project_dateget" hidden >
                                {{-- <input type="date" name="project_dateget" value="0000-00-00 00:00:00" hidden> --}}

                            </div>


                        </div>  

                    <h5 style="color:blueviolet">ข้อมูลพื้นฐาน</h3><hr>
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="project_department">{{ __('ฝ่ายงาน') }}<span style="color:red;">*</span></label>
                                <input type="text" id="project_department" class="form-control" name="project_department" required>
                                <small id="project_department" class="form-text text-muted">คำอธิบาย : ฝ่ายงานทางโรงเรียนที่เขียนเอกสารสั่งซื้อ</small>

                            </div>
                            <div class="form-group col-md-8 ">
                                <label for="project_name">{{ __('กิจกรรม/โครงการ') }}<span style="color:red;">*</span></label>
                                <textarea type="text" id="project_name" class="form-control" name="project_name" required></textarea>
                                <small id="project_name" class="form-text text-muted">คำอธิบาย : ชื่อกิจกรรมหรือโครงการของเอกสารสั่งซื้อ</small>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_subject">{{ __('กลุ่มสาระ') }}<span style="color:red;">*</span></label>
                                <input type="text" id="project_subject" class="form-control" name="project_subject" required>
                                <small id="project_subject" class="form-text text-muted">คำอธิบาย : กลุ่มสาระของกิจกรรมหรือโครงการนี้</small>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_datein">{{ __('วันเดือนปี ที่จัดซื้อ') }}<span style="color:red;">*</span></label>
                                <input type="date" name="project_datein" class="form-control"> 
                                <small id="project_datein" class="form-text text-muted">คำอธิบาย : วันเดือนปี ที่เอกสารถูกเขียนขึ้น</small>

                                {{-- <div id="sandbox-container">
                                        <input type="timestamp" class="form-control" name="project_datein" autocomplete="off">

                                </div> --}}
                                
                                {{-- <div data-toggle="datepicker"></div> --}}
                                
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="project_getday">{{ __('กำหนดใช้ภายใน') }}<span style="color:red;">*</span></label>
                                <select class="form-control" id="project_getday" name="project_getday" required>
                                    <option disabled selected>กรุณากำหนดวันตรวจรับสินค้า</option>
                                    <option value="3">3 วัน</option>
                                    <option value="5">5 วัน</option>
                                    <option value="7">7 วัน</option>
                                    <option value="10">10 วัน</option>
                                    <option value="15">15 วัน</option>
                                    <option value="30">30 วัน</option>
                                </select>
                                <small id="project_getday" class="form-text text-muted">คำอธิบาย : เพื่อกำหนดวันรับรายการของโครงการ</small>

                            </div>

                            
                            <div class="form-group col-md-4">
                                <label for="project_number">{{ __('เลขที่จัดซื้อ') }}<span style="color:red;">*</span></label>
                                <input type="text" id="project_number" class="form-control" name="project_number" autocomplete="off">
                                <small id="project_number" class="form-text text-muted">คำอธิบาย : ลำดับเลขที่ของเอกสาร</small>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_orderNumber">{{ __('เลขที่คำสั่ง') }}<span style="color:red;">*</span></label>
                                <input type="text" id="project_orderNumber" class="form-control" name="project_orderNumber" required autocomplete="off">
                                <small id="project_orderNumber" class="form-text text-muted">คำอธิบาย : เลขที่คำสั่งในการสั่งซื้อสินค้า</small>

                            </div>
                           
                           
                            <div class="form-group col-md-4">
                                <label for="project_typemoney">{{ __('ประเภทของเงิน') }}<span style="color:red;">*</span></label>
                                <input type="text" id="project_typemoney" class="form-control" name="project_typemoney" autocomplete="off">
                                <small id="project_typemoney" class="form-text text-muted">คำอธิบาย : ประเภทของเงินที่ใช้ในการจัดซื้อสินค้า</small>

                            </div>


                        </div>
                        <br>

                        
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

                            
        
                        
                    </div>

                       
                        <div class="form row" style="float:right">

                            <input type="reset" class="btn btn-dark" value="Reset">&nbsp;
                            <button type="submit reset" class="btn btn-success">บันทึกข้อเอกสาร</button> 

        
                        </div>
                       

                </fieldset>

              </div>
            </div>
        </div>


    </form>

    


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">เพิ่มร้านค้า</h4>
                <small id="store_name" class="form-text text-muted"> &nbsp; &nbsp;{{ Auth::user()->name }}</small>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
           
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('createstore.store') }}" method="POST">
            @csrf

            <div class="form-row">
                
                <div class="form-group col-md-8">
                    <label for="store_name">{{ __('ห้างร้านบริษัทที่จัดซื้อ') }} </label>
                    <textarea style="text" class="form-control" name="store_name" required></textarea>
                    <small id="store_name" class="form-text text-muted">คำอธิบาย : ชื่อร้านค้าที่จัดซื้อ</small>

                </div>
                <div class="form-group col-md-4">
                    <label for="store_tel">{{ __('โทรศัพท์') }} </label>
                    <input style="text" class="form-control" name="store_tel" autocomplete="off" required>
                    <small id="store_tel" class="form-text text-muted">คำอธิบาย : เบอร์โทรร้านค้า</small>

                </div>
                <div class="form-group col-md-4">
                    <label for="store_teletex">{{ __('โทรสาร') }} </label>
                    <input style="text" class="form-control" name="store_teletex" value="-" autocomplete="off">
                    <small id="store_teletex" class="form-text text-muted">คำอธิบาย : เบอร์โทรสารร้านค้า</small>

                </div>
                <div class="form-group col-md-8">
                    <label for="store_address">{{ __('ที่อยู่ห้างร้านบริษัทที่จัดซื้อ') }} </label>
                    <textarea style="text" class="form-control" name="store_address" required></textarea>
                    <small id="store_address" class="form-text text-muted">ตัวอย่าง : 130 หมู่ 11 ต.เจดีย์หลวง อ.แม่สรวย จ.เชียงราย 57180</small>

                </div>
                

                {{-- hidden --}}
                <input style="text" class="form-control" name="store_id_fk" value="{{ Auth::user()->id }}" hidden>

               
            </div>

            <div class="form row">

                <div class="form-group col-md-12">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_store_employee" aria-expanded="false" aria-controls="collapseExample">
                            เพิ่มผู้มีอำนาจลงนามของร้านค้า
                    </button>
                    <small id="bank_number" class="form-text text-muted">หมายเหตุ : หากไม่ได้เพิ่มผู้มีอำนาจลงนามของร้านค้า ชุดข้อมูลดังกล่าวจะถูกระบุไว้ว่า "ยังไม่ได้ระบุ"</small>

                    
                </div>
            
            </div>
            <div class="collapse" id="collapse_store_employee">
                <div class="form row">
                        <div class="form-group col-md-6">
                                <label for="store_employeeNumber">{{ __('เลขประจำตัวผู้เสียภาษี') }} </label>
                                <input style="text" class="form-control" name="store_employeeNumber" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                                <small id="store_employeeNumber" class="form-text text-muted">ตัวอย่าง : 05735420xxxx</small>
            
                            </div>
                            <div class="form-group col-md-6">
                                <label for="store_employee">{{ __('ผู้มีอำนาจลงนาม') }} </label>
                                <input style="text" class="form-control" name="store_employee" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                                <small id="store_employee" class="form-text text-muted">คำอธิบาย : ผู้ลงนามร้านค้า</small>
            
                            </div>
                </div>
            </div>

            <div class="form row">

                    <div class="form-group col-md-12">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_store_bank" aria-expanded="false" aria-controls="collapseExample">
                                เพิ่มบัญชีธนาคาร
                        </button>
                        <small id="bank_number" class="form-text text-muted">หมายเหตุ : หากไม่ได้เพิ่มธนาคารของร้านค้า ชุดข้อมูลดังกล่าวจะถูกระบุไว้ว่า "ยังไม่ได้ระบุ"</small>

                        
                    </div>
                
            </div>

            <div class="collapse" id="collapse_store_bank">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="bank_number">{{ __('เลขที่บัญชีเงินฝากธนาคาร') }} </label>
                        <input id="bank_number" style="text" class="form-control" name="bank_number" onfocus="this.value=''" autocomplete="off" onfocusout="myFunction()" value="(ยังไม่ได้ระบุ)" required>
                        <small id="bank_number" class="form-text text-muted">ตัวอย่าง : 987673****</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank_account">{{ __('ชื่อบัญชี') }} </label>
                        <input style="text" class="form-control" name="bank_account" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                        <small id="bank_account" class="form-text text-muted">คำอธิบาย : ชื่อบัญชีธนาคาร</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank_number">{{ __('ธนาคาร') }} </label>
                        <input id="bank_name" style="text" class="form-control" name="bank_name" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                        <small id="bank_name" class="form-text text-muted">ตัวอย่าง : ชื่อธนาคารที่บัญชีสังกัดอยู่</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank_branch">{{ __('สาขา') }} </label>
                        <input style="text" class="form-control" name="bank_branch" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                        <small id="bank_branch" class="form-text text-muted">คำอธิบาย : สาขาที่ธนาคารสังกัดอยู่</small>
                    </div>

                    {{-- Hidden --}}
                    <input style="text" class="form-control" name="status" value="s" hidden>
                </div>
            </div>

        </div>
        
        <!-- Modal footer -->

        <div class="modal-footer">
            <input type="reset" class="btn btn-dark" value="Reset">
            <button type="submit" class="btn btn-success">บันทึกข้อมูลร้านค้า</button>
        </div>
    </form>

        
      
      </div>
    </div>
  </div>


    
      

    

    

  

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>  
    @endif
    <div style="padding-bottom: 500px">

    </div>
   
</div>
{{-- <script>
    $('#sandbox-container input').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "th",
        orientation: "bottom auto"
    });

     
    $(document).ready(function() {
          
        $('[data-toggle="datepicker"]').datepicker({
            autoPick: true,
            language: 'th-TH',
            format: 'dd-mm-yyyy',
            
            
            
        });
        
    });
    $(document).ready(function() {
        $('[data-toggle="datepicker2"]').datepicker({
            // autoPick: true,
            language: 'th-TH',
            // format: 'dd-mm-yyyy',

            
        });
    });
    
</script> --}}
    
@endsection