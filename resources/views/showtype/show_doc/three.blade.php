@php
    $countitem=1;
@endphp

<div class="container" style="font-size:14px">

@if ($count[0]->getCount < 30)

    <div class="row">
        <div class="col-sm-9">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><h4>รายการสินค้า</h4></legend>
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane show active" id="three_onepage" role="tabpanel" aria-labelledby="three_onepage-tab">

                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                            @foreach ($product_Q as $item)
                            @php
                                $getsum = $item->product_price * $item->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 29 - $count[0]->getCount;
                            @endphp

                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $item->product_name }}</td>
                                    <td class="text-center">{{ $item->product_amount }}</td>
                                    <td class="text-center">{{ $item->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($item->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($item->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                </tr>

                            @endforeach

                            @for ($i = 0; $i < $row; $i++)
                                <tr>
                                    <td>&nbsp;</td>
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">ภาษี 7%</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>

                    </div>
                    {{-- <div class="tab-pane fade" id="three_twopage" role="tabpanel" aria-labelledby="three_twopage-tab">
                        ...
                    </div> --}}

                </div>

            </fieldset>
        </div>

        <div class="col-sm-3"><br>
            <div class="card sticky" style="padding:10px"> 
                <h6>เลือกดูข้อมูล</h6>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="three_onepage-tab" data-toggle="pill" href="#three_onepage" role="tab" aria-controls="three_onepage" aria-selected="true">หน้าที่ 1</a>
                    {{-- <a class="nav-link" id="three_twopage-tab" data-toggle="pill" href="#three_twopage" role="tab" aria-controls="three_twopage" aria-selected="false">หน้าที่ 2</a> --}}

                    
                </div>
                
            </div>

        
        </div>
    </div>

@elseif ($count[0]->getCount >= 30 && $count[0]->getCount <= 32)

    <div class="row">
        <div class="col-sm-9">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><h4>รายการสินค้า</h4></legend>
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane show active" id="three_onepage" role="tabpanel" aria-labelledby="three_onepage-tab">

                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                            @foreach ($product_Q as $item)
                            @php
                                $getsum = $item->product_price * $item->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 32 - $count[0]->getCount;
                            @endphp

                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $item->product_name }}</td>
                                    <td class="text-center">{{ $item->product_amount }}</td>
                                    <td class="text-center">{{ $item->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($item->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($item->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                </tr>

                            @endforeach

                            @for ($i = 0; $i < $row; $i++)
                                <tr>
                                    <td>&nbsp;</td>
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

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="three_twopage" role="tabpanel" aria-labelledby="three_twopage-tab">
                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                            @php
                                $getsum = $item->product_price * $item->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 29;
                            @endphp

                            @for ($i = 0; $i < $row; $i++)
                                <tr>
                                    <td>&nbsp;</td>
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">ภาษี 7%</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>
                    </div>

                </div>

            </fieldset>
        </div>

        <div class="col-sm-3"><br>
            <div class="card sticky" style="padding:10px"> 
                <h6>เลือกดูข้อมูล</h6>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="three_onepage-tab" data-toggle="pill" href="#three_onepage" role="tab" aria-controls="three_onepage" aria-selected="true">หน้าที่ 1</a>
                    <a class="nav-link" id="three_twopage-tab" data-toggle="pill" href="#three_twopage" role="tab" aria-controls="three_twopage" aria-selected="false">หน้าที่ 2</a>

                    
                </div>
                
            </div>

        
        </div>
    </div>

@elseif ($count[0]->getCount > 32 && $count[0]->getCount <= 61 )

    <div class="row">
        <div class="col-sm-9">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><h4>รายการสินค้า</h4></legend>
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane show active" id="three_onepage" role="tabpanel" aria-labelledby="three_onepage-tab">

                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            @for ($i = 0; $i < 32; $i++)

                            @php
                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                
                            @endphp

                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $product_Q[$i]->product_name }}</td>
                                    <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                    <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                </tr>
                            @endfor
                            
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="three_twopage" role="tabpanel" aria-labelledby="three_twopage-tab">
                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                            
                            @for ($j = 32; $j < 61 ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 61 - $count[0]->getCount;
                            @endphp
                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $product_Q[$j]->product_name }}</td>
                                    <td class="text-center">{{ $product_Q[$j]->product_amount }}</td>
                                    <td class="text-center">{{ $product_Q[$j]->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
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
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">ภาษี 7%</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>
                    </div>

                </div>

            </fieldset>
        </div>

        <div class="col-sm-3"><br>
            <div class="card sticky" style="padding:10px"> 
                <h6>เลือกดูข้อมูล</h6>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="three_onepage-tab" data-toggle="pill" href="#three_onepage" role="tab" aria-controls="three_onepage" aria-selected="true">หน้าที่ 1</a>
                    <a class="nav-link" id="three_twopage-tab" data-toggle="pill" href="#three_twopage" role="tab" aria-controls="three_twopage" aria-selected="false">หน้าที่ 2</a>

                    
                </div>
                
            </div>

        
        </div>
    </div>

@elseif ($count[0]->getCount > 61 && $count[0]->getCount <= 64)

    <div class="row">
        <div class="col-sm-9">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><h4>รายการสินค้า</h4></legend>
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane show active" id="three_onepage" role="tabpanel" aria-labelledby="three_onepage-tab">

                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                            @for ($i = 0; $i < 32; $i++)

                            @php
                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                    
                            @endphp

                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $product_Q[$i]->product_name }}</td>
                                    <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                    <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                </tr>
                            @endfor
                            
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="three_twopage" role="tabpanel" aria-labelledby="three_twopage-tab">
                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                            
                            @for ($j = 33; $j < 64 ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 64 - $count[0]->getCount;
                            @endphp
                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $product_Q[$j]->product_name }}</td>
                                    <td class="text-center">{{ $product_Q[$j]->product_amount }}</td>
                                    <td class="text-center">{{ $product_Q[$j]->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
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
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                               
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="three_threepage" role="tabpanel" aria-labelledby="three_threepage-tab">
                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 29;
                            @endphp
                                

                            @for ($k = 0; $k < $row; $k++)
                                <tr>
                                    <td>&nbsp;</td>
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">ภาษี 7%</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>
                    </div>

                </div>

            </fieldset>
        </div>

        <div class="col-sm-3"><br>
            <div class="card sticky" style="padding:10px"> 
                <h6>เลือกดูข้อมูล</h6>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="three_onepage-tab" data-toggle="pill" href="#three_onepage" role="tab" aria-controls="three_onepage" aria-selected="true">หน้าที่ 1</a>
                    <a class="nav-link" id="three_twopage-tab" data-toggle="pill" href="#three_twopage" role="tab" aria-controls="three_twopage" aria-selected="false">หน้าที่ 2</a>
                    <a class="nav-link" id="three_threepage-tab" data-toggle="pill" href="#three_threepage" role="tab" aria-controls="three_threepage" aria-selected="false">หน้าที่ 3</a>


                    
                </div>
                
            </div>

        
        </div>
    </div>

@elseif ($count[0]->getCount > 64)   

    <div class="row">
        <div class="col-sm-9">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><h4>รายการสินค้า</h4></legend>
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane show active" id="three_onepage" role="tabpanel" aria-labelledby="three_onepage-tab">

                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                                    
                                

                        
                            
                            @for ($i = 0; $i < 32; $i++)

                            @php
                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 32 - $count[0]->getCount;
                            @endphp

                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $product_Q[$i]->product_name }}</td>
                                    <td class="text-center">{{ $product_Q[$i]->product_amount }}</td>
                                    <td class="text-center">{{ $product_Q[$i]->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($product_Q[$i]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                </tr>
                            @endfor
                            

                            {{-- @for ($i = 0; $i < $row; $i++)
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor --}}
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="three_twopage" role="tabpanel" aria-labelledby="three_twopage-tab">
                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                            
                            @for ($j = 32; $j < 64 ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                            @endphp
                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $product_Q[$j]->product_name }}</td>
                                    <td class="text-center">{{ $product_Q[$j]->product_amount }}</td>
                                    <td class="text-center">{{ $product_Q[$j]->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
                                </tr>
                            @endfor

                            
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="three_threepage" role="tabpanel" aria-labelledby="three_threepage-tab">
                        <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                        <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                        <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                        <table class="table table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                                    <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                                    <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                                    <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                                    <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                                    <th class="text-center align-middle" width=7.5%>หน่วย</th>
                                    <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                                    <th class="text-center align-middle" width=10%>หน่วยละ</th>
                                    <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
                                </tr>
                            </thead>
                            <tbody>
    
                            @for ($j = 64; $j < $count[0]->getCount ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 93 - $count[0]->getCount;
                            @endphp
                                <tr>
                                    <td class="text-center">{{ $countitem++ }}</td>
                                    <td class="text-left align-middle">{{ $product_Q[$j]->product_name }}</td>
                                    <td class="text-center">{{ $product_Q[$j]->product_amount }}</td>
                                    <td class="text-center">{{ $product_Q[$j]->product_unitname }}</td>
                                    <td class="text-right">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                    <td class="text-right">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
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
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมราคาสินค้าและบริการ</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">ภาษี 7%</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($tax, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                                    <td></td>
                                    <td class="text-right">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcel_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                                <p class="text-center">{{ $show->parcelLeader_name }}</p>
                                <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                            </div>

                        </div>
                    </div>

                </div>

            </fieldset>
        </div>

        <div class="col-sm-3"><br>
            <div class="card sticky" style="padding:10px"> 
                <h6>เลือกดูข้อมูล</h6>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="three_onepage-tab" data-toggle="pill" href="#three_onepage" role="tab" aria-controls="three_onepage" aria-selected="true">หน้าที่ 1</a>
                    <a class="nav-link" id="three_twopage-tab" data-toggle="pill" href="#three_twopage" role="tab" aria-controls="three_twopage" aria-selected="false">หน้าที่ 2</a>
                    <a class="nav-link" id="three_threepage-tab" data-toggle="pill" href="#three_threepage" role="tab" aria-controls="three_threepage" aria-selected="false">หน้าที่ 3</a>


                    
                </div>
                
            </div>

        
        </div>
    </div>

@endif

</div>
