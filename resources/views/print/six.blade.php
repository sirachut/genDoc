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
    <div class="container" style="font-size:16px"><br><br><br><br>
        <br>
        <div class="row col-sm-12">
            <div class="col-sm-12">
                <p class="text-center"><b>ใบตรวจจรับพัสดุ</b></p>
            </div>
            <div class="col-sm-8">
                {{-- SPACE --}}
            </div>
            <div class="col-sm-4">
                <p class="text-left">
                    เขียนที่ โรงเรียนบ้านเทอดไทย <br>
                    วันที่ {{ formatDateThai($show->project_dateget) }}
                </p>
            </div>
            <div class="col-sm-12">
                <p class="text-left" style="text-indent:50px">
                    ตามที่โรงเรียนบ้านเทอดไทยได้จัดซื้อพัสดุตามงาน/โครงการ {{ $show->project_name }} จาก {{ $show->store_name }}
                    ตั้งอยู่เลขที่ {{ $show->store_address }} ตามใบสั่งซื้อเลขที่ {{ $show->project_number }} ลงวันที่  
                    {{ formatDateThai($show->project_datein) }}
                    ครบกำหนดส่งมอบวันที่ {{ formatDateThai($show->project_dateget) }} 
                </p>
                <p class="text-left" style="text-indent:50px">
                    บัดนี้ผู้ขายได้จัดส่งพัสดุตามงาน/โครงการ {{ $show->project_name }} ตามใบส่งของเล่มที่ 1 เลขที่ {{ $show->bill_number }} 
                    ลงวันที่ {{ formatDateThai($show->project_dateget) }}
                </p>
                <p class="text-left" style="text-indent:50px">
                    การซื้อขายนี้ได้สั่งแก้ไขเปลี่ยนแปลง คือ .................................-.................................
                </p>
                <p class="text-left" style="text-indent:50px">
                    ผู้ตรวจรับพัสดุได้ตรวจรับงานเมื่อวันที่ {{ formatDateThai($show->project_dateget) }} แล้วปรากฏว่างานเสร็จเรียบร้อยถูกต้องตามใบสั่งซื้อทุกประการ เมื่อวันที่ {{ formatDateThai($show->project_dateget) }} 
                    โดยส่งมอบเกินกำหนด 0 วัน คิดเป็นค่าปรับในอัตราร้อยละ 0.20 รวมเป็นเงินทั้งสิ้น 0 บาท
                    จึงออกหนังสือสำคัญฉบับนี้ให้ไว้ วันที่ {{ formatDateThai($show->project_dateget) }} ผู้ขายควรได้รับเงินเป็นจำนวนทั้งสิ้น {{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท ({{ convert($total[0]->getTotal ) }}) ตามใบสั่งซื้อ
                </p>
                <p class="text-left" style="text-indent:50px">
                จึงขอรายงานต่อผู้อำนวยการโรงเรียนบ้านเทอดไทยเพื่อโปรดทราบ ตามนัยข้อ 175(4) ระเบียบกระทรวงการคลังว่าด้วย
                การจัดซื้อจัดจ้างและบริหารพัสดุภาครัฐ พ.ศ. 2560
                </p> <br><br><br><br><br><br>
                <p class="text-center">
                    (ลงชื่อ)...................................................ผู้ตรวจรับพัสดุ
                </p>
                <p class="text-center">
                    ({{ $show->teacher_get_name }})
                </p>
                

            </div>
        </div>
    </div>
</body>
</html>