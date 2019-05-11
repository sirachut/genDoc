<div class="container">
    <div class="row">

        <div class="col-sm-9">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><h4>บันทึกข้อความ รายงานหัวหน้าเจ้าหน้าที่</h4></legend>
                <img class="topleft" src="{{ URL::asset('images/kud.JPG') }}" alt="" width="auto" style="max-width: 70px;"><br>
                
                <p style="text-align:center;"><b>บันทึกข้อความ</b></p>  <br>
                
                <p><b>ส่วนราชการ โรงเรียนบ้านเทอดไทย</b></p>
                
                <div class="row form-inline">
                    <div class="col-sm-1"><b>ที่</b></div>
                    <div class="col-sm-5">ช.{{ $show->project_number }}</div>
                    <div class="col-sm">
                        @php
                            echo App\Http\Controllers\DocumentController::DateThai($show->project_datein);
                        @endphp
                    </div>
                </div>

                <div class="row form-inline">
                    <div class="col-sm-1"><b>เรื่อง</b></div>
                    <div class="col-sm-5">รายงานการพิจารณาและขออนุมัติสั่งซื้อ</div>
                </div>

                <hr>

                <div class="row form-inline">
                    <div class="col-sm-1"><b>เรียน</b></div>
                    <div class="col-sm-5">หัวหน้าเจ้าหน้าที่</div>
                </div>

                <br>

                <div>
                    <p style="text-indent: 50px;">ตามที่ผูอำนวยการโรงเรียนบ้านเทอดไทยเห็นชอบรายงานขอซื้อพัสดุตาม งาน/โครงงาน 
                        {{ $show->project_name }} จำนวนเงิน (countprice) บาท (translate_price) ตามระเบียบกระทรวงการคลัง
                        ว่าด้วยการจัดซื้อจัดจ้างและการบริหาร พ.ศ.2560 ข้อ 24 รายละเอียดดังแนบ
                    </p>
                </div>
                <div>
                    <p style="text-indent: 50px;">ในการนี้เจ้าหน้าที่ได้เจรจาตกลงราคากับ {{ $show->store_name }} ซึ่งมีอาชีพค้าขาย
                        ปรากฏว่าเสนอราคาเป็นเงิน (countprice) บาท (translate_priceถ้วน) ดังนั้นเพื่อให้เป็นไปตามระเบียบกระทรวงการคลัง
                        ว่าด้วยการจัดซื้อจัดจ้างและการบริหาร ข้อ 79 จังเห็นควรจัดซื้อจากผู้เสนอราคารายดังกล่าว 
                    </p>
                </div>

                <div>
                    <p style="text-indent: 50px;">จึงเรียนมาเพื่อโปรดและพิจารณา</p>
                    <p style="text-indent: 50px;">1.อนุมัติให้สั่งซื้อจาก {{ $show->store_name }} เป็นผู้ส่งมอบพัสดุ 
                        ตาม งาน/โครงการ {{ $show->project_name }} วงเงิน (countprice) บาท (translate_priceถ้วน) 
                        กำหนดระยะเวลาส่งมอบภายใน {{ $show->project_getday }} วัน
                    </p>
                    <p style="text-indent: 50px;">2.ลงนามในใบสั่งซื้อดังแนบ</p>

                    <div class="row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm  ">(ลงชื่อ).....................................................เจ้าหน้าที่</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm  ">{{ $show->parcel_name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm  "> &nbsp;&nbsp;&nbsp;
                            @php 
                                echo App\Http\Controllers\DocumentController::DateThai($show->project_datein);
                            @endphp
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm  ">- อนุมัติ</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm  ">- ลงนามแล้ว</div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-7"></div>
                        <div class="col-sm  ">(ลงชื่อ).....................................................</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm  ">{{ $show->parcelLeader_name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm  ">ตำแหน่ง หัวหน้าเจ้าหน้าที่</div>
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