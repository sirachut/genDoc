<div class="container">
    <br>
    <div class="card" style="padding:15px">
        <div class="row col-sm-12">
            <div class="col-sm-x">
                <h4>ตารางแสดงรายการสินค้า </h4> 
                <small>ณ ตอนนี้ ยังไม่สามารถหาวิธีเพิ่มรายการสินค้า แบบ Multi ได้ แต่ทว่ากระผมอยากทดลองแบบทีละหนึ่งอันก่อน เพื่อที่จะสามารถไปทำส่วนอื่นๆ ได้</small>
                &nbsp; &nbsp; 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">เพิ่มรายการ</button>
                <br><br>
            </div>
        </div>

        @php
            $countitem=1;
            
        @endphp

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                    <th class="text-center align-middle" rowspan="2" width=45%>รายการ</th>
                    <th class="text-center align-middle" colspan="2" width=30%>ปริมาณ</th>
                    <th class="text-center align-middle" rowspan="2" width=20%>ยอดรวมในรายการ (บาท)</th>
                </tr>
                <tr>
                    <th class="text-center align-middle" width=15%>ราคาต่อหน่อย (บาท)</th>
                    <th class="text-center align-middle" width=15%>จำนวน/หน่วย</th>  
                </tr>
            </thead>
           <tbody>

                @foreach ($product_Q as $item)
           

                @php
                    $getsum = $item->product_price * $item->product_amount;
                    $sum_without_tax = number_format($total[0]->ASD, 2, '.', ',');

                @endphp
                <tr>
                    <td class="text-center align-middle">{{ $countitem++ }}</td>
                    <td class="text-left align-middle">{{ $item->product_name }}</td>
                    <td class="text-right align-middle">{{ number_format($item->product_price, 2, '.', ',' )}} บาท</td>
                    <td class="text-right align-middle">{{ $item->product_amount }} {{ $item->product_unitname }}</td>
                    <td class="text-right align-middle">{{ number_format($getsum, 2, '.', ',') }} บาท</td>
                </tr>     
                @endforeach
                <tr>
                    <td colspan="5" class="text-right"><b>ยอดรวมสุทธิ {{ $sum_without_tax }} บาท</b></td>
                </tr>
           </tbody>
        </table>
   
        
        </div>
    </div>
</div>

<br><br><br><br><br><br><br>

