<div class="container">

    <div class="row">
        <div class="col-sm-8" style="padding: 15px;">
            <div class="card col-sm-12" style="padding:15px">
                <h4>ข้อมูลเบื้องต้น</h4>
                <small class="form-text text-muted">หมายเหตุ : รายละเอียดพื้นฐาน ของโครงการ {{ $show->project_name }}</small><hr>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="">ฝ่ายงาน</label>
                        <p  class="form-control" >{{ $show->project_department }}</p>
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="">กิจกรรม/โครงการ</label>
                        <p class="form-control" >{{ $show->project_name }}</p>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">กลุ่มสาระ</label>
                        <p class="form-control" >{{ $show->project_subject }}</p>
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="">วันเดือนปี ที่จัดซื้อ</label>
                        <p class="form-control"> 
                            @php
                                echo App\Http\Controllers\DocumentController::DateThai($show->project_datein);
                            @endphp
                        </p>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">เลขที่จัดซื้อ</label>
                        <p  class="form-control" >{{ $show->project_number }}</p>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">เลขที่คำสั่ง</label>
                        <p  class="form-control" >{{ $show->project_orderNumber }}</p>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">กำหนดใช้ภายใน</label>
                        <p  class="form-control" >{{ $show->project_getday }} วัน</p>
                    </div> 
                    <div class="form-group col-sm-8">
                        <label for="">ประเภทของเงิน</label>
                        <p  class="form-control" >{{ $show->project_typemoney }}</p>
                    </div> 
                </div>

            </div> 

            <div class="row">
                <div class="col-sm-12" style="padding: 15px;">

                    <div class="card col-sm-12" style="padding:15px">

                        <h4>ข้อมูลร้านค้า</h4>
                        <small class="form-text text-muted">หมายเหตุ : รายละเอียดพื้นฐาน ของโครงการ {{ $show->project_name }}</small><hr>
                        
                        <div class="row">

                            <div class="form-group col-sm-8">
                                <label for="">ห้างร้านบริษัทที่จัดซื้อ</label>
                                <p  class="form-control" >{{ $show->store_name }}</p>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="">โทรศัพท์</label>
                                <p  class="form-control" >{{ $show->store_tel }}</p>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="">โทรสาร</label>
                                <p  class="form-control" >{{ $show->store_teletex }}</p>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="">ที่อยู่ของห้างร้าน</label>
                                <p  class="form-control" >{{ $show->store_address }}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">เลขประจำตัวผู้เสียภาษี</label>
                                <p  class="form-control" >{{ $show->store_employeeNumber }}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">ผู้มีอำนาจลงนาม</label>
                                <p  class="form-control" >{{ $show->store_employee }}</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
        
        <div class="col-sm-4" style="padding: 15px;">
            <div class="card col-sm-12" style="padding:15px">
                <h4>ข้อมูลบุคลากร</h4>
                <small class="form-text text-muted">หมายเหตุ : รายละเอียดบุคลากร ของโครงการ</small><hr>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="">ผู้ตรวจรับ</pre></label>
                        <p class="form-control" > {{ $show->teacher_get_name }} &nbsp; ({{ $show->teacher_rank }})</p>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="">เจ้าหน้าที่พัสดุ</label>
                        <p class="form-control" >{{ $show->parcel_name }}</p>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="">หัวหน้าเจ้าที่พัสดุ</label>
                        <p class="form-control" >{{ $show->parcelLeader_name }}</p>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="">ผู้อำนวยการโรงเรียน</label>
                        <p class="form-control" >{{ $show->manageschool_name }}</p>
                    </div>
                </div>         

            </div>

            <div class="row">
                <div class="col-sm-12" style="padding: 15px;">
                    <div class="card col-sm-12" style="padding:15px">
                            
                        <h4>ธนาคารของร้านค้า</h4>
                        <small class="form-text text-muted">หมายเหตุ : ข้อมูลบัญชีธนาคารของร้านค้า</small><hr>

                        <div class="row">

                            <div class="form-group col-sm-12">
                                <label for="">ชื่อบัญชี</label>
                                <p  class="form-control" >{{ $show->bank_account }}</p>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="">เลขที่บัญชีเงินฝากธนาคาร</label>
                                <p  class="form-control" >{{ $show->bank_number }}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">ธนาคาร</label>
                                <p  class="form-control" >{{ $show->bank_name }}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">สาขา</label>
                                <p  class="form-control" >{{ $show->bank_branch }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        
    </div>

    <div class="row">

        @php
            $countitem=0;
        @endphp

        <div class="col-sm-12" style="padding: 15px;">
            <div class="card col-sm-12" style="padding:15px">
                <h4>ข้อมูลรายการสินค้าที่สั่งซื้อในโครงการนี้</h4>
                <small class="form-text text-muted">หมายเหตุ : รายการสินค้าของโครงการ {{ $show->project_name }}</small><hr>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-censter align-middle" rowspan="2" width=5%>ลำดับที่</th>
                            <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                            <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                            <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                            <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                        </tr>
                        <tr>
                            <th class="text-center align-middle" width=7.5%>จำนวน</th>
                            <th class="text-center align-middle" width=7.5%>หน่วย</th>
                            <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                            <th class="text-center align-middle">หน่วยละ</th>
                            <th class="text-center align-middle">จำนวนเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{ ++$countitem }}</td>
                            <td class="text-left">ทดสอบ</td>
                            <td class="text-center">ทดสอบ</td>
                            <td class="text-center">ทดสอบ</td>
                            <td class="text-right">ทดสอบ</td>
                            <td class="text-right">ทดสอบ</td>
                            <td class="text-right">ทดสอบ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">รวมราคาสินค้าและบริการ</td>
                            <td></td>
                            <td class="text-right">ทดสอบ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">ภาษี 7%</td>
                            <td></td>
                            <td class="text-right">ทดสอบ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                            <td></td>
                            <td class="text-right">ทดสอบ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br><br><br><br>
</div>