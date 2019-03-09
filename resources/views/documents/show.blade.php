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
    <div>

        <div class="row">
            <h2>เอกสารการสั่งซื้อโรงเรียนบ้านเทอดไทย</h2>
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

                <div class="container" >
                    <div class="row">
                      <div class="col-sm-9 " >
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border" id="list-item-1"><h4>ข้อมูลของเอกสาร</h4></legend>
    
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
                                        <div  class="col-sm-4" style="color: blueviolet">กรุณากรอกข้อมูล เพื่อเสนอจัดซื้อ ให้ครบถ้วน</div>
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
                                        <div id="list-item-2" class="col-sm-4">ฝ่ายงาน</div>
                                        <div class="col-sm-6" style="color: red"> {{ $show->project_subject }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="from-inline row">
                                        <div class="col-sm-2"></div>
                                        <div  class="col-sm-4" style="color: blueviolet">ข้อมูลการตรวจรับ</div>
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
                                        <div class="col-sm-" style="color: red">{{ $show->bank_account }}</div>
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
                                        <div class="col-sm" style="color: red">
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
                                        <div id="list-item-3" class="col-sm-4" style="color:blueviolet">ข้อมูลเบื้องต้น</div>
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
                      <div class="col-sm">
                        <br>
                        <div id="list-example" class="list-group sticky"> 
                            <a class="list-group-item list-group-item-action" href="#list-item-1">กรุณากรอกข้อมูล เพื่อเสนอจัดซื้อ ให้ครบถ้วน</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-2">ข้อมูลการตรวจรับ</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-3">ข้อมูลเบื้องต้น</a>
                          </div>
                      </div>
                     
                    </div>
                  </div>

            
            </div>

            <div id="two" class="container tab-pane fade"><br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><h4>บันทึกข้อความ รายงานผู้อำนวยการ</h4></legend>
                                <img class="topleft" src="{{ URL::asset('images/kud.JPG') }}" alt="" width="auto" style="max-width: 70px;">
                                <br>
                                <p style="text-align:center;"><b>บันทึกข้อความ</b></p>
                                <br>
                                <p><b>ส่วนราชการ โรงเรียนบ้านเทอดไทย</b></p>
                                
                                <div class="row form-inline">
                                    <div class="col-sm-1"><b>ที่</b></div>
                                    <div class="col-sm-5">{{ $show->project_number }}</div>
                                    <div class="col-sm">
                                        @php
                                            echo App\Http\Controllers\DocumentController::DateThai($show->created_at);
                                        @endphp
                                    </div>
                                </div>
                                <div class="row form-inline">
                                    <div class="col-sm-1"><b>เรื่อง</b></div>
                                    <div class="col-sm-5">รายการขอซื้อพัสดุ</div>
                                </div>

                                <hr>

                                <div class="row form-inline">
                                    <div class="col-sm-1"><b>เรียน</b></div>
                                    <div class="col-sm-5">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</div>
                                </div>

                                <br>

                                <div>
                                    <p style="text-indent: 50px;">ด้วยกลุ่มสาระ {{ $show->project_department }}มีความประสงค์จะขอซื้อพัสดุ 
                                        จำนวน (countproduct) รายการ เพื่อให้ได้พัสดุมาใช้ในการปฏิบัติงานในโรงเรียนบ้านเทอดไทย ซึ่งได้รับอนุมัติเงินจาก
                                        แผนงาน{{ $show->project_subject }} งาน/โครงการ {{ $show->project_name }} ของโรงเรียน จำนวน 
                                        (sumprice) บาท ดังรายละเอียดแนบท้าย
                                    </p>
                                </div>
                                <div>
                                    <p style="text-indent: 50px;">งานพัสดุได้ตรวจสอบแล้วเห็นควรจัดซื้อตามที่เสนอ และเพื่อให้นำไปตามพระราชบัญญัติ
                                        การจัดซื้อจัดจ้างและการบริหารพัสดุภาครัฐ พ.ศ.2560 มาตรา 56  วรรคหนึ่ง (2) (ข) และ ระเบียบกระทรวงการคลัง
                                        ว่าด้วยการจัดซื้อจัดจ้างและการบริหารพัสดุภาครัฐ พ.ศ. 2560 ข้อ 22 ข้อ 79 ข้อ 25 (5) และกฎกระทรวงกำหนด
                                         วงเงินการจัดซื้อจัดจ้างพัสดุโดยวิธีเฉพาะเจาะจง วงเงินการจัดซื้อจัดจ้างที่ ไม่ทำข้อตกลงเป็นหนังสือ และวงเงินการจัดซื้อ
                                          จัดจ้างในการแต่งตั้งผู้ตรวจรับพัสดุ พ.ศ. 2560 ข้อ 1 และข้อ 5 จึงขอรายงานขอซื้อ ดังนี้
                                    </p>
                                </div>

                                <div>
                                    <p style="text-indent: 50px;">1.เหตุผลและความจำเป็นที่ต้องซื้อคือ เพื่อให้ได้พัสดุมาใช้ในงาน/โครงการ {{ $show->project_name }}</p>
                                    <p style="text-indent: 50px;">2.รายละเอียดของพัสดุที่จะซื้อคือ (ตามรายละเอียดตามบันทึกข้อความที่  {{ $show->project_number }} )</p>
                                    <p style="text-indent: 50px;">3.ราคากลางของพัสดุที่จะซื้อเป็นเงิน (sumprice) บาท</p>
                                    <p style="text-indent: 50px;">4.วงเงินที่ขอซื้อครั้งนี้ (sumprice) บาท ((translate_sumprice))</p>
                                    <p style="text-indent: 50px;">5.กำหนดระยะเวลาส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันลงนามในใบสั่งซื้อกับโรงเรียน</p>
                                    <p style="text-indent: 50px;">
                                        6.ซื้อโดยวิธีเฉพาะเจาะจง เนื่องจาก การจัดจ้างพัสดุที่มีการผลิต จำหน่าย ก่อสร้าง หรือให้บริการทั่วไป และมีวงเงินในการจัดซื้อ
                                        จัดจ้างครั้งหนึ่งไม่เกิน 50,000.00 บาท ที่กำหนดในกฎกระทรวง
                                    </p>
                                    <p style="text-indent: 50px;">7.หลักเกณฑ์การพิจารณาคัดเลือกข้อเสนอ โดยใช้เกณฑ์ราคา</p>
                                    <p style="text-indent: 50px;">8.ข้อเสนออื่น ๆ เห็นควรแต่งตั้งผู้ตรวจรับพัสดุ ตามเสนอ</p>

                                    <br>

                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm">จึงเรียนมาเพื่อโปรดและพิจารณา</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm" style="text-indent: 50px;">1.เห็นชอบในรายงานขอซื้อดังกล่าวข้างต้น</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5" style="text-indent: 50px;">2.อนุมัติให้แต่งตั้ง (teacher_name)</div>
                                        <div class="col-sm-6">ตำแหน่ง (teacher_rank) เป็นผู้ตรวจรับพัสดุ</div>
                                    </div>
                                    <br>    <br>
                                    <div class="row">
                                        <div class="col-sm-6">(ลงชื่อ)..............................................เจ้าหน้าที่</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-4">((teacher_name))</div>
                                        <div class="col-sm-2"></div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-sm-6">(ลงชื่อ)..............................................หัวหน้าเจ้าหน้าที่</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-4">((teacher_name))</div>
                                        <div class="col-sm-2"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm  ">- เห็นชอบ</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm  ">- อนุมัติ</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-7"></div>
                                        <div class="col-sm  ">(ลงชื่อ).....................................................</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm  ">((principle_teacher)</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm  ">ตำแหน่งผู้อำนวยการโรงเรียน</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm  "> @php
                                            echo App\Http\Controllers\DocumentController::DateThai($show->created_at);
                                        @endphp</div>
                                    </div>
                                    






                                </div>

                            </fieldset>
                        </div>
                        <div class="col-sm sticky">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border"><p style="font-size:18px">ข้อมูลในเอกสารนี้</p></legend>
                                    <div class="form-group">
                                        <label for="project_number">เลขที่จัดซื้อ</label>
                                        <input class="form-control" type="text" value="{{ $show->project_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="created_at">วันเดือนปี ที่จัดซื้อ</label>
                                        <input class="form-control" type="text" value="{{ $show->created_at }}">
                                    </div>
                                    
                                    
                                </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div id="three" class="container tab-pane fade"><br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><h4>รายการสินค้า</h4></legend>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        @php
                                            $i=1;
                                        @endphp

                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>จำนวน</th>
                                            <th>ลักษณะนาม</th>
                                            <th>ราคา</th>
                                            <th>ยอดรวม</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($product_Q as $item)

                                            <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item->product_amount }}</td>
                                                    <td>{{ $item->product_unitname }}</td>
                                                    <td>{{ $item->product_price }}</td>
                                                    <td>{{ $item->product_pricesum }}</td>
                                                    <td></td>
                                                @endforeach
                                                       
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>


@endsection