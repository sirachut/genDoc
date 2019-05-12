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
                <legend class="scheduler-border"><h4>ใบสั่งซื้อ</h4></legend>

                <div class="row col-sm-12">
                    <div class="col-sm-12">
                        <img class="center" width="15%" height="100%" src="{{ URL::to('/assets/img/five_show.JPG') }}">
                    </div>
                    <div class="col-sm-12">
                        <br><p class="text-center"><b>ใบสั่งซื้อ</b></p>
                    </div>
                    <div class="col-sm-6">
                        <p style="font-size:14px; line-height: 1.7;">
                            ผู้ขาย {{ $show->store_name }} <br>
                            ที่อยู่ {{ $show->store_address }} <br>
                            โทรศัพท์ {{ $show->store_tel }} <br>
                            เลขประจำตัวผู้เสียภาษี {{ $show->store_employeeNumber }} <br>
                            เลขที่บัญชีเงินฝากธนาคาร {{ $show->bank_number }} <br>
                            ชื่อบัญชี {{ $show->bank_account }} <br>
                            ธนาคาร {{ $show->bank_name }} &nbsp;&nbsp; สาขา {{ $show->bank_branch }}
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p style="font-size:14px; line-height: 1.7;">
                            ใบสั่งซื้อ เลขที่ {{ $show->project_number }} <br>
                            วันที่  
                            @php
                                echo App\Http\Controllers\DocumentController::DateThai($show->project_datein); 
                            @endphp <br>
                            โรงเรียนบ้านเทอดไทย &nbsp;&nbsp; 1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย <br>
                            โทรศัพท์ 053-730264 <br>
                        </p>
                    </div>
                    <div class="col-sm-12">
                        <p style=" text-indent: 50px; font-size:14px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                            @php
                                echo App\Http\Controllers\DocumentController::DateThai($show->project_datein); 
                            @endphp
                            ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                        </p>
                    </div>

                    @php
                        $countitem=1;
                    @endphp

                    <div class="col-sm-12">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" width=45%>รายการ</th>
                                    <th class="text-center align-middle" width=10%>จำนวน</th>
                                    <th class="text-center align-middle" width=10%>หน่วย</th>
                                    <th class="text-center align-middle" width=15%>ราคาต่อหน่วย</th>
                                    <th class="text-center align-middle" width=15%>รวมเป็นเงิน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left">ทดสอบ</td>
                                    <td class="text-center">ทดสอบ</td>
                                    <td class="text-center">ทดสอบ</td>
                                    <td class="text-right">ทดสอบ</td>
                                    <td class="text-right">ทดสอบ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">ทดสอบ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-right">ภาษี 7 %</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">ทดสอบ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">ทดสอบ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-right">ตัวหนังสือ (ทดสอบ)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-11" style="font-size:14px">
                        <p>
                            การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ <br>
                            1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ <br>
                            2.ครบกำหนดส่งมอบ (ทดสอบ) <br>
                            3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย <br>
                            4.ระยะเวลารับประกัน ............................-............................ <br>
                            5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ <br>
                            6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ<br><br>
                        </p>
                    </div>
                    <div class="col-sm-1">
                        {{-- SPACE --}}
                    </div>
                    <div class="col-sm-6">
                        {{-- SPACE --}}
                    </div>
                    <div class="col-sm-6" style="font-size:14px">
                        <p class="text-center">(ลงชื่อ).............................................................ผู้ซื้อ</p>
                        <p class="text-center">({{ $show->parcelLeader_name }})</p>
                        <p class="text-center">
                            วันที่  
                            @php
                                echo App\Http\Controllers\DocumentController::DateThai($show->project_datein); 
                            @endphp
                        </p>
                        <br><br>
                        <p class="text-center">(ลงชื่อ).............................................................ผู้ขาย</p>
                        <p class="text-center">({{ $show->store_employee }})</p>
                        <p class="text-center">
                            วันที่  
                            @php
                                echo App\Http\Controllers\DocumentController::DateThai($show->project_datein); 
                            @endphp
                        </p>
                    </div>

                    {{-- <div class="col-sm-6">
                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                        <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                        <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                    </div> --}}
                </div>
            </fieldset>
        </div>

        <div class="col-sm-3">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><p style="font-size:18px">ข้อมูลในเอกสารนี้</p></legend>
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
                        <small class="form-text text-muted">เบอร์โทรห้างร้านที่จัดซื้อ</small>
                    </label>
                    <p class="form-control">{{ $show->store_tel }}</p>
                    
                </div>
                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">เลขประจำตัวผู้เสียภาษี</small>
                    </label>
                    <p class="form-control">{{ $show->store_employeeNumber }}</p>
                    
                </div>
                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">เลขที่บัญชีธนาคารของห้างร้าน</small>
                    </label>
                    <p class="form-control">{{ $show->bank_number }}</p>
                    
                </div>
                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">ชื่อบัญชีธนาคารของห้างร้าน</small>
                    </label>
                    <p class="form-control">{{ $show->bank_account }}</p>
                    
                </div>
                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">ชื่อธนาคาร</small>
                    </label>
                    <p class="form-control">{{ $show->bank_name }}</p>
                    
                </div>
                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">สาขาของธนาคาร</small>
                    </label>
                    <p class="form-control">{{ $show->bank_branch }}</p>
                    
                </div>

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
                            <small class="form-text text-muted">กำหนดส่งมอบ</small>
                    </label>
                    <p class="form-control">{{ $show->project_getday }} วัน</p>
                </div>
                <div class="form-group">
                    <label for="">
                            <small class="form-text text-muted">วันครบกำหนดส่งมอบ</small>
                    </label>
                    <p class="form-control">ทดสอบ</p>
                </div>
                <div class="form-group">
                        <label for="">
                                <small class="form-text text-muted">หัวหน้าเจ้าหน้าที่พัสดุ</small>
                        </label>
                    <p class="form-control">{{ $show->parcelLeader_name }}</p>
                </div>
                <div class="form-group">
                    <label for="">
                            <small class="form-text text-muted">ผู้มีอำนาจลงนาม</small>
                    </label>
                    <p class="form-control">{{ $show->store_employee }}</p>
                </div>

            </fieldset>
        </div>
    </div>
</div>
    