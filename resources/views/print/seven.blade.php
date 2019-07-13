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
            text-indent: 2.5em;

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

    @if ($count[0]->getCount <= 22 )
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:28px;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br><br><br><br><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j = 0; $j < $count[0]->getCount ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 22 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 10;
                            @endphp
                            {{-- <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr> --}}

                            {{-- @endfor --}}

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                        <div class="col-sm-6" style="font-size:16px"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้เบิก</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >เห็นควรให้เบิกได้ตามจำนวน</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้สั่งจ่าย</p>
                            <p class="text-center" >({{ $show->manageschool_name }})</p>
                            <p class="text-center" >ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                            
                        </div>
                        <div class="col-sm-6" style="font-size:16px;"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้รับของ</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................เจ้าหน้าที่</p>
                            <p class="text-center" >({{ $show->parcel_name }})</p>




                        </div>
                    </div>

                

                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 23 && $count[0]->getCount <= 32)
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:28px;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br><br><br><br><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            @for ($j = 0; $j < 22 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 22 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            @for ($j = 22; $j < $count[0]->getCount ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 10;
                                $row = 32 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                        <div class="col-sm-6" style="font-size:16px"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้เบิก</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >เห็นควรให้เบิกได้ตามจำนวน</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้สั่งจ่าย</p>
                            <p class="text-center" >({{ $show->manageschool_name }})</p>
                            <p class="text-center" >ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                            
                        </div>
                        <div class="col-sm-6" style="font-size:16px;"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้รับของ</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................เจ้าหน้าที่</p>
                            <p class="text-center" >({{ $show->parcel_name }})</p>




                        </div>
                    </div>

                

                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 33 && $count[0]->getCount <= 44)
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:28px;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br><br><br><br><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            @for ($j = 0; $j < 22 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 22 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 22; $j < $count[0]->getCount ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 44 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 12;
                                
                            @endphp
                            {{-- <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr> --}}

                            {{-- @endfor --}}

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                        <div class="col-sm-6" style="font-size:16px"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้เบิก</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >เห็นควรให้เบิกได้ตามจำนวน</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้สั่งจ่าย</p>
                            <p class="text-center" >({{ $show->manageschool_name }})</p>
                            <p class="text-center" >ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                            
                        </div>
                        <div class="col-sm-6" style="font-size:16px;"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้รับของ</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................เจ้าหน้าที่</p>
                            <p class="text-center" >({{ $show->parcel_name }})</p>




                        </div>
                    </div>

                

                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 45 && $count[0]->getCount <= 56)
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:28px;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br><br><br><br><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            @for ($j = 0; $j < 22 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 22 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 22; $j < 44 ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 44 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>

                            @for ($j = 44; $j < $count[0]->getCount ; $j++)
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 10;
                                $row = 54 - $count[0]->getCount;
                                
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                        <div class="col-sm-6" style="font-size:16px"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้เบิก</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >เห็นควรให้เบิกได้ตามจำนวน</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้สั่งจ่าย</p>
                            <p class="text-center" >({{ $show->manageschool_name }})</p>
                            <p class="text-center" >ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                            
                        </div>
                        <div class="col-sm-6" style="font-size:16px;"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้รับของ</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................เจ้าหน้าที่</p>
                            <p class="text-center" >({{ $show->parcel_name }})</p>




                        </div>
                    </div>

                

                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 57 && $count[0]->getCount <= 66)
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:28px;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br><br><br><br><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            @for ($j = 0; $j < 22 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 22 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 22; $j < 44 ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 44 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 44; $j < $count[0]->getCount ; $j++)
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 66 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @for ($j = 44; $j < $count[0]->getCount ; $j++) --}}
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 12;
                                // $row = 54 - $count[0]->getCount;
                                
                            @endphp
                            {{-- <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr> --}}

                            {{-- @endfor --}}

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                        <div class="col-sm-6" style="font-size:16px"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้เบิก</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >เห็นควรให้เบิกได้ตามจำนวน</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้สั่งจ่าย</p>
                            <p class="text-center" >({{ $show->manageschool_name }})</p>
                            <p class="text-center" >ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                            
                        </div>
                        <div class="col-sm-6" style="font-size:16px;"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้รับของ</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................เจ้าหน้าที่</p>
                            <p class="text-center" >({{ $show->parcel_name }})</p>




                        </div>
                    </div>

                

                </div>
            </div>
        </div>

    @elseif ($count[0]->getCount >= 67 && $count[0]->getCount <= 78)
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:28px;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br><br><br><br><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            @for ($j = 0; $j < 22 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 22 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 22; $j < 44 ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 44 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 44; $j < 66 ; $j++)
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 66 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>

                            @for ($j = 66; $j < $count[0]->getCount ; $j++)
                            
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 78 - $count[0]->getCount;
                                
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                        <div class="col-sm-6" style="font-size:16px"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้เบิก</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >เห็นควรให้เบิกได้ตามจำนวน</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้สั่งจ่าย</p>
                            <p class="text-center" >({{ $show->manageschool_name }})</p>
                            <p class="text-center" >ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                            
                        </div>
                        <div class="col-sm-6" style="font-size:16px;"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้รับของ</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................เจ้าหน้าที่</p>
                            <p class="text-center" >({{ $show->parcel_name }})</p>




                        </div>
                    </div>

                

                </div>
            </div>
        </div>
    @elseif ($count[0]->getCount >= 79 && $count[0]->getCount <= 88)
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:28px;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br><br><br><br><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            @for ($j = 0; $j < 22 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 22 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 22; $j < 44 ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 44 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 44; $j < 66 ; $j++)
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 66 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 66; $j < $count[0]->getCount ; $j++)
                            
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 88 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @for ($j = 66; $j < $count[0]->getCount ; $j++) --}}
                            
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 78 - $count[0]->getCount;
                                $row = 12;
                                
                            @endphp
                            {{-- <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr> --}}

                            {{-- @endfor --}}

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                        <div class="col-sm-6" style="font-size:16px"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้เบิก</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >เห็นควรให้เบิกได้ตามจำนวน</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้สั่งจ่าย</p>
                            <p class="text-center" >({{ $show->manageschool_name }})</p>
                            <p class="text-center" >ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                            
                        </div>
                        <div class="col-sm-6" style="font-size:16px;"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้รับของ</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................เจ้าหน้าที่</p>
                            <p class="text-center" >({{ $show->parcel_name }})</p>




                        </div>
                    </div>

                

                </div>
            </div>
        </div>
    
    @elseif ($count[0]->getCount >= 89 && $count[0]->getCount <= 100)
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:28px;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br><br><br><br><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @for ($j = 0; $j < $count[0]->getCount ; $j++) --}}
                            @for ($j = 0; $j < 22 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 22 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 22; $j < 44 ; $j++)

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 44 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 44; $j < 66 ; $j++)
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 66 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size:16px;"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm" style="font-size:16px;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($j = 66; $j < 88 ; $j++)
                            
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                // $row = 88 - $count[0]->getCount;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            {{-- @for ($k = 0; $k < $row; $k++)
                            <tr>
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
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><br><br><br>
                    <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                    <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                    <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                    <p class="text-center">วันที่ {{ formatDateThai($show->project_dateget) }} </p> <br>
                    <p class="text-left">ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้</p>
                </div>
                
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                <th class="text-center align-middle" rowspan="2" width=55%>รายการ</th>
                                <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                <th class="text-center align-middle" rowspan="2" width=10%>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                <th class="text-center align-middle" width=15%>เบิกได้</th>
                            </tr>
                        </thead>
                        <tbody>

                            
                            @for ($j = 88; $j < $count[0]->getCount ; $j++)
                            

                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 100 - $count[0]->getCount;
                                
                            @endphp
                            <tr>
                                <td class="text-center">{{ $countitem++ }}</td>
                                <td class="text-left">{{ $product_Q[$j]->product_name }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-right">{{ $product_Q[$j]->product_amount }}&nbsp;{{ $product_Q[$j]->product_unitname }}</td>
                                <td class="text-center"></td>
                            </tr>

                            @endfor

                            @for ($k = 0; $k < $row; $k++)
                            <tr>
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
                        <div class="col-sm-6" style="font-size:16px"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้เบิก</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >เห็นควรให้เบิกได้ตามจำนวน</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้สั่งจ่าย</p>
                            <p class="text-center" >({{ $show->manageschool_name }})</p>
                            <p class="text-center" >ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                            
                        </div>
                        <div class="col-sm-6" style="font-size:16px;"><br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................ผู้รับของ</p>
                            <p class="text-center" >{{ $show->teacher_get_name }}</p>
                            <p class="text-center" >ตำแหน่ง {{ $show->teacher_rank }}</p><br><br>
                            <p class="text-center" >ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                            <br><br>
                            <p class="text-center" >ลงชื่อ.................................................................................เจ้าหน้าที่</p>
                            <p class="text-center" >({{ $show->parcel_name }})</p>




                        </div>
                    </div>

                

                </div>
            </div>
        </div>
    @endif



</body>
</html>