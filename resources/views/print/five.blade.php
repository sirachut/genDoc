<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.style')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
        
        p.margin{
            margin-top: 6px;
            margin-bottom: 6px;   
            /* text-indent: 2.5em;   */
        }
        p.indent{
            text-indent: 2.5em;
        }
        img.kud{
            position: absolute;
            max-width: 70px;
            width: auto;
        }
        p.padding{
            margin-top: 6px;
            margin-bottom: 6px;   
            padding-left: 2.5em; 
        }
    </style>
</head>

<body>

    @php
        $countitem=1;
        $ebits = ini_get('error_reporting');
        error_reporting($ebits ^ E_NOTICE);
    @endphp

    @if ($count[0]->getCount < 18)
    
        <div class="container"><br><br>
            <div class="row">

                <div class="col-sm-12 text-center">
                    <img width="auto" height="150px" src="{{ URL::to('/assets/img/five_show.JPG') }}" style="margin:20px;">
                </div>
                
                <div class="col-sm-12">
                    <p class="text-center"><b>ใบสั่งซื้อ</b></p>
                </div>

                <div class="col-sm-4">
                    <p class="margin">ผู้ขาย {{ $show->store_name }}</p>
                    <p class="margin">ที่อยู่ {{ $show->store_address }}</p>
                    <p class="margin">โทรศัพท์ {{ $show->store_tel }}</p>
                    <p class="margin">เลขประจำตัวผู้เสียภาษี {{ $show->store_employeeNumber }}</p>
                    <p class="margin">เลขที่บัญชีเงินฝากธนาคาร {{ $show->bank_number }}</p>
                    <p class="margin">ชื่อบัญชี {{ $show->bank_account }}</p>
                    <p class="margin">ธนาคาร {{ $show->bank_name }}</p>
                    <p class="margin">สาขา {{ $show->bank_branch }}</p>
                    <br>
                </div>
                
                <div class="col-sm-2"></div>

                <div class="col-sm-6">
                    <p class="margin">ใบสั่งซื้อ เลขที่ {{ $show->project_number }}</p>
                    <p class="margin">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p class="margin">โรงเรียนบ้านเทอดไทย</p>
                    <p class="margin">1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย</p>
                    <p class="margin">โทรศัพท์ 053-730264</p>
                </div>

                <div class="col-sm-12">
                    <p style=" text-indent: 50px; font-size:16px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                        {{ formatDateThai($show->project_datein) }}
                        ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                    </p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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

                        </tbody>
                    </table> 
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br>
        </div>

        <div class="container">
                
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                                <td class="text-right font-weight-bold">รวมราคาสินค้าและบริการ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ภาษี 7 %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($tax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">รวมเป็นเงินทั้งสิ้น</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12"><br>
                    <p class="margin font-weight-bold">การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ </p>
                    <p class="margin">1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ </p>
                    <p class="margin">2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} </p>
                    <p class="margin">3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย </p>
                    <p class="margin">4.ระยะเวลารับประกัน ............................-............................ </p>
                    <p class="margin">5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ</p>
                    <p class="margin">6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ</p><br><br><br><br><br>
                </div>
                
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p><br><br><br><br>
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 18 && $count[0]->getCount < 30)
        <div class="container"><br><br>
            <div class="row">

                <div class="col-sm-12 text-center">
                    <img width="auto" height="150px" src="{{ URL::to('/assets/img/five_show.JPG') }}" style="margin:20px;">
                </div>
                
                <div class="col-sm-12">
                    <p class="text-center"><b>ใบสั่งซื้อ</b></p>
                </div>

                <div class="col-sm-4">
                    <p class="margin">ผู้ขาย {{ $show->store_name }}</p>
                    <p class="margin">ที่อยู่ {{ $show->store_address }}</p>
                    <p class="margin">โทรศัพท์ {{ $show->store_tel }}</p>
                    <p class="margin">เลขประจำตัวผู้เสียภาษี {{ $show->store_employeeNumber }}</p>
                    <p class="margin">เลขที่บัญชีเงินฝากธนาคาร {{ $show->bank_number }}</p>
                    <p class="margin">ชื่อบัญชี {{ $show->bank_account }}</p>
                    <p class="margin">ธนาคาร {{ $show->bank_name }}</p>
                    <p class="margin">สาขา {{ $show->bank_branch }}</p>
                    <br>
                </div>
                
                <div class="col-sm-2"></div>

                <div class="col-sm-6">
                    <p class="margin">ใบสั่งซื้อ เลขที่ {{ $show->project_number }}</p>
                    <p class="margin">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p class="margin">โรงเรียนบ้านเทอดไทย</p>
                    <p class="margin">1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย</p>
                    <p class="margin">โทรศัพท์ 053-730264</p>
                </div>

                <div class="col-sm-12">
                    <p style=" text-indent: 50px; font-size:16px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                        {{ formatDateThai($show->project_datein) }}
                        ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                    </p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                            @for ($i = 0; $i < 17; $i++)
                            

                            @php
                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 17 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br>
        </div>

        <div class="container">
                
            <div class="row">
                <div class="col-sm-12"><br><br>
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                                    // $row = 12;
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
                                <td class="text-right font-weight-bold">รวมราคาสินค้าและบริการ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ภาษี 7 %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($tax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">รวมเป็นเงินทั้งสิ้น</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12"><br>
                    <p class="margin font-weight-bold">การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ </p>
                    <p class="margin">1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ </p>
                    <p class="margin">2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} </p>
                    <p class="margin">3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย </p>
                    <p class="margin">4.ระยะเวลารับประกัน ............................-............................ </p>
                    <p class="margin">5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ</p>
                    <p class="margin">6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ</p><br><br><br><br><br>
                </div>
                
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p><br><br><br><br>
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p>
                    
                </div>
            </div>
        </div>
    
    @elseif ($count[0]->getCount >= 30 && $count[0]->getCount < 51 )
        <div class="container"><br><br>
            <div class="row">

                <div class="col-sm-12 text-center">
                    <img width="auto" height="150px" src="{{ URL::to('/assets/img/five_show.JPG') }}" style="margin:20px;">
                </div>
                
                <div class="col-sm-12">
                    <p class="text-center"><b>ใบสั่งซื้อ</b></p>
                </div>

                <div class="col-sm-4">
                    <p class="margin">ผู้ขาย {{ $show->store_name }}</p>
                    <p class="margin">ที่อยู่ {{ $show->store_address }}</p>
                    <p class="margin">โทรศัพท์ {{ $show->store_tel }}</p>
                    <p class="margin">เลขประจำตัวผู้เสียภาษี {{ $show->store_employeeNumber }}</p>
                    <p class="margin">เลขที่บัญชีเงินฝากธนาคาร {{ $show->bank_number }}</p>
                    <p class="margin">ชื่อบัญชี {{ $show->bank_account }}</p>
                    <p class="margin">ธนาคาร {{ $show->bank_name }}</p>
                    <p class="margin">สาขา {{ $show->bank_branch }}</p>
                    <br>
                </div>
                
                <div class="col-sm-2"></div>

                <div class="col-sm-6">
                    <p class="margin">ใบสั่งซื้อ เลขที่ {{ $show->project_number }}</p>
                    <p class="margin">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p class="margin">โรงเรียนบ้านเทอดไทย</p>
                    <p class="margin">1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย</p>
                    <p class="margin">โทรศัพท์ 053-730264</p>
                </div>

                <div class="col-sm-12">
                    <p style=" text-indent: 50px; font-size:16px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                        {{ formatDateThai($show->project_datein) }}
                        ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                    </p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                            @for ($i = 0; $i < 17; $i++)
                            

                            @php
                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 17 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br>
        </div>

        <div class="container">  
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
                
            <div class="row">
                <div class="col-sm-12"><br><br>
                    <table class="table table-bordered table-sm" style="font-size:16px">
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

                            {{-- @for ($i = 17; $i < $count[0]->getCount; $i++) --}}
                            
                                @php
                                    $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 12;
                                    // $row = 29 - $count[0]->getCount;

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
                                <td class="text-right font-weight-bold">รวมราคาสินค้าและบริการ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ภาษี 7 %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($tax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">รวมเป็นเงินทั้งสิ้น</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12"><br>
                    <p class="margin font-weight-bold">การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ </p>
                    <p class="margin">1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ </p>
                    <p class="margin">2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} </p>
                    <p class="margin">3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย </p>
                    <p class="margin">4.ระยะเวลารับประกัน ............................-............................ </p>
                    <p class="margin">5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ</p>
                    <p class="margin">6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ</p><br><br><br><br><br>
                </div>
                
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p><br><br><br><br>
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 51 && $count[0]->getCount < 63 )
        <div class="container"><br><br>
            <div class="row">

                <div class="col-sm-12 text-center">
                    <img width="auto" height="150px" src="{{ URL::to('/assets/img/five_show.JPG') }}" style="margin:20px;">
                </div>
                
                <div class="col-sm-12">
                    <p class="text-center"><b>ใบสั่งซื้อ</b></p>
                </div>

                <div class="col-sm-4">
                    <p class="margin">ผู้ขาย {{ $show->store_name }}</p>
                    <p class="margin">ที่อยู่ {{ $show->store_address }}</p>
                    <p class="margin">โทรศัพท์ {{ $show->store_tel }}</p>
                    <p class="margin">เลขประจำตัวผู้เสียภาษี {{ $show->store_employeeNumber }}</p>
                    <p class="margin">เลขที่บัญชีเงินฝากธนาคาร {{ $show->bank_number }}</p>
                    <p class="margin">ชื่อบัญชี {{ $show->bank_account }}</p>
                    <p class="margin">ธนาคาร {{ $show->bank_name }}</p>
                    <p class="margin">สาขา {{ $show->bank_branch }}</p>
                    <br>
                </div>
                
                <div class="col-sm-2"></div>

                <div class="col-sm-6">
                    <p class="margin">ใบสั่งซื้อ เลขที่ {{ $show->project_number }}</p>
                    <p class="margin">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p class="margin">โรงเรียนบ้านเทอดไทย</p>
                    <p class="margin">1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย</p>
                    <p class="margin">โทรศัพท์ 053-730264</p>
                </div>

                <div class="col-sm-12">
                    <p style=" text-indent: 50px; font-size:16px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                        {{ formatDateThai($show->project_datein) }}
                        ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                    </p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                            @for ($i = 0; $i < 17; $i++)
                            

                            @php
                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 17 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                                // $row = 50 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
                
            <div class="row">
                <div class="col-sm-12"><br><br>
                    <table class="table table-bordered table-sm" style="font-size:16px">
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

                            @for ($i = 50; $i < $count[0]->getCount; $i++)
                            
                                @php
                                    $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    // $row = 12;
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
                                <td class="text-right font-weight-bold">รวมราคาสินค้าและบริการ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ภาษี 7 %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($tax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">รวมเป็นเงินทั้งสิ้น</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12"><br>
                    <p class="margin font-weight-bold">การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ </p>
                    <p class="margin">1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ </p>
                    <p class="margin">2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} </p>
                    <p class="margin">3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย </p>
                    <p class="margin">4.ระยะเวลารับประกัน ............................-............................ </p>
                    <p class="margin">5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ</p>
                    <p class="margin">6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ</p><br><br><br><br><br>
                </div>
                
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p><br><br><br><br>
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 63 && $count[0]->getCount < 83 )
        <div class="container"><br><br>
            <div class="row">

                <div class="col-sm-12 text-center">
                    <img width="auto" height="150px" src="{{ URL::to('/assets/img/five_show.JPG') }}" style="margin:20px;">
                </div>
                
                <div class="col-sm-12">
                    <p class="text-center"><b>ใบสั่งซื้อ</b></p>
                </div>

                <div class="col-sm-4">
                    <p class="margin">ผู้ขาย {{ $show->store_name }}</p>
                    <p class="margin">ที่อยู่ {{ $show->store_address }}</p>
                    <p class="margin">โทรศัพท์ {{ $show->store_tel }}</p>
                    <p class="margin">เลขประจำตัวผู้เสียภาษี {{ $show->store_employeeNumber }}</p>
                    <p class="margin">เลขที่บัญชีเงินฝากธนาคาร {{ $show->bank_number }}</p>
                    <p class="margin">ชื่อบัญชี {{ $show->bank_account }}</p>
                    <p class="margin">ธนาคาร {{ $show->bank_name }}</p>
                    <p class="margin">สาขา {{ $show->bank_branch }}</p>
                    <br>
                </div>
                
                <div class="col-sm-2"></div>

                <div class="col-sm-6">
                    <p class="margin">ใบสั่งซื้อ เลขที่ {{ $show->project_number }}</p>
                    <p class="margin">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p class="margin">โรงเรียนบ้านเทอดไทย</p>
                    <p class="margin">1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย</p>
                    <p class="margin">โทรศัพท์ 053-730264</p>
                </div>

                <div class="col-sm-12">
                    <p style=" text-indent: 50px; font-size:16px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                        {{ formatDateThai($show->project_datein) }}
                        ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                    </p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                            @for ($i = 0; $i < 17; $i++)
                            

                            @php
                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 17 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                                // $row = 50 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
                
            <div class="row">
                <div class="col-sm-12"><br><br>
                    <table class="table table-bordered table-sm" style="font-size:16px">
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

                            {{-- @for ($i = 50; $i < $count[0]->getCount; $i++) --}}
                            
                                @php
                                    $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 12;
                                    // $row = 62 - $count[0]->getCount;
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
                                <td class="text-right font-weight-bold">รวมราคาสินค้าและบริการ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ภาษี 7 %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($tax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">รวมเป็นเงินทั้งสิ้น</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12"><br>
                    <p class="margin font-weight-bold">การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ </p>
                    <p class="margin">1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ </p>
                    <p class="margin">2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} </p>
                    <p class="margin">3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย </p>
                    <p class="margin">4.ระยะเวลารับประกัน ............................-............................ </p>
                    <p class="margin">5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ</p>
                    <p class="margin">6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ</p><br><br><br><br><br>
                </div>
                
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p><br><br><br><br>
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p>
                    
                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 83 )
        <div class="container"><br><br>
            <div class="row">

                <div class="col-sm-12 text-center">
                    <img width="auto" height="150px" src="{{ URL::to('/assets/img/five_show.JPG') }}" style="margin:20px;">
                </div>
                
                <div class="col-sm-12">
                    <p class="text-center"><b>ใบสั่งซื้อ</b></p>
                </div>

                <div class="col-sm-4">
                    <p class="margin">ผู้ขาย {{ $show->store_name }}</p>
                    <p class="margin">ที่อยู่ {{ $show->store_address }}</p>
                    <p class="margin">โทรศัพท์ {{ $show->store_tel }}</p>
                    <p class="margin">เลขประจำตัวผู้เสียภาษี {{ $show->store_employeeNumber }}</p>
                    <p class="margin">เลขที่บัญชีเงินฝากธนาคาร {{ $show->bank_number }}</p>
                    <p class="margin">ชื่อบัญชี {{ $show->bank_account }}</p>
                    <p class="margin">ธนาคาร {{ $show->bank_name }}</p>
                    <p class="margin">สาขา {{ $show->bank_branch }}</p>
                    <br>
                </div>
                
                <div class="col-sm-2"></div>

                <div class="col-sm-6">
                    <p class="margin">ใบสั่งซื้อ เลขที่ {{ $show->project_number }}</p>
                    <p class="margin">วันที่ {{ formatDateThai($show->project_datein) }}</p>
                    <p class="margin">โรงเรียนบ้านเทอดไทย</p>
                    <p class="margin">1 หมู่ 1 ตำบลเทอดไทย อำเภอแม่ฟ้าหลวง จังหวัดเชียงราย</p>
                    <p class="margin">โทรศัพท์ 053-730264</p>
                </div>

                <div class="col-sm-12">
                    <p style=" text-indent: 50px; font-size:16px">ตามที่ {{ $show->store_name }} ได้เสนอราคา ตามใบราคาเลขที่ ลงวันที่  
                        {{ formatDateThai($show->project_datein) }}
                        ไว้ต่อโรงเรียนบ้านเทอดไทย ซึ่งได้รับราคาและข้อตกลงซื้อ ตามรายการดังต่อไปนี้
                    </p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                            @for ($i = 0; $i < 17; $i++)
                            

                            @php
                                $getsum = $product_Q[$i]->product_price * $product_Q[$i]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 17 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                                // $row = 50 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                                // $row = 82 - $count[0]->getCount;
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
                            
                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center" >(ลงชื่อ)................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                </div>
                <div class="col-sm-6"><br><br>
                    <p class="text-center">(ลงชื่อ)................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                </div> 
            </div>
            <br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
                
            <div class="row">
                <div class="col-sm-12"><br><br>
                    <table class="table table-bordered table-sm" style="font-size:16px">
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
                                <td class="text-right font-weight-bold">รวมราคาสินค้าและบริการ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($beforetax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ภาษี 7 %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($tax, 2, '.', ',' )}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">รวมเป็นเงินทั้งสิ้น</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ number_format($total[0]->getTotal, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">ตัวหนังสือ ({{ convert($total[0]->getTotal ) }})</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12"><br>
                    <p class="margin font-weight-bold">การสั่งซื้อ อยู่ภายใต้เงื่อนไขต่อไปนี้ </p>
                    <p class="margin">1.กำหนดส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันที่ผู้ขายได้รับใบสั่งซื้อ </p>
                    <p class="margin">2.ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} </p>
                    <p class="margin">3.สถานที่ส่งมอบ โรงเรียนบ้านเทอดไทย </p>
                    <p class="margin">4.ระยะเวลารับประกัน ............................-............................ </p>
                    <p class="margin">5.สงวนสิทธิ์ค่าปรับกรณีส่งมอบเกินกำหนด โดยคิดเป็นค่าปรับเป็นรายวันในอัตราวันละ 0.20 ของราคาสิ่งของที่ยังไม่ได้รับมอบ</p>
                    <p class="margin">6.โรงเรียนสงวนสิทธิ์ที่จะไม่รับมอบถ้าปรากฏว่าสินค้านั้นมีลักษณะไม่ตรงตามรายการที่ระบุไว้ในใบสั่งซื้อ</p><br><br><br><br><br>
                </div>
                
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ซื้อ</p>
                    <p class="text-center">({{ $show->parcelLeader_name }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p><br><br><br><br>
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p class="text-center">(ลงชื่อ)........................................................................ผู้ขาย</p>
                    <p class="text-center">({{ $show->store_employee }})</p>
                    <p class="text-center">วันที่
                        {{ formatDateThai($show->project_datein) }}
                    </p>
                    
                </div>
            </div>
        </div>
    @endif
        
  
</body>
</html>