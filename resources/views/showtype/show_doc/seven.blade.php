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
                <legend class="scheduler-border"><h4>ใบเบิกพัสดุ</h4></legend>

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade " id="seven_cover" role="tabpanel" aria-labelledby="seven_cover-tab">
                        <div class="row col-sm-12">
                            <div class="col-sm-12">
                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                <p>ใบเบิกพัสดุ/บัญชีวัสดุตามเอกสารจัดซื้อ ชุดที่ {{ $show->project_number }}</p>
                                <p>ชื่อกิจกรรม/โครงการ {{ $show->project_name }}</p>
                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="seven_first" role="tabpanel" aria-labelledby="seven_first-tab">
                            <div class="row col-sm-12">
                                    <div class="col-sm-12">
                                        <p class="text-center"><b>ใบเบิกพัสดุ</b></p>
                                        <p class="text-center"><b>โรงเรียนบ้านเทอดไทย</b></p>
                                        <p class="text-right">ที่ จ. {{ $show->project_number }}</p>
                                        <p class="text-center">วันที่ (ทดสอบ) </p> <br>
                                        <p class="text-left" style="text-intent:50px">
                                            ข้าพเจ้าขอเบิกพัสดุเพื่อในงานกิจกรรมจัดการเรียนการสอน ฝ่ายงาน {{ $show->project_department }} ดังรายการต่อไปนี้
                                        </p>
                                    </div>
                                    @php
                                        $countitem=1;
                                      
                                    @endphp
                                    <div class="col-sm-12">
                                       <table class="table table-bordered">
                                           <thead>
                                               <tr>
                                                   <th class="text-center align-middle" rowspan="2" width=5%>ที่</th>
                                                   <th class="text-center align-middle" rowspan="2" width=45%>รายการ</th>
                                                   <th class="text-center align-middle" colspan="2" width=30%>จำนวน</th>
                                                   <th class="text-center align-middle" rowspan="2" width=20%>หมายเหตุ</th>
                                               </tr>
                                               <tr>
                                                   <th class="text-center align-middle" width=15%>ขอเบิก</th>
                                                   <th class="text-center align-middle" width=15%>เบิกได้</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <td>{{ $countitem++ }}</td>
                                                   <td>ทดสอบ</td>
                                                   <td class="text-right">ทดสอบ</td>
                                                   <td class="text-right">ทดสอบ</td>
                                                   <td class="text-center">ทดสอบ</td>
                                               </tr>
                                           </tbody>

                                       </table>
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="seven_two" role="tabpanel" aria-labelledby="seven_two-tab">
                        ...
                    </div>
                    <div class="tab-pane fade" id="seven_three" role="tabpanel" aria-labelledby="seven_three-tab">
                        ...
                    </div>

                </div>
                
            </fieldset>
        </div>

        <div class="col-sm-3">
            <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><p style="font-size:18px">เลือกดูข้อมูล</p></legend>
                
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="seven_cover-tab" data-toggle="pill" href="#seven_cover" role="tab" aria-controls="seven_cover" aria-selected="true">หน้าปก</a>
                        <a class="nav-link active" id="seven_first-tab" data-toggle="pill" href="#seven_first" role="tab" aria-controls="seven_first" aria-selected="false">หน้าที่ 1</a>
                        <a class="nav-link" id="seven_two-tab" data-toggle="pill" href="#seven_two" role="tab" aria-controls="seven_two" aria-selected="false">หน้าที่ 2 </a>
                        <a class="nav-link" id="seven_three-tab" data-toggle="pill" href="#seven_three" role="tab" aria-controls="seven_three" aria-selected="false">หน้าที่ 3</a>
                    </div>
                        
            </fieldset>

            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><p style="font-size:18px">ข้อมูลในเอกสารนี้</p></legend>
                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">วันรับมอบสินค้า</small>
                    </label>
                    <p class="form-control">ทดสอบ</p>
                    
                </div>
                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">ชื่องาน/โครงการ</small>
                    </label>
                    <p class="form-control">{{ $show->project_name }}</p>
                    
                </div>
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
                        <small class="form-text text-muted">เล่มที่ ของใบส่งของ</small>
                    </label>
                    <p class="form-control">ทดสอบ</p>
                    
                </div>
                <div class="form-group">   
                    <label for="">
                        <small class="form-text text-muted">เลขที่ ของใบส่งของ</small>
                    </label>
                    <p class="form-control">{{ $show->bill_number }}</p>
                    
                </div>

               

            </fieldset>
        </div>
    </div>
</div>
    