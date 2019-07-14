@php
    $countitem = 1;
@endphp

<div class="container" style="font-size:14px">

    @if ($count[0]->getCount == 1)

        <div class="row">
            <div class="col-sm-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>บัญชีวัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane show active" id="eight_onepage" role="tabpanel" aria-labelledby="eight_onepage-tab">
                            @for ($j = 0; $j < $count[0]->getCount ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 10;
                            @endphp
                            
                                
                                <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                            
                                <div class="row form-inline">
                                    <div class="col-sm-12">
                                        <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">รหัส.........................................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างสูง........................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                    </div>
                                </div>
            
                                <table class="table table-bordered table-sm" style="font-size:12px">
                                    <thead>
                                        <tr> 
                                            <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                            <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                            <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                            <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" width=11.5%>รับ</th>
                                            <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>รับ</th>
                                            <th class="text-center align-middle" width=7%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                            <td class="text-center align-middle">{{ $show->project_number }}</td>
                                            <td></td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                            <td></td>
                                            <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td></td>
                                        </tr>
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
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
            
                                <br><hr>
            
                            @endfor
                        </div>

                    </div>
                </fieldset>
            </div>
    
            <div class="col-sm-2">
                <div><br>
                    <a href="{{ route('eight.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>
    
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="eight_onepage-tab" data-toggle="pill" href="#eight_onepage" role="tab" aria-controls="eight_onepage" aria-selected="true">รายการ 1</a>
                        {{-- <a class="nav-link" id="three_twopage-tab" data-toggle="pill" href="#three_twopage" role="tab" aria-controls="three_twopage" aria-selected="false">หน้าที่ 2</a> --}}
                        {{-- <a class="nav-link" id="three_threepage-tab" data-toggle="pill" href="#three_threepage" role="tab" aria-controls="three_threepage" aria-selected="false">หน้าที่ 3</a> --}}
                    </div>
                    
                </div>
    
            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 2 && $count[0]->getCount <= 20)

        <div class="row">
            <div class="col-sm-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>บัญชีวัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane show active" id="eight_onepage" role="tabpanel" aria-labelledby="eight_onepage-tab">
                            @for ($j = 0; $j < $count[0]->getCount ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 10;
                            @endphp
                            
                                
                                <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                            
                                <div class="row form-inline">
                                    <div class="col-sm-12">
                                        <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">รหัส.........................................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างสูง........................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                    </div>
                                </div>
            
                                <table class="table table-bordered table-sm" style="font-size:12px">
                                    <thead>
                                        <tr> 
                                            <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                            <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                            <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                            <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" width=11.5%>รับ</th>
                                            <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>รับ</th>
                                            <th class="text-center align-middle" width=7%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                            <td class="text-center align-middle">{{ $show->project_number }}</td>
                                            <td></td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                            <td></td>
                                            <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td></td>
                                        </tr>
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
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
            
                                <br><hr>
            
                            @endfor
                        </div>

                    </div>

                </fieldset>
            </div>
    
            <div class="col-sm-2">
                <div><br>
                    <a href="{{ route('eight.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>
    
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="eight_onepage-tab" data-toggle="pill" href="#eight_onepage" role="tab" aria-controls="eight_onepage" aria-selected="true">รายการ 1 - {{ $count[0]->getCount }}</a>
                        {{-- <a class="nav-link" id="three_twopage-tab" data-toggle="pill" href="#three_twopage" role="tab" aria-controls="three_twopage" aria-selected="false">หน้าที่ 2</a> --}}
                        {{-- <a class="nav-link" id="three_threepage-tab" data-toggle="pill" href="#three_threepage" role="tab" aria-controls="three_threepage" aria-selected="false">หน้าที่ 3</a> --}}
                    </div>
                    
                </div>
    
            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 21 && $count[0]->getCount <= 40)

        <div class="row">
            <div class="col-sm-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>บัญชีวัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane show active" id="eight_onepage" role="tabpanel" aria-labelledby="eight_onepage-tab">
                            @for ($j = 0; $j < 20 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 10;
                            @endphp
                            
                                
                                <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                            
                                <div class="row form-inline">
                                    <div class="col-sm-12">
                                        <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">รหัส.........................................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างสูง........................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                    </div>
                                </div>
            
                                <table class="table table-bordered table-sm" style="font-size:12px">
                                    <thead>
                                        <tr> 
                                            <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                            <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                            <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                            <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" width=11.5%>รับ</th>
                                            <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>รับ</th>
                                            <th class="text-center align-middle" width=7%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                            <td class="text-center align-middle">{{ $show->project_number }}</td>
                                            <td></td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                            <td></td>
                                            <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td></td>
                                        </tr>
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
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
            
                                <br><hr>
            
                            @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_twopage" role="tabpanel" aria-labelledby="eight_twopage-tab">
                                @for ($j = 20; $j < $count[0]->getCount ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                    </div>

                </fieldset>
            </div>
    
            <div class="col-sm-2">
                <div><br>
                    <a href="{{ route('eight.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>
    
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="eight_onepage-tab" data-toggle="pill" href="#eight_onepage" role="tab" aria-controls="eight_onepage" aria-selected="true">รายการ 1 - 20</a>
                        <a class="nav-link" id="eight_twopage-tab" data-toggle="pill" href="#eight_twopage" role="tab" aria-controls="eight_twopage" aria-selected="false">รายการ 21 - {{ $count[0]->getCount }}</a>
                        {{-- <a class="nav-link" id="three_threepage-tab" data-toggle="pill" href="#three_threepage" role="tab" aria-controls="three_threepage" aria-selected="false">หน้าที่ 3</a> --}}
                    </div>
                    
                </div>
    
            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 41 && $count[0]->getCount <= 60)

        <div class="row">
            <div class="col-sm-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>บัญชีวัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane show active" id="eight_onepage" role="tabpanel" aria-labelledby="eight_onepage-tab">
                            @for ($j = 0; $j < 20 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 10;
                            @endphp
                            
                                
                                <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                            
                                <div class="row form-inline">
                                    <div class="col-sm-12">
                                        <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">รหัส.........................................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างสูง........................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                    </div>
                                </div>
            
                                <table class="table table-bordered table-sm" style="font-size:12px">
                                    <thead>
                                        <tr> 
                                            <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                            <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                            <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                            <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" width=11.5%>รับ</th>
                                            <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>รับ</th>
                                            <th class="text-center align-middle" width=7%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                            <td class="text-center align-middle">{{ $show->project_number }}</td>
                                            <td></td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                            <td></td>
                                            <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td></td>
                                        </tr>
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
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
            
                                <br><hr>
            
                            @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_twopage" role="tabpanel" aria-labelledby="eight_twopage-tab">
                                @for ($j = 20; $j < 40 ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_threepage" role="tabpanel" aria-labelledby="eight_threepage-tab">
                                @for ($j = 40; $j < $count[0]->getCount ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                    </div>

                </fieldset>
            </div>
    
            <div class="col-sm-2">
                <div><br>
                    <a href="{{ route('eight.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>
    
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="eight_onepage-tab" data-toggle="pill" href="#eight_onepage" role="tab" aria-controls="eight_onepage" aria-selected="true">รายการ 1 - 20</a>
                        <a class="nav-link" id="eight_twopage-tab" data-toggle="pill" href="#eight_twopage" role="tab" aria-controls="eight_twopage" aria-selected="false">รายการ 21 - 40</a>
                        <a class="nav-link" id="eight_threepage-tab" data-toggle="pill" href="#eight_threepage" role="tab" aria-controls="eight_threepage" aria-selected="false">รายการ 41 - {{ $count[0]->getCount }}</a>
                    </div>
                    
                </div>
    
            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 61 && $count[0]->getCount <= 80)
        
        <div class="row">
            <div class="col-sm-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>บัญชีวัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane show active" id="eight_onepage" role="tabpanel" aria-labelledby="eight_onepage-tab">
                            @for ($j = 0; $j < 20 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 10;
                            @endphp
                            
                                
                                <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                            
                                <div class="row form-inline">
                                    <div class="col-sm-12">
                                        <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">รหัส.........................................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างสูง........................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                    </div>
                                </div>
            
                                <table class="table table-bordered table-sm" style="font-size:12px">
                                    <thead>
                                        <tr> 
                                            <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                            <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                            <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                            <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" width=11.5%>รับ</th>
                                            <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>รับ</th>
                                            <th class="text-center align-middle" width=7%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                            <td class="text-center align-middle">{{ $show->project_number }}</td>
                                            <td></td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                            <td></td>
                                            <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td></td>
                                        </tr>
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
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
            
                                <br><hr>
            
                            @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_twopage" role="tabpanel" aria-labelledby="eight_twopage-tab">
                                @for ($j = 20; $j < 40 ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_threepage" role="tabpanel" aria-labelledby="eight_threepage-tab">
                                @for ($j = 40; $j < 60 ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_fourpage" role="tabpanel" aria-labelledby="eight_fourpage-tab">
                                @for ($j = 60; $j < $count[0]->getCount ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                    </div>

                </fieldset>
            </div>
    
            <div class="col-sm-2">
                <div><br>
                    <a href="{{ route('eight.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>
    
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="eight_onepage-tab" data-toggle="pill" href="#eight_onepage" role="tab" aria-controls="eight_onepage" aria-selected="true">รายการ 1 - 20</a>
                        <a class="nav-link" id="eight_twopage-tab" data-toggle="pill" href="#eight_twopage" role="tab" aria-controls="eight_twopage" aria-selected="false">รายการ 21 - 40</a>
                        <a class="nav-link" id="eight_threepage-tab" data-toggle="pill" href="#eight_threepage" role="tab" aria-controls="eight_threepage" aria-selected="false">รายการ 41 - 60</a>
                        <a class="nav-link" id="eight_fourpage-tab" data-toggle="pill" href="#eight_fourpage" role="tab" aria-controls="eight_fourpage" aria-selected="false">รายการ 61 - {{ $count[0]->getCount }}</a>

                    </div>
                    
                </div>
    
            
            </div>
        </div>

    @elseif ($count[0]->getCount >= 81 && $count[0]->getCount <= 100)
        <div class="row">
            <div class="col-sm-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>บัญชีวัสดุ</h4></legend>

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane show active" id="eight_onepage" role="tabpanel" aria-labelledby="eight_onepage-tab">
                            @for ($j = 0; $j < 20 ; $j++)
                            @php
                                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                $beforetax = ($total[0]->getTotal * 100)/107;
                                $tax = $total[0]->getTotal - $beforetax;
                                $row = 10;
                            @endphp
                            
                                
                                <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                            
                                <div class="row form-inline">
                                    <div class="col-sm-12">
                                        <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">รหัส.........................................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างสูง........................................</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                    </div>
                                </div>
            
                                <table class="table table-bordered table-sm" style="font-size:12px">
                                    <thead>
                                        <tr> 
                                            <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                            <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                            <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                            <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                            <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" width=11.5%>รับ</th>
                                            <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>รับ</th>
                                            <th class="text-center align-middle" width=7%>จ่าย</th>
                                            <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                            <td class="text-center align-middle">{{ $show->project_number }}</td>
                                            <td></td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                            <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                            <td></td>
                                            <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                            <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                            <td class="text-right align-middle">0</td>
                                            <td></td>
                                        </tr>
                                        @for ($k = 0; $k < $row; $k++)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
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
            
                                <br><hr>
            
                            @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_twopage" role="tabpanel" aria-labelledby="eight_twopage-tab">
                                @for ($j = 20; $j < 40 ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_threepage" role="tabpanel" aria-labelledby="eight_threepage-tab">
                                @for ($j = 40; $j < 60 ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_fourpage" role="tabpanel" aria-labelledby="eight_fourpage-tab">
                                @for ($j = 60; $j < 80 ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                        <div class="tab-pane fade" id="eight_fivepage" role="tabpanel" aria-labelledby="eight_fivepage-tab">
                                @for ($j = 80; $j < $count[0]->getCount ; $j++)
                                @php
                                    $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                                    $beforetax = ($total[0]->getTotal * 100)/107;
                                    $tax = $total[0]->getTotal - $beforetax;
                                    $row = 10;
                                @endphp
                                
                                    
                                    <br><p style="text-align:center;"><b>บัญชีวัสดุ</b></p>
                                
                                    <div class="row form-inline">
                                        <div class="col-sm-12">
                                            <p class="text-right">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">แผ่นที่ {{ $countitem++ }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-right">หน่วยงาน สพป.ชร.เขต 3</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">รหัส.........................................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">ขนาดหรือลักษณะ.......................................................................................</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างสูง........................................</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="text-left">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-left">จำนวนอย่างต่ำ........................................</p>
                                        </div>
                                    </div>
                
                                    <table class="table table-bordered table-sm" style="font-size:12px">
                                        <thead>
                                            <tr> 
                                                <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                                                <th class="text-center align-middle" rowspan="2" width=30%>รับจาก-จ่ายให้</th>
                                                <th class="text-center align-middle" colspan="2" width=23%>เลขที่เอกสาร</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                                                <th class="text-center align-middle" colspan="3" width=22%>จำนวน</th>
                                                <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle" width=11.5%>รับ</th>
                                                <th class="text-center align-middle" width=11.5%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>รับ</th>
                                                <th class="text-center align-middle" width=7%>จ่าย</th>
                                                <th class="text-center align-middle" width=7%>คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">คณะกรรมการตรวจรับ</td>
                                                <td class="text-center align-middle">{{ $show->project_number }}</td>
                                                <td></td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">{{ formatDateThai($show->project_dateget) }}</td>
                                                <td class="text-left align-middle">{{ $show->teacher_get_name }}</td>
                                                <td></td>
                                                <td class="text-center align-middle">จ.{{ $show->project_number }}</td>
                                                <td class="text-right align-middle">{{ number_format($product_Q[$j]->product_price, 2, '.', ',' )}}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td class="text-right align-middle">{{ $product_Q[$j]->product_amount }}</td>
                                                <td class="text-right align-middle">0</td>
                                                <td></td>
                                            </tr>
                                            @for ($k = 0; $k < $row; $k++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
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
                
                                    <br><hr>
                
                                @endfor
                        </div>

                    </div>

                </fieldset>
            </div>
    
            <div class="col-sm-2">
                <div><br>
                    <a href="{{ route('eight.show',$show->project_id) }}" class="btn btn-success form-control" target="_blank"><i class="fas fa-print"></i> ปริ้นรายการนี้</a>
                </div><br>
                <div class="card sticky" style="padding:10px"> 
                    <h6>เลือกดูข้อมูล</h6>
    
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="eight_onepage-tab" data-toggle="pill" href="#eight_onepage" role="tab" aria-controls="eight_onepage" aria-selected="true">รายการ 1 - 20</a>
                        <a class="nav-link" id="eight_twopage-tab" data-toggle="pill" href="#eight_twopage" role="tab" aria-controls="eight_twopage" aria-selected="false">รายการ 21 - 40</a>
                        <a class="nav-link" id="eight_threepage-tab" data-toggle="pill" href="#eight_threepage" role="tab" aria-controls="eight_threepage" aria-selected="false">รายการ 41 - 60</a>
                        <a class="nav-link" id="eight_fourpage-tab" data-toggle="pill" href="#eight_fourpage" role="tab" aria-controls="eight_fourpage" aria-selected="false">รายการ 61 - 80</a>
                        <a class="nav-link" id="eight_fivepage-tab" data-toggle="pill" href="#eight_fivepage" role="tab" aria-controls="eight_fivepage" aria-selected="false">รายการ 81 - {{ $count[0]->getCount }}</a>


                    </div>
                    
                </div>
    
            
            </div>
        </div>
    @endif

    


</div>
