
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>1.รายงานเรียนผู้อำนวยการ</title>
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

<body >
    
    <div class="row">
       
        <div class="container">
            <div class="col-sm-12"><br>
                    
                    <img class="kud" src="{{ URL::asset('images/kud.JPG') }}" alt="" width="auto" style="max-width: 70px;"><br>
                
                    <p style="text-align:center;"><b>บันทึกข้อความ</b></p>  <br>
                    
                    <p><b>ส่วนราชการ โรงเรียนบ้านเทอดไทย</b></p>
                        
                    <div class="row form-inline">
                        <div class="col-sm-1"><b>ที่</b></div>
                        <div class="col-sm-5">{{ $show->project_number }}</div>
                        <div class="col-sm">
                            {{ formatDateThai($show->project_datein) }}
                        </div>
                    </div>
        
                    <div class="row form-inline">
                        <div class="col-sm-1"><b>เรื่อง</b></div>
                        <div class="col-sm-5">รายการขอซื้อพัสดุ</div>
                    </div>
        
                    <hr>
        
                    <div class="row form-inline">
                        <div class="col-sm-1"><b>เรียน</b></div>
                        <div class="col-sm-5">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</div>
                    </div>
                    <br>
                    <p class="margin">ด้วยกลุ่มสาระ {{ $show->project_department }}มีความประสงค์จะขอซื้อพัสดุ 
                        จำนวน {{ $count[0]->getCount }} รายการ เพื่อให้ได้พัสดุมาใช้ในการปฏิบัติงานในโรงเรียนบ้านเทอดไทย ซึ่งได้รับอนุมัติเงินจาก
                        แผนงาน{{ $show->project_subject }} งาน/โครงการ {{ $show->project_name }} ของโรงเรียน จำนวน 
                        {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท ดังรายละเอียดแนบท้าย
                    </p>

                    <p class="margin">งานพัสดุได้ตรวจสอบแล้วเห็นควรจัดซื้อตามที่เสนอ และเพื่อให้นำไปตามพระราชบัญญัติ
                        การจัดซื้อจัดจ้างและการบริหารพัสดุภาครัฐ พ.ศ.2560 มาตรา 56  วรรคหนึ่ง (2) (ข) และ ระเบียบกระทรวงการคลัง
                        ว่าด้วยการจัดซื้อจัดจ้างและการบริหารพัสดุภาครัฐ พ.ศ. 2560 ข้อ 22 ข้อ 79 ข้อ 25 (5) และกฎกระทรวงกำหนด
                            วงเงินการจัดซื้อจัดจ้างพัสดุโดยวิธีเฉพาะเจาะจง วงเงินการจัดซื้อจัดจ้างที่ ไม่ทำข้อตกลงเป็นหนังสือ และวงเงินการจัดซื้อ
                            จัดจ้างในการแต่งตั้งผู้ตรวจรับพัสดุ พ.ศ. 2560 ข้อ 1 และข้อ 5 จึงขอรายงานขอซื้อ ดังนี้
                    </p>
                    <p class="margin">1.เหตุผลและความจำเป็นที่ต้องซื้อคือ เพื่อให้ได้พัสดุมาใช้ในงาน/โครงการ {{ $show->project_name }}</p>
                    <p class="margin">2.รายละเอียดของพัสดุที่จะซื้อคือ (ตามรายละเอียดตามบันทึกข้อความที่  {{ $show->project_number }} )</p>
                    <p class="margin">3.ราคากลางของพัสดุที่จะซื้อเป็นเงิน {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท</p>
                    <p class="margin">4.วงเงินที่ขอซื้อครั้งนี้ {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท ({{ convert($total[0]->getTotal ) }})</p>
                    <p class="margin">5.กำหนดระยะเวลาส่งมอบภายใน {{ $show->project_getday }} วัน นับถัดจากวันลงนามในใบสั่งซื้อกับโรงเรียน</p>
                    <p class="padding">
                        6.ซื้อโดยวิธีเฉพาะเจาะจง เนื่องจาก การจัดจ้างพัสดุที่มีการผลิต จำหน่าย ก่อสร้าง หรือให้บริการทั่วไป และมีวงเงินในการจัดซื้อ
                        จัดจ้างครั้งหนึ่งไม่เกิน 50,000.00 บาท ที่กำหนดในกฎกระทรวง
                    </p>
                    <p class="margin">7.หลักเกณฑ์การพิจารณาคัดเลือกข้อเสนอ โดยใช้เกณฑ์ราคา</p>
                    <p class="margin">8.ข้อเสนออื่น ๆ เห็นควรแต่งตั้งผู้ตรวจรับพัสดุ ตามเสนอ</p>
        
                    <br>
        
                    <p class="margin">จึงเรียนมาเพื่อโปรดและพิจารณา</p>
                    <p class="margin">1.เห็นชอบในรายงานขอซื้อดังกล่าวข้างต้น</p>
                    <p class="margin">2.อนุมัติให้แต่งตั้ง {{ $show->teacher_get_name }} &nbsp;&nbsp;&nbsp;&nbsp; ตำแหน่ง {{ $show->teacher_rank }} เป็นผู้ตรวจรับพัสดุ</p>

                    <br><br><br>

                    <div class="row">
                        <div class="col-sm-5">
                            <p class="text-left">(ลงชื่อ)......................................................เจ้าหน้าที่</p>
                        </div>
                        <div class="col-sm-7"></div>
                        <div class="col-sm-4">
                            <p class="text-center">({{ $show->parcel_name }})</p>
                        </div>
                        <div class="col-sm-8"></div>
                    <br><br><br><br>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <p class="text-left">(ลงชื่อ)......................................................หัวหน้าเจ้าหน้าที่</p>
                        </div>
                        <div class="col-sm-7"></div>
                        <div class="col-sm-4">
                            <p class="text-center">({{ $show->parcelLeader_name }})</p>
                        </div>
                        <div class="col-sm-8"></div>
                        
                    </div>

                    
                   


                    <div class="row">
                        <div class="col-sm-6"></div>

                        <div class="col-sm-6">
                            <p><b>- เห็นชอบ</b></p>
                            <p><b>- อนุมัติ</b></p>
                            <p class="text-center">(ลงชื่อ)..................................................................</p>
                            <p class="text-center">{{ $show->manageschool_name }}</p> 
                            <p class="text-center">ตำแหน่ง ผู้อำนวยการโรงเรียน</p> 
                            <p class="text-center">{{ formatDateThai($show->project_datein) }}</p> 
                        
                        
                        </div>
                    </div>

                </div>
               

            </div>
        </div>

    </div>

    <br><br><br><br>
</body>
</html>
