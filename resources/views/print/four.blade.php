<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3.รายงานเรียนหัวหน้าเจ้าหน้าที่</title>
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
        /* @page {
            size: A4;
        } */
    </style>
</head>

<body>
<div class="row">
    <div class="container">
        <div class="col-sm-12"><br>
           
                <img class="kud" src="{{ URL::asset('images/kud.JPG') }}" alt="" width="auto" style="max-width: 70px;"><br>
                
                <p style="text-align:center;"><b>บันทึกข้อความ</b></p>  <br>
                
                <p><b>ส่วนราชการ โรงเรียนบ้านเทอดไทย</b></p>
                
                <div class="row form-inline">
                    <div class="col-sm-1"><b>ที่</b></div>
                    <div class="col-sm-5">ช.{{ $show->project_number }}</div>
                    <div class="col-sm">
                        {{ formatDateThai($show->project_datein) }}
                    </div>
                </div>

                <div class="row form-inline">
                    <div class="col-sm-1"><b>เรื่อง</b></div>
                    <div class="col-sm-5">รายงานการพิจารณาและขออนุมัติสั่งซื้อ</div>
                </div>

                <hr>

                <div class="row form-inline">
                    <div class="col-sm-1"><b>เรียน</b></div>
                    <div class="col-sm-5">หัวหน้าเจ้าหน้าที่</div>
                </div><br>  
                <p class="margin">ตามที่ผูอำนวยการโรงเรียนบ้านเทอดไทยเห็นชอบรายงานขอซื้อพัสดุตาม งาน/โครงงาน 
                    {{ $show->project_name }} จำนวนเงิน {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท ({{ convert($total[0]->getTotal ) }}) ตามระเบียบกระทรวงการคลัง
                    ว่าด้วยการจัดซื้อจัดจ้างและการบริหาร พ.ศ.2560 ข้อ 24 รายละเอียดดังแนบ
                </p>
            
            
                <p class="margin">ในการนี้เจ้าหน้าที่ได้เจรจาตกลงราคากับ {{ $show->store_name }} ซึ่งมีอาชีพค้าขาย
                    ปรากฏว่าเสนอราคาเป็นเงิน {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท ({{ convert($total[0]->getTotal ) }}) ดังนั้นเพื่อให้เป็นไปตามระเบียบกระทรวงการคลัง
                    ว่าด้วยการจัดซื้อจัดจ้างและการบริหาร ข้อ 79 จังเห็นควรจัดซื้อจากผู้เสนอราคารายดังกล่าว 
                </p><br>
            
                <p class="margin">จึงเรียนมาเพื่อโปรดและพิจารณา</p>
                <p class="padding">1.อนุมัติให้สั่งซื้อจาก {{ $show->store_name }} เป็นผู้ส่งมอบพัสดุ 
                    ตาม งาน/โครงการ {{ $show->project_name }} วงเงิน {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท ({{ convert($total[0]->getTotal ) }}) 
                    กำหนดระยะเวลาส่งมอบภายใน {{ $show->project_getday }} วัน
                </p>
                <p class="margin">2.ลงนามในใบสั่งซื้อดังแนบ</p><br><br><br><br>

                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <p class="text-center margin">(ลงชื่อ)................................................................เจ้าหน้าที่</p>
                        <p class="text-center margin">{{ $show->parcel_name }}</p>
                        <p class="text-center margin">{{ formatDateThai($show->project_datein) }}</p>
                    </div>
                </div><br><br>

                <div class="row">
                    <div class="col-sm-7"></div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-left margin">-<b> อนุมัติ</b></p>
                                <p class="text-left margin">-<b> ลงนามแล้ว</b></p><br>
                                <p class="text-left margin">(ลงชื่อ).................................................................</p>
                                <p class="text-center margin">({{ $show->parcelLeader_name }})</p>
                                <p class="text-center margin">ตำแหน่ง หัวหน้าเจ้าหน้าที่</p>                                    
                                <p class="text-center margin">{{ formatDateThai($show->project_datein) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                    
                

            </fieldset>
        </div>
    </div>
</div>
</body>
</html>