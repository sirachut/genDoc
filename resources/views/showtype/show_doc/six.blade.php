<style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบตรวจรับพัสดุ</h4></legend>
    
                    <div class="row col-sm-12">
                        <div class="col-sm-12">
                            <p class="text-center"><b>ใบตรวจจรับพัสดุ</b></p>
                        </div>
                        <div class="col-sm-8">
                            {{-- SPACE --}}
                        </div>
                        <div class="col-sm-4">
                            <p class="text-left">
                                เขียนที่ โรงเรียนบ้านเทอดไทย <br>
                                วันที่ (ทดสอบ)
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p class="text-left" style="text-indent:50px">
                                ตามที่โรงเรียนบ้านเทอดไทยได้จัดซื้อพัสดุตามงาน/โครงการ {{ $show->project_name }} จาก {{ $show->store_name }}
                                ตั้งอยู่เลขที่ {{ $show->store_address }} ตามใบสั่งซื้อเลขที่ {{ $show->project_number }} ลงวันที่  
                                @php
                                    echo App\Http\Controllers\DocumentController::DateThai($show->project_datein);
                                @endphp
                                ครบกำหนดส่งมอบวันที่ (ทดสอบ) 
                            </p>
                            <p class="text-left" style="text-indent:50px">
                                บัดนี้ผู้ขายได้จัดส่งพัสดุตามงาน/โครงการ {{ $show->project_name }} ตามใบส่งของเล่มที่ (ทดสอบ) เลขที่ {{ $show->bill_number }} 
                                ลงวันที่ (ทดสอบ)
                            </p>
                            <p class="text-left" style="text-indent:50px">
                                การซื้อขายนี้ได้สั่งแก้ไขเปลี่ยนแปลง คือ .................................-.................................
                            </p>
                            <p class="text-left" style="text-indent:50px">
                                ผู้ตรวจรับพัสดุได้ตรวจรับงานเมื่อวันที่ (ทดสอบ) แล้วปรากฏว่างานเสร็จเรียบร้อยถูกต้องตามใบสั่งซื้อทุกประการ เมื่อวันที่ (ทดสอบ) 
                                โดยส่งมอบเกินกำหนด (ทดสอบ) วัน คิดเป็นค่าปรับในอัตราร้อยละ 0.20 รวมเป็นเงินทั้งสิ้น (ทดสอบ) 
                                จึงออกหนังสือสำคัญฉบับนี้ให้ไว้ วันที่ (ทดสอบ) ผู้ขายควรได้รับเงินเป็นจำนวนทั้งสิ้น (ทดสอบ) บาท ((ทดสอบ)) ตามใบสั่งซื้อ
                            </p>
                            <p class="text-left" style="text-indent:50px">
                               จึงขอรายงานต่อผู้อำนวยการโรงเรียนบ้านเทอดไทยเพื่อโปรดทราบ ตามนัยข้อ 175(4) ระเบียบกระทรวงการคลังว่าด้วย
                               การจัดซื้อจัดจ้างและบริหารพัสดุภาครัฐ พ.ศ. 2560
                            </p> <br><br><br><br><br><br>
                            <p class="text-center">
                                (ลงชื่อ)...................................................ผู้ตรวจรับพัสดุ
                            </p>
                            <p class="text-center">
                                ({{ $show->teacher_get_name }})
                            </p>
                            

                        </div>
                    </div>

                </fieldset>
            </div>
    
            <div class="col-sm-3">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><p style="font-size:18px">ข้อมูลในเอกสารนี้</p></legend>
                    <div class="form-group">   
                        <label for="">
                            <small class="form-text text-muted">วันรับมอบสินค้า</small>
                        </label>
                        <p class="form-control">ทดสอบ</p>
                        
                    </div>
                    <div class="form-group">   
                        <label for="">
                            <small class="form-text text-muted">ชื่องาน/โครงการ</small>
                        </label>
                        <p class="form-control">{{ $show->project_name }}</p>
                        
                    </div>
                    <div class="form-group">   
                        <label for="">
                            <small class="form-text text-muted">ชื่อห้างร้านบริษัทที่จัดซื้อ</small>
                        </label>
                        <p class="form-control">{{ $show->store_name }}</p>
                        
                    </div>
                    <div class="form-group">   
                        <label for="">
                            <small class="form-text text-muted">ที่อยู่ห้างร้านที่จัดซื้อ</small>
                        </label>
                        <p class="form-control">{{ $show->store_address }}</p>
                        
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
                            <small class="form-text text-muted">เล่มที่ ของใบส่งของ</small>
                        </label>
                        <p class="form-control">ทดสอบ</p>
                        
                    </div>
                    <div class="form-group">   
                        <label for="">
                            <small class="form-text text-muted">เลขที่ ของใบส่งของ</small>
                        </label>
                        <p class="form-control">{{ $show->bill_number }}</p>
                        
                    </div>
    
                   
    
                </fieldset>
            </div>
        </div>
    </div>
        