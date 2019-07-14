<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>7.บัญชีวัสดุ</title>
    @include('layouts.style')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
        
        p.margin{
            margin-top: 4px;
            margin-bottom: 4px;   
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
        /* body{
            margin:0;
            overflow:hidden;
        } */
        .wrapper{
            /* transform: rotate(90deg); */
            transform-origin:bottom left;
            
            /* position: absolute; */
            /* top: 30%; */
            /* width: 1000px;
            height: 100px; */
         
          
        }
        @page {
            size: A4 landscape;
        }
    </style>
</head>

<body>
    @php
        $countitem=1;
        $ebits = ini_get('error_reporting');
        error_reporting($ebits ^ E_NOTICE);
    @endphp

    
@for ($j = 0; $j < $count[0]->getCount ; $j++)

    <div class="container wrapper" style="font-size:16px">
        <div class="row">
            @php
                $getsum = $product_Q[$j]->product_price * $product_Q[$j]->product_amount;
                $beforetax = ($total[0]->getTotal * 100)/107;
                $tax = $total[0]->getTotal - $beforetax;
                $row = 9;
            @endphp
            <div class="col-sm-12">
                <p class="text-center" style="font-size:18px"><b>บัญชีวัสดุ</b></p>
                <p class="text-right margin">ส่วนราชการ โรงเรียนบ้านเทอดไทย</p>
                <p class="text-right margin">หน่วยงาน สพป.ชร.เขต 3</p>
            </div>

            <div class="col-sm-8">
                <p class="text-left margin">แผ่นที่ {{ $countitem++ }}</p>
                <p class="text-left margin">ประเภท &nbsp;&nbsp;&nbsp; วัสดุ &nbsp;&nbsp;&nbsp; ชื่อหรือชนิดของวัสดุ {{ $product_Q[$j]->product_name }}</p>
                <p class="text-left margin">ขนาดหรือลักษณะ.......................................................................................</p>
                <p class="text-left margin">หน่วยรับ &nbsp;&nbsp;&nbsp; {{ $show->project_department }} &nbsp;&nbsp;&nbsp; ที่เก็บ ห้องพัสดุ</p>
            </div>

            <div class="col-sm-4"><br>
                <p class="text-left margin">รหัส.........................................................</p>
                <p class="text-left margin">จำนวนอย่างสูง........................................</p>
                <p class="text-left margin">จำนวนอย่างต่ำ........................................</p>
            </div>

            <div class="col-sm-12">
                <table class="table table-bordered table-sm" style="font-size:14px">
                    <thead>
                        <tr> 
                            <th class="text-center align-middle" rowspan="2" width=15%>วัน เดือน ปี</th>
                            <th class="text-center align-middle" rowspan="2" width=40%>รับจาก-จ่ายให้</th>
                            <th class="text-center align-middle" colspan="2" width=16%>เลขที่เอกสาร</th>
                            <th class="text-center align-middle" rowspan="2" width=5%>ราคา/หน่วย(บาท)</th>
                            <th class="text-center align-middle" colspan="3" width=18%>จำนวน</th>
                            <th class="text-center align-middle" rowspan="2" width=5%>หมายเหตุ</th>
                        </tr>
                        <tr>
                            <th class="text-center align-middle" width=8%>รับ</th>
                            <th class="text-center align-middle" width=8%>จ่าย</th>
                            <th class="text-center align-middle" width=6%>รับ</th>
                            <th class="text-center align-middle" width=6%>จ่าย</th>
                            <th class="text-center align-middle" width=6%>คงเหลือ</th>
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
                <br><br><br><br>
            </div>

        </div>
    </div>
    
@endfor

</body>
</html>