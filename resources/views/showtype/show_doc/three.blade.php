<div class="container" style="font-size:14px">
    <div class="row">
        <div class="col-sm-9">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><h4>รายการสินค้า</h4></legend>

                @php
                    $countitem=1;
                @endphp

                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ 
                        @php
                            echo App\Http\Controllers\DocumentController::DateThai($show->project_datein); 
                        @endphp
                    </p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $countitem }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>
            

                    {{-- <style>
                       #test{
                            font-size: 12px;
                        }

                    </style> --}}

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
                            <p class="text-center">วันที่ 
                                @php
                                    echo App\Http\Controllers\DocumentController::DateThai($show->project_datein); 
                                @endphp
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcelLeader_name }}</p>
                            <p class="text-center">วันที่ 
                                @php
                                    echo App\Http\Controllers\DocumentController::DateThai($show->project_datein); 
                                @endphp
                            </p>

                        </div>

                    </div>

            </fieldset>
        </div>
    </div>
</div>
