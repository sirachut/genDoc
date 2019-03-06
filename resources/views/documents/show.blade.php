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
</style>
<div class="container">
    <div>

        <div class="row">
            <h2>เอกสารการสั่งซื้อโรงเรียนบ้านเทอดไทย</h2>

            
            <button type="button" class="btn btn-outline-success">Success</button>
        </div>

        <br>
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#one">ข้อมูล</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#two">รายงาน เรียนผู้อำนวยการ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#three">รายละเอียดแนบท้าย</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#four">รายงาน เรียนหัวหน้าเจ้าหน้าที่</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#five">ใบสั่งซื้อ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#six">ใบตรวจรับพัสดุ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#seven">ใบเบิกพัสดุ</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#eight">บัญชีวัสดุ</a>
            </li>
        </ul>
       
            
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="one" class="container tab-pane active" ><br>
                <div class="container">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border"><h4>ข้อมูลของเอกสาร</h4></legend>

                        <br>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"><b>ฟอร์มซื้อ</b></div>
                                    <div class="col-sm-4" style="color: blue"><b>โรงเรียนบ้านเทอดไทย</b></div>
                                    <div class="col-sm-6" style="color: blue">สำนักงานคณะกรรมการการศึกษาขั้นพื้นฐาน</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4" style="color: blueviolet">กรุณากรอกข้อมูล เพื่อเสนอจัดซื้อ ให้ครบถ้วน</div>
                                    <div class="col-sm-6"></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">ฝ่ายงาน</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->project_department }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">กิจกรรม/โครงการ</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->project_name }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">กลุ่มสาระ</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->project_subject }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 1</div>
                                    <div class="col-sm-4">วัน เดือน ที่จัดซื้อ</div>
                                    <div class="col-sm-6" style="color: red">
                                        @php
                                            echo App\Http\Controllers\DocumentController::DateThai($show->created_at);
                                        @endphp
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 2</div>
                                    <div class="col-sm-4">เลขที่จัดซื้อ</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->project_number }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 3</div>
                                    <div class="col-sm-4">เลขที่คำสั่ง</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->project_orderNumber }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 4</div>
                                    <div class="col-sm-4">กำหนดใช้ภายใน</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->project_getday }} วัน</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 5</div>
                                    <div class="col-sm-4">วัน เดือน ปี ที่ต้องการใช้พัสดุ</div>
                                    <div class="col-sm-6" style="color: red">
                                        @php
                                            echo App\Http\Controllers\DocumentController::DateThai($show->created_at);
                                        @endphp
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 6</div>
                                    <div class="col-sm-4">จำนวนรายการที่ขอซื้อ</div>
                                    <div class="col-sm-6" style="color: red"> รายการ</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 7</div>
                                    <div class="col-sm-4">ประเภทของเงิน</div>
                                    <div class="col-sm-6" style="color: red"> {{ $show->project_typemoney }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 8</div>
                                    <div class="col-sm-4">ฝ่ายงาน</div>
                                    <div class="col-sm-6" style="color: red"> {{ $show->project_subject }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4" style="color: blueviolet">ข้อมูลการตรวจรับ</div>
                                    <div class="col-sm-6"></div>
                                </div>
                            </li>  
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 9</div>
                                    <div class="col-sm-4">ห้างร้านที่จัดซื้อ</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->store_name }}</div>
                                </div>
                            </li> 
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">โทรศัพท์</div>
                                    <div class="col-sm-2" style="color: red">{{ $show->store_tel }}</div>
                                    <div class="col-sm-2">โทรสาร</div>
                                    <div class="col-sm-4" style="color: red">{{ $show->store_teletex }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 10</div>
                                    <div class="col-sm-4">ที่อยู่ห้างร้านบริษัทที่จัดซื้อ</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->store_address }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 11</div>
                                    <div class="col-sm-4">เลขประจำตัวผู้เสียภาษี</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->store_employeeNumber }}</div>
                                </div>
                            </li> 
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 12</div>
                                    <div class="col-sm-2">เลขที่บัญชีเงินฝากธนาคาร</div>
                                    <div class="col-sm-2" style="color: red">{{ $show->bank_number }}</div>
                                    <div class="col-sm-2">ชื่อบัญชี</div>
                                    <div class="col-sm-2" style="color: red">{{ $show->bank_account }}</div>
                                </div>
                            </li>  
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">ธนาคาร</div>
                                    <div class="col-sm-2" style="color: red">{{ $show->bank_name }}</div>
                                    <div class="col-sm-2">สาขา</div>
                                    <div class="col-sm-2" style="color: red">{{ $show->bank_branch }}</div>
                                </div>
                            </li>         
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 13</div>
                                    <div class="col-sm-4">ผู้มีอำนาจลงนาม</div>
                                    <div class="col-sm-6" style="color: red">{{ $show->store_employee }}</div>
                                </div>
                            </li> 
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 14</div>
                                    <div class="col-sm-2">ใบเสนอราคาเลขที่</div>
                                    <div class="col-sm-2" style="color: red"></div>
                                    <div class="col-sm-2">ลงวันที่</div>
                                    <div class="col-sm-2" style="color: red">
                                        @php
                                            echo App\Http\Controllers\DocumentController::DateThai($show->created_at);
                                        @endphp
                                    </div>
                                </div>
                            </li> 
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 15</div>
                                    <div class="col-sm-4">กำหนดวัน เดือน ปี ที่ส่งของ</div>
                                    <div class="col-sm-6" style="color: red"></div>
                                </div>
                            </li> 
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 16</div>
                                    <div class="col-sm-2">ผู้ตรวจรับ</div>
                                    <div class="col-sm-2" style="color: red"></div>
                                    <div class="col-sm-2">ตำแหน่ง</div>
                                    <div class="col-sm-2" style="color: red"></div>

                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 17</div>
                                    <div class="col-sm-2">วัน เดือน ปี ที่ตรวจรับ</div>
                                    <div class="col-sm-2" style="color: red"></div>
                                    <div class="col-sm-2">ใบส่งของ/ใบแจ้งหนี้/ใบเสร็จ เล่มที่</div>
                                    <div class="col-sm-2" style="color: red"></div>
                                </div>
                            </li> 
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">เลขที่</div>
                                    <div class="col-sm-2" style="color: red"></div>
                                    <div class="col-sm-2">ลงวันที่</div>
                                    <div class="col-sm-2" style="color: red"></div>
                                </div>
                            </li> 
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">เกินกำหนด วัน เดือน ปี ที่ส่งของ</div>
                                    <div class="col-sm-2" style="color: red">วัน</div>
                                    <div class="col-sm-2">ค่าปรับ</div>
                                    <div class="col-sm-2" style="color: red">บาท</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">ภาษี หัก ณ ที่จ่าย</div>
                                    <div class="col-sm-2" style="color: red">บาท</div>
                                    <div class="col-sm-2">คงจ่ายจริง</div>
                                    <div class="col-sm-2" style="color: red">บาท</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4" style="color:blueviolet">ข้อมูลเบื้องต้น</div>
                                    <div class="col-sm-6" style="color: red"></div>
                                    
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 18</div>
                                    <div class="col-sm-4">เจ้าหน้าที่พัสดุ</div>
                                    <div class="col-sm-6" style="color: red">นางสาวอรวรรณ สมเมือง</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 19</div>
                                    <div class="col-sm-4">หัวหน้าเจ้าหน้าที่พัสดุ</div>
                                    <div class="col-sm-6" style="color: red">นายนิพล ชัยวงษ์วัน</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="from-inline row">
                                    <div class="col-sm-2">ข้อที่ 20</div>
                                    <div class="col-sm-4">ผู้อำนวยการโรงเรียน</div>
                                    <div class="col-sm-6" style="color: red">นายอนุชิต  ไทยรัศมี</div>
                                </div>
                            </li>
                             

                           
                            
                        </ul>
                    </fieldset>
                </div>
            </div>
      

            <div id="two" class="container tab-pane fade"><br>
                <div class="container">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border"><h4>บันทึกข้อความ รายงานผู้อำนวยการ</h4></legend>
                        <img class="logogendoc" src="{{ URL::asset('images/kud.JPG') }}" alt="" width="auto" style="max-width: 70px;">
                    </fieldset>
                </div>
            </div>

            <div id="three" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>

        </div>
    </div>

@endsection