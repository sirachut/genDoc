<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><h4>บันทึกข้อความ รายงานผู้อำนวยการ</h4></legend>
                <img class="topleft" src="{{ URL::asset('images/kud.JPG') }}" alt="" width="auto" style="max-width: 70px;"><br>
                
                <p style="text-align:center;"><b>บันทึกข้อความ</b></p><br>
                
                <p><b>ส่วนราชการ โรงเรียนบ้านเทอดไทย</b></p>
                
                <div class="row form-inline">
                    <div class="col-sm-1"><b>ที่</b></div>
                    <div class="col-sm-5">{{ $show->project_number }}</div>
                    <div class="col-sm">
                        @php
                            echo App\Http\Controllers\DocumentController::DateThai($show->project_datein);
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
                        <div class="col-sm-5" style="text-indent: 50px;">2.อนุมัติให้แต่งตั้ง {{ $show->teacher_get_name }}</div>
                        <div class="col-sm-6">ตำแหน่ง {{ $show->teacher_rank }} เป็นผู้ตรวจรับพัสดุ</div>
                    </div>
                    <br>    <br>
                    <div class="row">
                        <div class="col-sm-6">(ลงชื่อ)..............................................เจ้าหน้าที่</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">{{ $show->parcel_name }}</div>
                        <div class="col-sm-2"></div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-6">(ลงชื่อ)..............................................หัวหน้าเจ้าหน้าที่</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">{{ $show->parcelLeader_name }}</div>
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
                        <div class="col-sm  ">{{ $show->manageschool_name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm  ">ตำแหน่งผู้อำนวยการโรงเรียน</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm  "> 
                            @php
                                echo App\Http\Controllers\DocumentController::DateThai($show->project_datein);
                            @endphp
                        </div>
                    </div>
                </div>

            </fieldset>
        </div>

        <div class="col-sm-3">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><p style="font-size:18px">ข้อมูลในเอกสารนี้</p></legend>

                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">เลขที่จัดซื้อ</small>
                    </label>
                    <p class="form-control">{{ $show->project_number }}</p>
                    
                </div>

                <div class="form-group">
                    <label for="">
                            <small class="form-text text-muted">วันเดือนปี ทีจัดซื้อ</small>
                    </label>
                    <p class="form-control"> 
                        @php
                            echo App\Http\Controllers\DocumentController::DateThai($show->project_datein);
                        @endphp
                    </p>
                </div>

                <div class="form-group">
                    <label for="">
                            <small class="form-text text-muted">ชื่อกิจกรรม/โครงการ</small>
                    </label>
                    <p class="form-control">{{ $show->project_name }}</p>
                </div>

                <div class="form-group">
                    <label for="">
                            <small class="form-text text-muted">ผู้ตรวจรับ</small>
                    </label>
                    <p class="form-control">{{ $show->teacher_get_name }}</p>
                </div>

                <div class="form-group">
                        <label for="">
                                <small class="form-text text-muted">ตำแหน่งผู้ตรวจรับเอกสาร</small>
                        </label>
                    <p class="form-control">{{ $show->teacher_rank }}</p>
                </div>

                <div class="form-group">
                        <label for="">
                                <small class="form-text text-muted">เจ้าหน้าที่พัสดุ</small>
                        </label>
                    <p class="form-control">{{ $show->parcel_name }}</p>
                </div>

                <div class="form-group">
                        <label for="">
                                <small class="form-text text-muted">หัวหน้าเจ้าหน้าที่พัสดุ</small>
                        </label>
                    <p class="form-control">{{ $show->parcelLeader_name }}</p>
                </div>

                <div class="form-group">
                        <label for="">
                                <small class="form-text text-muted">ผู้อำนวยการโรงเรียน</small>
                        </label>
                    <p class="form-control">{{ $show->manageschool_name }}</p>
                </div>   
            </fieldset>
        </div>
        
    </div>
</div>