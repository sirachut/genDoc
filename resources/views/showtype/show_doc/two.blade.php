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
                        {{ formatDateThai($show->project_datein) }}
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
                        จำนวน {{ $count[0]->getCount }} รายการ เพื่อให้ได้พัสดุมาใช้ในการปฏิบัติงานในโรงเรียนบ้านเทอดไทย ซึ่งได้รับอนุมัติเงินจาก
                        แผนงาน{{ $show->project_subject }} งาน/โครงการ {{ $show->project_name }} ของโรงเรียน จำนวน 
                        {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท ดังรายละเอียดแนบท้าย
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
                    <p style="text-indent: 50px;">3.ราคากลางของพัสดุที่จะซื้อเป็นเงิน {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท</p>
                    <p style="text-indent: 50px;">4.วงเงินที่ขอซื้อครั้งนี้ {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท ({{ convert($total[0]->getTotal ) }})</p>
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
                        <div class="col-sm-11" style="text-indent: 50px;">2.อนุมัติให้แต่งตั้ง {{ $show->teacher_get_name }} ตำแหน่ง {{ $show->teacher_rank }} เป็นผู้ตรวจรับพัสดุ</div>
                        
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
                        <div class="col-sm ">{{ formatDateThai($show->project_datein) }}</div>
                    </div>
                </div>

            </fieldset>
        </div>

        <div class="col-sm-3">

            <div class="container"><br>
                <a href="{{ route('two.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
            </div><br>

            <fieldset class="scheduler-border">


                <legend class="scheduler-border"><p style="font-size:18px">ข้อมูลในเอกสารนี้</p></legend>

             



                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">เลขที่จัดซื้อ</small>
                    </label>
                    <input class="form-control" value="{{ $show->project_number }}" readonly style="background-color:white">
                    
                </div>

                <div class="form-group">
                    <label for="">
                            <small class="form-text text-muted">วันเดือนปี ทีจัดซื้อ</small>
                    </label>
                    <input class="form-control" value="{{ formatDateThai($show->project_datein) }}" readonly style="background-color:white"> 
                </div>

                <div class="form-group">
                    <label for="">
                            <small class="form-text text-muted">ชื่อกิจกรรม/โครงการ</small>
                    </label>
                    <input class="form-control" value="{{ $show->project_name }}" readonly style="background-color:white">
                </div>

                <div class="form-group">
                    <label for="">
                            <small class="form-text text-muted">ผู้ตรวจรับ</small>
                    </label>
                    <input class="form-control" value="{{ $show->teacher_get_name }}" readonly style="background-color:white">
                   
                </div>

                <div class="form-group">
                    <label for="">
                    <small class="form-text text-muted">ตำแหน่งผู้ตรวจรับเอกสาร</small>
                    </label>
                    <input value="{{ $show->teacher_rank }}" readonly style="background-color:white" class="form-control">
                </div>

                <div class="form-group">
                        <label for="">
                                <small class="form-text text-muted">เจ้าหน้าที่พัสดุ</small>
                        </label>
                    <input value="{{ $show->parcel_name }}" readonly style="background-color:white" class="form-control">
                </div>

                <div class="form-group">
                        <label for="">
                                <small class="form-text text-muted">หัวหน้าเจ้าหน้าที่พัสดุ</small>
                        </label>
                    <input value="{{ $show->parcelLeader_name }}" readonly style="background-color:white" class="form-control">
                </div>

                <div class="form-group">
                        <label for="">
                                <small class="form-text text-muted">ผู้อำนวยการโรงเรียน</small>
                        </label>
                    <input value="{{ $show->manageschool_name }}" readonly style="background-color:white" class="form-control">
                </div>   
            </fieldset>
        </div>

        
        
    </div>
</div>