@php
    $countitem=1;
@endphp

<div class="container" style="font-size:14px">

    @if ($count[0]->getCount < 18 )

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบสั่งซื้อ</h4></legend>

                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane show active" id="five_onepage" role="tabpanel" aria-labelledby="five_onepage-tab">

                                <div class="row">
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
                                            {{ formatDateThai($show->project_datein) }}<br>
                                            โรงเรียนบ้านเทอดไทย &nbsp;&nbsp; 1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย <br>
                                            โทรศัพท์ 053-730264 <br>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p style=" text-indent: 50px; font-size:14px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                                            {{ formatDateThai($show->project_datein) }}
                                            ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                                        </p>
                                    </div> 
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-sm" style="font-size:12px">
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

                                                @for ($i = 0; $i < $count[0]->getCount; $i++)

                                                @php
                                                    $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                                    $tax = $total[0]->getTotal - $beforetax;
                                                    $row = 17 - $count[0]->getCount;
                                                @endphp

                                                <tr>
                                                    <td class="text-center">{{ $countitem++ }}</td>
                                                    <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                                    <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                                    <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                                </tr>

                                                @endfor
                                                
                                                @for ($k = 0; $k < $row; $k++)
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                @endfor

                                                {{-- <tr>
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
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                    </div>
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="five_twopage" role="tabpanel" aria-labelledby="five_twopage-tab">
                                <table class="table table-bordered table-sm" style="font-size:12px">
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

                                        

                                        @php
                                            $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                            $beforetax = ($total[0]->getTotal * 100)/107;
                                            $tax = $total[0]->getTotal - $beforetax;
                                            $row = 12;
                                        @endphp
                                        
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @endfor

                                        <tr>
                                            <td></td>
                                            <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">ภาษี 7 %</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="row">

                                    <div class="col-sm-10" style="font-size:14px">
                                        <p>
                                            การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ <br>
                                            1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ <br>
                                            2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} <br>
                                            3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย <br>
                                            4.ระยะเวลารับประกัน ............................-............................ <br>
                                            5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ<br>
                                            6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ<br><br>
                                        </p>
                                    </div>

                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-6"></div>

                                    <div class="col-sm-6" style="font-size:14px">
                                        <p class="text-center">(ลงชื่อ).............................................................ผู้ซื้อ</p>
                                        <p class="text-center">({{ $show->parcelLeader_name }})</p>
                                        <p class="text-center">วันที่
                                            {{ formatDateThai($show->project_datein) }}
                                        </p>
                                        <br><br>
                                        <p class="text-center">(ลงชื่อ).............................................................ผู้ขาย</p>
                                        <p class="text-center">({{ $show->store_employee }})</p>
                                        <p class="text-center">วันที่
                                            {{ formatDateThai($show->project_datein) }}
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                </fieldset>
            </div>

            <div class="col-sm-3">
                <div class="container"><br>
                    <a href="{{ route('five.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="five_onepage-tab" data-toggle="pill" href="#five_onepage" role="tab" aria-controls="five_onepage" aria-selected="true">หน้าที่ 1</a>
                        <a class="nav-link" id="five_twopage-tab" data-toggle="pill" href="#five_twopage" role="tab" aria-controls="five_twopage" aria-selected="false">หน้าที่ 2</a>
                        {{-- <a class="nav-link" id="three_threepage-tab" data-toggle="pill" href="#three_threepage" role="tab" aria-controls="three_threepage" aria-selected="false">หน้าที่ 3</a> --}}

                    </div>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 18 && $count[0]->getCount < 30 )

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบสั่งซื้อ</h4></legend>

                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane show active" id="five_onepage" role="tabpanel" aria-labelledby="five_onepage-tab">

                                <div class="row">
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
                                            {{ formatDateThai($show->project_datein) }}<br>
                                            โรงเรียนบ้านเทอดไทย &nbsp;&nbsp; 1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย <br>
                                            โทรศัพท์ 053-730264 <br>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p style=" text-indent: 50px; font-size:14px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                                            {{ formatDateThai($show->project_datein) }}
                                            ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                                        </p>
                                    </div> 


                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-sm" style="font-size:12px">
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

                                                @for ($i = 0; $i < 17; $i++)

                                                @php
                                                    $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                                    $tax = $total[0]->getTotal - $beforetax;
                                                    
                                                @endphp

                                                <tr>
                                                    <td class="text-center">{{ $countitem++ }}</td>
                                                    <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                                    <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                                    <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                                </tr>

                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>

                                    

                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                    </div>
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="five_twopage" role="tabpanel" aria-labelledby="five_twopage-tab">
                                <table class="table table-bordered table-sm" style="font-size:12px">
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

                                        @for ($i = 17; $i < $count[0]->getCount; $i++)

                                        @php
                                            $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                            $beforetax = ($total[0]->getTotal * 100)/107;
                                            $tax = $total[0]->getTotal - $beforetax;
                                            $row = 29 - $count[0]->getCount;
                                        @endphp

                                        <tr>
                                            <td class="text-center">{{ $countitem++ }}</td>
                                            <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                            <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                            <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                            <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                        </tr>

                                        @endfor
                                        
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @endfor

                                        <tr>
                                            <td></td>
                                            <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">ภาษี 7 %</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="row">

                                    <div class="col-sm-10" style="font-size:14px">
                                        <p>
                                            การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ <br>
                                            1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ <br>
                                            2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} <br>
                                            3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย <br>
                                            4.ระยะเวลารับประกัน ............................-............................ <br>
                                            5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ<br>
                                            6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ<br><br>
                                        </p>
                                    </div>

                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-6"></div>

                                    <div class="col-sm-6" style="font-size:14px">
                                        <p class="text-center">(ลงชื่อ).............................................................ผู้ซื้อ</p>
                                        <p class="text-center">({{ $show->parcelLeader_name }})</p>
                                        <p class="text-center">วันที่
                                            {{ formatDateThai($show->project_datein) }}
                                        </p>
                                        <br><br>
                                        <p class="text-center">(ลงชื่อ).............................................................ผู้ขาย</p>
                                        <p class="text-center">({{ $show->store_employee }})</p>
                                        <p class="text-center">วันที่
                                            {{ formatDateThai($show->project_datein) }}
                                        </p>
                                    </div>
                                </div>

                            </div>

                            {{-- <div class="tab-pane fade" id="five_threepage" role="tabpanel" aria-labelledby="five_threepage-tab">
                            </div> --}}

                        </div>

                </fieldset>
            </div>

            <div class="col-sm-3">
                <div class="container"><br>
                    <a href="{{ route('five.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="five_onepage-tab" data-toggle="pill" href="#five_onepage" role="tab" aria-controls="five_onepage" aria-selected="true">หน้าที่ 1</a>
                        <a class="nav-link" id="five_twopage-tab" data-toggle="pill" href="#five_twopage" role="tab" aria-controls="five_twopage" aria-selected="false">หน้าที่ 2</a>
                        {{-- <a class="nav-link" id="three_threepage-tab" data-toggle="pill" href="#three_threepage" role="tab" aria-controls="three_threepage" aria-selected="false">หน้าที่ 3</a> --}}

                    </div>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 30 && $count[0]->getCount < 51 )

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบสั่งซื้อ</h4></legend>

                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane show active" id="five_onepage" role="tabpanel" aria-labelledby="five_onepage-tab">

                                <div class="row">
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
                                            {{ formatDateThai($show->project_datein) }}<br>
                                            โรงเรียนบ้านเทอดไทย &nbsp;&nbsp; 1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย <br>
                                            โทรศัพท์ 053-730264 <br>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p style=" text-indent: 50px; font-size:14px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                                            {{ formatDateThai($show->project_datein) }}
                                            ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                                        </p>
                                    </div> 


                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-sm" style="font-size:12px">
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

                                                @for ($i = 0; $i < 17; $i++)

                                                @php
                                                    $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                                    $tax = $total[0]->getTotal - $beforetax;
                                                    
                                                @endphp

                                                <tr>
                                                    <td class="text-center">{{ $countitem++ }}</td>
                                                    <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                                    <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                                    <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                                </tr>

                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>

                                    

                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                    </div>
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="five_twopage" role="tabpanel" aria-labelledby="five_twopage-tab">
                                <table class="table table-bordered table-sm" style="font-size:12px">
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

                                        @for ($i = 17 ; $i < $count[0]->getCount ; $i++)

                                        @php
                                            $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                            $beforetax = ($total[0]->getTotal * 100)/107;
                                            $tax = $total[0]->getTotal - $beforetax;
                                            $row = 50 - $count[0]->getCount;
                                        @endphp

                                        <tr>
                                            <td class="text-center">{{ $countitem++ }}</td>
                                            <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                            <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                            <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                            <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                        </tr>

                                        @endfor
                                        
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @endfor

                                        
                                    </tbody>
                                </table>

                                <div class="row">
                                    
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                    </div>
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="tab-pane fade" id="five_threepage" role="tabpanel" aria-labelledby="five_threepage-tab">
                        
                                    <table class="table table-bordered table-sm" style="font-size:12px">
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


                                            @php
                                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                                $beforetax = ($total[0]->getTotal * 100)/107;
                                                $tax = $total[0]->getTotal - $beforetax;
                                                $row = 12;
                                            @endphp

                                        
                                            @for ($k = 0; $k < $row; $k++)
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            @endfor

                                            <tr>
                                                <td></td>
                                                <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="text-right">ภาษี 7 %</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="text-right">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="row">

                                        <div class="col-sm-10" style="font-size:14px">
                                            <p>
                                                การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ <br>
                                                1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ <br>
                                                2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} <br>
                                                3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย <br>
                                                4.ระยะเวลารับประกัน ............................-............................ <br>
                                                5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ<br>
                                                6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ<br><br>
                                            </p>
                                        </div>

                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-6"></div>

                                        <div class="col-sm-6" style="font-size:14px">
                                            <p class="text-center">(ลงชื่อ).............................................................ผู้ซื้อ</p>
                                            <p class="text-center">({{ $show->parcelLeader_name }})</p>
                                            <p class="text-center">วันที่
                                                {{ formatDateThai($show->project_datein) }}
                                            </p>
                                            <br><br>
                                            <p class="text-center">(ลงชื่อ).............................................................ผู้ขาย</p>
                                            <p class="text-center">({{ $show->store_employee }})</p>
                                            <p class="text-center">วันที่
                                                {{ formatDateThai($show->project_datein) }}
                                            </p>
                                        </div>
                                    </div>

                            </div>
                                
                        </div>

                </fieldset>
            </div>

            <div class="col-sm-3">
                <div class="container"><br>
                    <a href="{{ route('five.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="five_onepage-tab" data-toggle="pill" href="#five_onepage" role="tab" aria-controls="five_onepage" aria-selected="true">หน้าที่ 1</a>
                        <a class="nav-link" id="five_twopage-tab" data-toggle="pill" href="#five_twopage" role="tab" aria-controls="five_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="five_threepage-tab" data-toggle="pill" href="#five_threepage" role="tab" aria-controls="five_threepage" aria-selected="false">หน้าที่ 3</a>

                    </div>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 51 && $count[0]->getCount < 63 )

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบสั่งซื้อ</h4></legend>

                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane show active" id="five_onepage" role="tabpanel" aria-labelledby="five_onepage-tab">

                                <div class="row">
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
                                            {{ formatDateThai($show->project_datein) }}<br>
                                            โรงเรียนบ้านเทอดไทย &nbsp;&nbsp; 1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย <br>
                                            โทรศัพท์ 053-730264 <br>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p style=" text-indent: 50px; font-size:14px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                                            {{ formatDateThai($show->project_datein) }}
                                            ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                                        </p>
                                    </div> 


                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-sm" style="font-size:12px">
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

                                                @for ($i = 0; $i < 17; $i++)

                                                @php
                                                    $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                                    $tax = $total[0]->getTotal - $beforetax;
                                                    
                                                @endphp

                                                <tr>
                                                    <td class="text-center">{{ $countitem++ }}</td>
                                                    <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                                    <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                                    <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                                </tr>

                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>

                                    

                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                    </div>
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="five_twopage" role="tabpanel" aria-labelledby="five_twopage-tab">
                                <table class="table table-bordered table-sm" style="font-size:12px">
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

                                            @for ($i = 17 ; $i < 50 ; $i++)

                                            @php
                                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                                $beforetax = ($total[0]->getTotal * 100)/107;
                                                $tax = $total[0]->getTotal - $beforetax;
                                            @endphp

                                            <tr>
                                                <td class="text-center">{{ $countitem++ }}</td>
                                                <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                                <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                                <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                                <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                            </tr>

                                            @endfor
                                            
                                        </tbody>
                                </table>

                                <div class="row">
                                    
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                    </div>
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="tab-pane fade" id="five_threepage" role="tabpanel" aria-labelledby="five_threepage-tab">
                        
                                <table class="table table-bordered table-sm" style="font-size:12px">
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

                                        @for ($i = 50 ; $i < $count[0]->getCount ; $i++)

                                        @php
                                            $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                            $beforetax = ($total[0]->getTotal * 100)/107;
                                            $tax = $total[0]->getTotal - $beforetax;
                                            $row = 62 - $count[0]->getCount;
                                        @endphp

                                        <tr>
                                            <td class="text-center">{{ $countitem++ }}</td>
                                            <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                            <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                            <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                            <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                        </tr>

                                        @endfor
                                        
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @endfor

                                        <tr>
                                            <td></td>
                                            <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">ภาษี 7 %</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="row">

                                    <div class="col-sm-10" style="font-size:14px">
                                        <p>
                                            การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ <br>
                                            1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ <br>
                                            2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} <br>
                                            3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย <br>
                                            4.ระยะเวลารับประกัน ............................-............................ <br>
                                            5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ<br>
                                            6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ<br><br>
                                        </p>
                                    </div>

                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-6"></div>

                                    <div class="col-sm-6" style="font-size:14px">
                                        <p class="text-center">(ลงชื่อ).............................................................ผู้ซื้อ</p>
                                        <p class="text-center">({{ $show->parcelLeader_name }})</p>
                                        <p class="text-center">วันที่
                                            {{ formatDateThai($show->project_datein) }}
                                        </p>
                                        <br><br>
                                        <p class="text-center">(ลงชื่อ).............................................................ผู้ขาย</p>
                                        <p class="text-center">({{ $show->store_employee }})</p>
                                        <p class="text-center">วันที่
                                            {{ formatDateThai($show->project_datein) }}
                                        </p>
                                    </div>

                                </div>

                            </div>
                                
                        </div>

                </fieldset>
            </div>

            <div class="col-sm-3">
                <div class="container"><br>
                    <a href="{{ route('five.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="five_onepage-tab" data-toggle="pill" href="#five_onepage" role="tab" aria-controls="five_onepage" aria-selected="true">หน้าที่ 1</a>
                        <a class="nav-link" id="five_twopage-tab" data-toggle="pill" href="#five_twopage" role="tab" aria-controls="five_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="five_threepage-tab" data-toggle="pill" href="#five_threepage" role="tab" aria-controls="five_threepage" aria-selected="false">หน้าที่ 3</a>

                    </div>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 63 && $count[0]->getCount < 83 )

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบสั่งซื้อ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane show active" id="five_onepage" role="tabpanel" aria-labelledby="five_onepage-tab">

                            <div class="row">
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
                                        {{ formatDateThai($show->project_datein) }}<br>
                                        โรงเรียนบ้านเทอดไทย &nbsp;&nbsp; 1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย <br>
                                        โทรศัพท์ 053-730264 <br>
                                    </p>
                                </div>
                                <div class="col-sm-12">
                                    <p style=" text-indent: 50px; font-size:14px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                                        {{ formatDateThai($show->project_datein) }}
                                        ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                                    </p>
                                </div> 
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-sm" style="font-size:12px">
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

                                            @for ($i = 0; $i < 17; $i++)

                                            @php
                                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                                $beforetax = ($total[0]->getTotal * 100)/107;
                                                $tax = $total[0]->getTotal - $beforetax;
                                                
                                            @endphp

                                            <tr>
                                                <td class="text-center">{{ $countitem++ }}</td>
                                                <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                                <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                                <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                                <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                            </tr>

                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                </div>
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="five_twopage" role="tabpanel" aria-labelledby="five_twopage-tab">
                            <table class="table table-bordered table-sm" style="font-size:12px">
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

                                    @for ($i = 17 ; $i < 50 ; $i++)

                                    @php
                                        $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                        $beforetax = ($total[0]->getTotal * 100)/107;
                                        $tax = $total[0]->getTotal - $beforetax;
                                    @endphp

                                    <tr>
                                        <td class="text-center">{{ $countitem++ }}</td>
                                        <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                        <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                        <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                    </tr>

                                    @endfor
                                    
                                </tbody>
                            </table>

                            <div class="row">
                                
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                </div>
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                </div>
                                
                            </div>

                        </div>

                        <div class="tab-pane fade" id="five_threepage" role="tabpanel" aria-labelledby="five_threepage-tab">
                    
                            <table class="table table-bordered table-sm" style="font-size:12px">
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

                                    @for ($i = 50 ; $i < $count[0]->getCount ; $i++)

                                    @php
                                        $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                        $beforetax = ($total[0]->getTotal * 100)/107;
                                        $tax = $total[0]->getTotal - $beforetax;
                                        $row = 82 - $count[0]->getCount;
                                    @endphp

                                    <tr>
                                        <td class="text-center">{{ $countitem++ }}</td>
                                        <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                        <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                        <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                    </tr>

                                    @endfor
                                    
                                    @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    @endfor

                                    
                                    </tbody>
                            </table>
                            <div class="row">
                            
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                </div>
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="tab-pane fade" id="five_fourpage" role="tabpanel" aria-labelledby="five_fourpage-tab">
                            <table class="table table-bordered table-sm" style="font-size:12px">
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

                                    {{-- @for ($i = 0; $i < $count[0]->getCount; $i++) --}}

                                    @php
                                        $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                        $beforetax = ($total[0]->getTotal * 100)/107;
                                        $tax = $total[0]->getTotal - $beforetax;
                                        $row = 12;
                                    @endphp

                                    {{-- <tr>
                                        <td class="text-center">{{ $countitem++ }}</td>
                                        <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                        <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                        <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                    </tr> --}}

                                    {{-- @endfor --}}
                                    
                                    @for ($k = 0; $k < $row; $k++)
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    @endfor

                                    <tr>
                                        <td></td>
                                        <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-right">ภาษี 7 %</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-right">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row">

                                <div class="col-sm-10" style="font-size:14px">
                                    <p>
                                        การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ <br>
                                        1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ <br>
                                        2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} <br>
                                        3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย <br>
                                        4.ระยะเวลารับประกัน ............................-............................ <br>
                                        5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ<br>
                                        6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ<br><br>
                                    </p>
                                </div>

                                <div class="col-sm-2"></div>
                                <div class="col-sm-6"></div>

                                <div class="col-sm-6" style="font-size:14px">
                                    <p class="text-center">(ลงชื่อ).............................................................ผู้ซื้อ</p>
                                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                                    <p class="text-center">วันที่
                                        {{ formatDateThai($show->project_datein) }}
                                    </p>
                                    <br><br>
                                    <p class="text-center">(ลงชื่อ).............................................................ผู้ขาย</p>
                                    <p class="text-center">({{ $show->store_employee }})</p>
                                    <p class="text-center">วันที่
                                        {{ formatDateThai($show->project_datein) }}
                                    </p>
                                </div>
                            </div>
                        </div> 
                    </div>

                </fieldset>
            </div>

            <div class="col-sm-3">
                <div class="container"><br>
                    <a href="{{ route('five.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="five_onepage-tab" data-toggle="pill" href="#five_onepage" role="tab" aria-controls="five_onepage" aria-selected="true">หน้าที่ 1</a>
                        <a class="nav-link" id="five_twopage-tab" data-toggle="pill" href="#five_twopage" role="tab" aria-controls="five_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="five_threepage-tab" data-toggle="pill" href="#five_threepage" role="tab" aria-controls="five_threepage" aria-selected="false">หน้าที่ 3</a>
                        <a class="nav-link" id="five_fourpage-tab" data-toggle="pill" href="#five_fourpage" role="tab" aria-controls="five_fourpage" aria-selected="false">หน้าที่ 4</a>


                    </div>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 83 )

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบสั่งซื้อ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane show active" id="five_onepage" role="tabpanel" aria-labelledby="five_onepage-tab">

                            <div class="row">
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
                                        {{ formatDateThai($show->project_datein) }}<br>
                                        โรงเรียนบ้านเทอดไทย &nbsp;&nbsp; 1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย <br>
                                        โทรศัพท์ 053-730264 <br>
                                    </p>
                                </div>
                                <div class="col-sm-12">
                                    <p style=" text-indent: 50px; font-size:14px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                                        {{ formatDateThai($show->project_datein) }}
                                        ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                                    </p>
                                </div> 


                                <div class="col-sm-12">
                                    <table class="table table-bordered table-sm" style="font-size:12px">
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

                                            @for ($i = 0; $i < 17; $i++)

                                            @php
                                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                                $beforetax = ($total[0]->getTotal * 100)/107;
                                                $tax = $total[0]->getTotal - $beforetax;
                                                
                                            @endphp

                                            <tr>
                                                <td class="text-center">{{ $countitem++ }}</td>
                                                <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                                <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                                <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                                <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                            </tr>

                                            @endfor
                                        </tbody>
                                    </table>
                                </div>

                                

                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                </div>
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="five_twopage" role="tabpanel" aria-labelledby="five_twopage-tab">
                            <table class="table table-bordered table-sm" style="font-size:12px">
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

                                    @for ($i = 17 ; $i < 50 ; $i++)

                                    @php
                                        $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                        $beforetax = ($total[0]->getTotal * 100)/107;
                                        $tax = $total[0]->getTotal - $beforetax;
                                    @endphp

                                    <tr>
                                        <td class="text-center">{{ $countitem++ }}</td>
                                        <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                        <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                        <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                    </tr>

                                    @endfor
                                    
                                </tbody>
                            </table>

                            <div class="row">
                                
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                </div>
                                <div class="col-sm-6"><br>
                                    <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                    <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                </div>
                                
                            </div>

                        </div>

                        <div class="tab-pane fade" id="five_threepage" role="tabpanel" aria-labelledby="five_threepage-tab">
                    
                            <table class="table table-bordered table-sm" style="font-size:12px">
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

                                    @for ($i = 50 ; $i < 82 ; $i++)

                                    @php
                                        $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                        $beforetax = ($total[0]->getTotal * 100)/107;
                                        $tax = $total[0]->getTotal - $beforetax;
                                        
                                    @endphp

                                    <tr>
                                        <td class="text-center">{{ $countitem++ }}</td>
                                        <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                        <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                        <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                    </tr>

                                    @endfor
                                    
                                    </tbody>
                                </table>
                                <div class="row">
                                
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ซื้อ</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->parcelLeader_name }})</p>
                                    </div>
                                    <div class="col-sm-6"><br>
                                        <p class="text-center" style="font-size:14px">(ลงชื่อ)................................................ผู้ขาย</p>
                                        <p class="text-center" style="font-size:14px">({{ $show->store_employee }})</p>
                                    </div>
                                    
                                </div>
                        </div>

                        <div class="tab-pane fade" id="five_fourpage" role="tabpanel" aria-labelledby="five_fourpage-tab">
                            <table class="table table-bordered table-sm" style="font-size:12px">
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

                                    @for ($i = 82; $i < $count[0]->getCount; $i++)

                                    @php
                                        $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                        $beforetax = ($total[0]->getTotal * 100)/107;
                                        $tax = $total[0]->getTotal - $beforetax;
                                        $row = 94 - $count[0]->getCount;
                                    @endphp

                                    <tr>
                                        <td class="text-center">{{ $countitem++ }}</td>
                                        <td class="text-left">{{ $product_Q[$i]->product_name }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                        <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                        <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                        <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                    </tr>

                                    @endfor
                                    
                                    @for ($k = 0; $k < $row; $k++)
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    @endfor

                                    <tr>
                                        <td></td>
                                        <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-right">ภาษี 7 %</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-right">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row">

                                <div class="col-sm-10" style="font-size:14px">
                                    <p>
                                        การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ <br>
                                        1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ <br>
                                        2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} <br>
                                        3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย <br>
                                        4.ระยะเวลารับประกัน ............................-............................ <br>
                                        5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ<br>
                                        6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ<br><br>
                                    </p>
                                </div>

                                <div class="col-sm-1"></div>
                                <div class="col-sm-6"></div>

                                <div class="col-sm-6" style="font-size:14px">
                                    <p class="text-center">(ลงชื่อ).............................................................ผู้ซื้อ</p>
                                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                                    <p class="text-center">วันที่
                                        {{ formatDateThai($show->project_datein) }}
                                    </p>
                                    <br><br>
                                    <p class="text-center">(ลงชื่อ).............................................................ผู้ขาย</p>
                                    <p class="text-center">({{ $show->store_employee }})</p>
                                    <p class="text-center">วันที่
                                        {{ formatDateThai($show->project_datein) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                            
                    </div>

                </fieldset>
            </div>

            <div class="col-sm-3">
                <div class="container"><br>
                    <a href="{{ route('five.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="five_onepage-tab" data-toggle="pill" href="#five_onepage" role="tab" aria-controls="five_onepage" aria-selected="true">หน้าที่ 1</a>
                        <a class="nav-link" id="five_twopage-tab" data-toggle="pill" href="#five_twopage" role="tab" aria-controls="five_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="five_threepage-tab" data-toggle="pill" href="#five_threepage" role="tab" aria-controls="five_threepage" aria-selected="false">หน้าที่ 3</a>
                        <a class="nav-link" id="five_fourpage-tab" data-toggle="pill" href="#five_fourpage" role="tab" aria-controls="five_fourpage" aria-selected="false">หน้าที่ 4</a>


                    </div>
                    
                </div>
            </div>
        </div>

    @endif

</div>

    

    