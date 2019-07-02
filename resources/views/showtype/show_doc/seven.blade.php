@php
    $countitem=1;
@endphp

<div class="container" style="font-size:14px">

    @if ($count[0]->getCount <= 22 )

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="seven_coverpage" role="tabpanel" aria-labelledby="seven_coverpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="seven_onepage" role="tabpanel" aria-labelledby="seven_onepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                        </div>

                        <div class="tab-pane fade" id="seven_twopage" role="tabpanel" aria-labelledby="seven_twopage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div>

                                

                                </div>
                            </div>
                        </div>

                        {{-- <div class="tab-pane fade" id="seven_threepage" role="tabpanel" aria-labelledby="seven_threepage-tab">
                            ...
                        </div> --}}

                    </div>
                    
                </fieldset>
            </div>

            <div class="col-sm-3"><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="seven_coverpage-tab" data-toggle="pill" href="#seven_coverpage" role="tab" aria-controls="seven_coverpage" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_onepage-tab" data-toggle="pill" href="#seven_onepage" role="tab" aria-controls="seven_onepage" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_twopage-tab" data-toggle="pill" href="#seven_twopage" role="tab" aria-controls="seven_twopage" aria-selected="false">หน้าที่ 2</a>


                        
                    </div>
                    
                </div>

            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 23 && $count[0]->getCount <= 32)

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="seven_coverpage" role="tabpanel" aria-labelledby="seven_coverpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="seven_onepage" role="tabpanel" aria-labelledby="seven_onepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                        </div>

                        <div class="tab-pane fade" id="seven_twopage" role="tabpanel" aria-labelledby="seven_twopage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                            @for ($j = 22; $j < $count[0]->getCount ; $j++)

                                            @php
                                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                                $beforetax = ($total[0]->getTotal * 100)/107;
                                                $tax = $total[0]->getTotal - $beforetax;
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
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div>

                                

                                </div>
                            </div>
                        </div>

                        {{-- <div class="tab-pane fade" id="seven_threepage" role="tabpanel" aria-labelledby="seven_threepage-tab">
                            ...
                        </div> --}}

                    </div>
                    
                </fieldset>
            </div>

            <div class="col-sm-3"><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="seven_coverpage-tab" data-toggle="pill" href="#seven_coverpage" role="tab" aria-controls="seven_coverpage" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_onepage-tab" data-toggle="pill" href="#seven_onepage" role="tab" aria-controls="seven_onepage" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_twopage-tab" data-toggle="pill" href="#seven_twopage" role="tab" aria-controls="seven_twopage" aria-selected="false">หน้าที่ 2</a>


                        
                    </div>
                    
                </div>

            
            </div>
        </div>
    
    @elseif ($count[0]->getCount >= 33 && $count[0]->getCount <= 44)

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="seven_coverpage" role="tabpanel" aria-labelledby="seven_coverpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="seven_onepage" role="tabpanel" aria-labelledby="seven_onepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                        </div>

                        <div class="tab-pane fade" id="seven_twopage" role="tabpanel" aria-labelledby="seven_twopage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_threepage" role="tabpanel" aria-labelledby="seven_threepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                            {{-- @for ($j = 22; $j < 44 ; $j++) --}}

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
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div>

                                

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
                        <a class="nav-link" id="seven_coverpage-tab" data-toggle="pill" href="#seven_coverpage" role="tab" aria-controls="seven_coverpage" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_onepage-tab" data-toggle="pill" href="#seven_onepage" role="tab" aria-controls="seven_onepage" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_twopage-tab" data-toggle="pill" href="#seven_twopage" role="tab" aria-controls="seven_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="seven_threepage-tab" data-toggle="pill" href="#seven_threepage" role="tab" aria-controls="seven_threepage" aria-selected="false">หน้าที่ 3</a>



                        
                    </div>
                    
                </div>

            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 45 && $count[0]->getCount <= 56)

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="seven_coverpage" role="tabpanel" aria-labelledby="seven_coverpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="seven_onepage" role="tabpanel" aria-labelledby="seven_onepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                        </div>

                        <div class="tab-pane fade" id="seven_twopage" role="tabpanel" aria-labelledby="seven_twopage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_threepage" role="tabpanel" aria-labelledby="seven_threepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                                $row = 56 - $count[0]->getCount;
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
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div>

                                

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
                        <a class="nav-link" id="seven_coverpage-tab" data-toggle="pill" href="#seven_coverpage" role="tab" aria-controls="seven_coverpage" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_onepage-tab" data-toggle="pill" href="#seven_onepage" role="tab" aria-controls="seven_onepage" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_twopage-tab" data-toggle="pill" href="#seven_twopage" role="tab" aria-controls="seven_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="seven_threepage-tab" data-toggle="pill" href="#seven_threepage" role="tab" aria-controls="seven_threepage" aria-selected="false">หน้าที่ 3</a>



                        
                    </div>
                    
                </div>

            
            </div>
        </div>  

    @elseif ($count[0]->getCount >= 57 && $count[0]->getCount <= 66)

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="seven_coverpage" role="tabpanel" aria-labelledby="seven_coverpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="seven_onepage" role="tabpanel" aria-labelledby="seven_onepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                        </div>

                        <div class="tab-pane fade" id="seven_twopage" role="tabpanel" aria-labelledby="seven_twopage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_threepage" role="tabpanel" aria-labelledby="seven_threepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_fourpage" role="tabpanel" aria-labelledby="seven_fourpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div>

                                

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
                        <a class="nav-link" id="seven_coverpage-tab" data-toggle="pill" href="#seven_coverpage" role="tab" aria-controls="seven_coverpage" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_onepage-tab" data-toggle="pill" href="#seven_onepage" role="tab" aria-controls="seven_onepage" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_twopage-tab" data-toggle="pill" href="#seven_twopage" role="tab" aria-controls="seven_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="seven_threepage-tab" data-toggle="pill" href="#seven_threepage" role="tab" aria-controls="seven_threepage" aria-selected="false">หน้าที่ 3</a>
                        <a class="nav-link" id="seven_fourpage-tab" data-toggle="pill" href="#seven_fourpage" role="tab" aria-controls="seven_fourpage" aria-selected="false">หน้าที่ 4</a>




                        
                    </div>
                    
                </div>

            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 67 && $count[0]->getCount <= 78)

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="seven_coverpage" role="tabpanel" aria-labelledby="seven_coverpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="seven_onepage" role="tabpanel" aria-labelledby="seven_onepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                        </div>

                        <div class="tab-pane fade" id="seven_twopage" role="tabpanel" aria-labelledby="seven_twopage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_threepage" role="tabpanel" aria-labelledby="seven_threepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_fourpage" role="tabpanel" aria-labelledby="seven_fourpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div>

                                

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
                        <a class="nav-link" id="seven_coverpage-tab" data-toggle="pill" href="#seven_coverpage" role="tab" aria-controls="seven_coverpage" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_onepage-tab" data-toggle="pill" href="#seven_onepage" role="tab" aria-controls="seven_onepage" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_twopage-tab" data-toggle="pill" href="#seven_twopage" role="tab" aria-controls="seven_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="seven_threepage-tab" data-toggle="pill" href="#seven_threepage" role="tab" aria-controls="seven_threepage" aria-selected="false">หน้าที่ 3</a>
                        <a class="nav-link" id="seven_fourpage-tab" data-toggle="pill" href="#seven_fourpage" role="tab" aria-controls="seven_fourpage" aria-selected="false">หน้าที่ 4</a>




                        
                    </div>
                    
                </div>

            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 79 && $count[0]->getCount <= 88)

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="seven_coverpage" role="tabpanel" aria-labelledby="seven_coverpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="seven_onepage" role="tabpanel" aria-labelledby="seven_onepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                        </div>

                        <div class="tab-pane fade" id="seven_twopage" role="tabpanel" aria-labelledby="seven_twopage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_threepage" role="tabpanel" aria-labelledby="seven_threepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_fourpage" role="tabpanel" aria-labelledby="seven_fourpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_fivepage" role="tabpanel" aria-labelledby="seven_fivepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                            {{-- @for ($j = 22; $j < 44 ; $j++) --}}

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
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div>

                                

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
                        <a class="nav-link" id="seven_coverpage-tab" data-toggle="pill" href="#seven_coverpage" role="tab" aria-controls="seven_coverpage" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_onepage-tab" data-toggle="pill" href="#seven_onepage" role="tab" aria-controls="seven_onepage" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_twopage-tab" data-toggle="pill" href="#seven_twopage" role="tab" aria-controls="seven_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="seven_threepage-tab" data-toggle="pill" href="#seven_threepage" role="tab" aria-controls="seven_threepage" aria-selected="false">หน้าที่ 3</a>
                        <a class="nav-link" id="seven_fourpage-tab" data-toggle="pill" href="#seven_fourpage" role="tab" aria-controls="seven_fourpage" aria-selected="false">หน้าที่ 4</a>
                        <a class="nav-link" id="seven_fivepage-tab" data-toggle="pill" href="#seven_fivepage" role="tab" aria-controls="seven_fivepage" aria-selected="false">หน้าที่ 5</a>





                        
                    </div>
                    
                </div>

            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 89 && $count[0]->getCount <= 100)
        <div class="row">
            <div class="col-sm-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="seven_coverpage" role="tabpanel" aria-labelledby="seven_coverpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                    <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="seven_onepage" role="tabpanel" aria-labelledby="seven_onepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                        </div>

                        <div class="tab-pane fade" id="seven_twopage" role="tabpanel" aria-labelledby="seven_twopage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_threepage" role="tabpanel" aria-labelledby="seven_threepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_fourpage" role="tabpanel" aria-labelledby="seven_fourpage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                    {{-- <div class="row">
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div> --}}

                                

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven_fivepage" role="tabpanel" aria-labelledby="seven_fivepage-tab">
                            <div class="row">
                                <div class="col-sm-12">
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
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้เบิก</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">เห็นควรให้เบิกได้ตามจำนวน</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้สั่งจ่าย</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->manageschool_name }})</p>
                                            <p class="text-center" style="font-size:14px">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</p>




                                            
                                        </div>
                                        <div class="col-sm-6"><br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................ผู้รับของ</p>
                                            <p class="text-center" style="font-size:14px">{{ $show->teacher_get_name }}</p>
                                            <p class="text-center" style="font-size:14px">ตำแหน่ง {{ $show->teacher_rank }}</p>
                                            <p class="text-center" style="font-size:14px">ได้ลงรายการตรวจหักในบัญชีแล้ว</p>

                                            <br>
                                            <p class="text-center" style="font-size:14px">ลงชื่อ................................................เจ้าหน้าที่</p>
                                            <p class="text-center" style="font-size:14px">({{ $show->parcel_name }})</p>




                                        </div>
                                    </div>

                                

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
                        <a class="nav-link" id="seven_coverpage-tab" data-toggle="pill" href="#seven_coverpage" role="tab" aria-controls="seven_coverpage" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_onepage-tab" data-toggle="pill" href="#seven_onepage" role="tab" aria-controls="seven_onepage" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_twopage-tab" data-toggle="pill" href="#seven_twopage" role="tab" aria-controls="seven_twopage" aria-selected="false">หน้าที่ 2</a>
                        <a class="nav-link" id="seven_threepage-tab" data-toggle="pill" href="#seven_threepage" role="tab" aria-controls="seven_threepage" aria-selected="false">หน้าที่ 3</a>
                        <a class="nav-link" id="seven_fourpage-tab" data-toggle="pill" href="#seven_fourpage" role="tab" aria-controls="seven_fourpage" aria-selected="false">หน้าที่ 4</a>
                        <a class="nav-link" id="seven_fivepage-tab" data-toggle="pill" href="#seven_fivepage" role="tab" aria-controls="seven_fivepage" aria-selected="false">หน้าที่ 5</a>





                        
                    </div>
                    
                </div>

            
            </div>
        </div>
    @endif
</div>
    