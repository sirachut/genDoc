<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2.รายละเอียดแนบท้าย</title>
    @include('layouts.style')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
        
        p.main{
            margin: 6px;
            text-indent: 2.5em;
        }
    </style>
</head>

<body>
    @php
        $countitem=1;
    @endphp

    <div class="container">

        @if ($count[0]->getCount < 30)
    
            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>
                
                    <table class="table table-bordered table-sm" style="font-size:16px;">
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
                    <br><br>
                    <div class="row col-sm-12">
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcel_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                        </div>
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcelLeader_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                        </div>

                    </div>

                </div>
            </div>
    
        @elseif ($count[0]->getCount >= 30 && $count[0]->getCount <= 32)
 
            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                    </table><br><br>

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

            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                    </table><br><br>

                    <div class="row col-sm-12">
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcel_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                        </div>
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcelLeader_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                        </div>

                    </div>
                </div>
            </div>
    
        @elseif ($count[0]->getCount > 32 && $count[0]->getCount <= 61 )
    
            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                    </table><br><br>

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

            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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

                    
                        
                        @for ($j = 32; $j < $count[0]->getCount ; $j++)

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
                    </table><br><br>

                    <div class="row col-sm-12">
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcel_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                        </div>
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcelLeader_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                        </div>

                    </div>
                </div>
            </div>

        @elseif ($count[0]->getCount > 61 && $count[0]->getCount <= 64)
    
            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                    </table><br><br>

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

            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                    </table><br><br>

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

            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                    </table><br><br>

                    <div class="row col-sm-12">
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcel_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                        </div>
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcelLeader_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                        </div>

                    </div>
                </div>
            </div>
    
        @elseif ($count[0]->getCount > 64)
        
            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                    </table><br><br>

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

            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                    </table><br><br>

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

            <div class="row">
                <div class="col-sm-12"><br>
                    <p style="text-align:center">บัญชีรายละเอียดบันทึกข้อความที่ {{ $show->project_number }} ลงวันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p style="text-align:center">งานพัสดุ จำนวน {{ $count[0]->getCount }} รายการ กลุ่มสาระ {{ $show->project_subject }}</p>
                    <p style="text-align:center">โรงเรียนบ้านเทอดไทย</p>

                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..............................................................เจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcel_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                        </div>
                        <div class="col-sm-6"><br>
                            <p class="text-center">(ลงชื่อ)..................................................หัวหน้าเจ้าหน้าที่</p>
                            <p class="text-center">{{ $show->parcelLeader_name }}</p>
                            <p class="text-center">วันที่ {{ formatDateThai($show->project_datein) }}</p>

                        </div>

                    </div>
                </div>
            </div>
            
        @endif
    
    </div>

</body>
</html>