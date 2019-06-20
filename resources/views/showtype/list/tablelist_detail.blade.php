<table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center align-middle" rowspan="2" width=5%>ลำดับที่</th>
                <th class="text-center align-middle" rowspan="2" width=40%>รายการพัสดุที่จัดซื้อ</th>
                <th class="text-center align-middle" colspan="2" width=15%>ปริมาณ</th>
                <th class="text-left align-middle" width=20%>() ราคามาตรฐาน</th>
                <th class="text-center align-middle" width=20% colspan="2">จำนวนและวงเงินที่ขอซื้อครั้งนี้</th>
            </tr>
            <tr>
                <th class="text-center align-middle"  width=7.5%>จำนวน</th>
                <th class="text-center align-middle" width=7.5%>หน่วย</th>
                <th>() ราคาที่ได้มาจากการสืบจากท้องตลาด (หน่วยละ)</th>
                <th class="text-center align-middle" width=10%>หน่วยละ</th>
                <th class="text-center align-middle" width=10%>จำนวนเงิน</th>
            </tr>
        </thead>
        <tbody>

       
         @foreach ($product_Q as $item)
         @php
         $getsum = $item->product_price * $item->product_amount;
         // $sum_without_tax = number_format($total[0]->ASD, 2, '.', ',');

        @endphp

            <tr>
                <td class="text-center">{{ $countitem++ }}</td>
                <td class="text-left align-middle">{{ $item->product_name }}</td>
                <td class="text-center">{{ $item->product_amount }}</td>
                <td class="text-center">{{ $item->product_unitname }}</td>
                <td class="text-right">{{ number_format($item->product_price, 2, '.', ',' )}}</td>
                <td class="text-right">{{ number_format($item->product_price, 2, '.', ',' )}}</td>
                <td class="text-right">{{ number_format($getsum, 2, '.', ',') }}</td>
            </tr>

        @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right">รวมเป็นเงินทั้งสิ้น</td>
                <td></td>
                <td class="text-right">{{ number_format($total[0]->ASD, 2, '.', ',') }}</td>
            </tr>
        </tbody>
    </table>