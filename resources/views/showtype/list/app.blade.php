<div class="container"> <br>
    <div class="row">
        <div class="col-sm-9">
            <div class="card" style="padding:10px">
    
                {{-- <b>ยอดรวมสุทธิ {{ number_format($total[0]->ASD, 2, '.', ',') }} บาท</b> --}}
                <h4>ตารางแสดงรายการสินค้า </h4>
                <small>ใบเสร็จเลขที่ : {{ $show->bill_number }} ของโครงการ : {{ $show->project_name }}</small>  <br>
        
                <div class="table-responsive">
                    <table class="table table-hover" id="project_datatable" style="font-size:14px">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>รายการ</th>
                                <th class="text-center">ราคา(บาท)</th>
                                <th class="text-center">จำนวน</th>
                                <th class="text-center">คิดเป็นเงิน(บาท)</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @php
                                $i=1;                        
                            @endphp
        
                            @foreach ($product_Q as $item)
        
            
                            @php
                                $getsum = $item->product_price * $item->product_amount;
                            @endphp
        
                                
                            <tr>
                                <td width="5%" class="text-center">{{ $i++ }}</td>
                                <td width="40%">{{ $item->product_name }}</td>
                                <td width="15%" class="text-right">{{ number_format($item->product_price, 2, '.', ',' )}} บาท</td>
                                <td width="15%" class="text-right">{{ $item->product_amount }} {{ $item->product_unitname }}</td>
                                <td width="20%" class="text-right">{{ number_format($getsum, 2, '.', ',') }} บาท</td>
        
                                <form action="{{ route('ajaxproducts.destroy',$item->product_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td class="td-actions text-right">
                                        {{-- <a href="{{ route('ajaxproducts.edit',$item->product_id) }}" class="btn btn-success btn-just-icon btn-sm">
                                            <i class="fas fa-edit"></i> แก้ไข
                                        </a> --}}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </form>
                            </tr>
        
                            @endforeach  
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <div class="col-sm-3">
            
            <div class="card sticky" style="padding:10px">
                <h5>เพิ่มรายการสินค้า</h5> <hr>
                <form action="{{ route('ajaxproducts.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                    
                            <div class="form-group col-md-12">
                                <label for="product_name">{{ __('รายการ') }} </label>
                                <textarea type="text" class="form-control" name="product_name" required></textarea>
            
                            </div>
                            <div class="form-group col-md-12">
                                <label for="product_price">{{ __('ราคา (บาท)') }} </label>
                                <input type="number" class="form-control" name="product_price" min="1" autocomplete="off" required>
            
                            </div>

                            <div class="form-group col-md-6">
                                <label for="product_amount">{{ __('จำนวน') }} </label>
                                <input type="number" class="form-control" name="product_amount" min="1" autocomplete="off" required>
            
                            </div>
            
                            <div class="form-group col-md-6">
                                <label for="product_unitname">{{ __('ลักษณะนาม') }} </label>
                                <input type="text" class="form-control" name="product_unitname" autocomplete="off" required>
            
                            </div>

                            <button type="submit" class="btn btn-info form-control">เพิ่มรายการ</button>
                            
                            {{-- hidden --}}
                            <input type="text" name="project_fk" value="{{ $show->project_id }}" hidden>
                            {{-- {{ Auth::user()->id }} --}}
                            
                            
                    </div>

                </form>
                <div class="form-row">
                        <div class="form-group col-md-12"><br>
                            <label for="product_price">{{ __('จำนวนรายการ') }} </label>
                            <input type="text" class="form-control" value="{{ ($count[0]->getCount) }} รายการ" readonly>
        
                        </div>
                        <div class="form-group col-md-12">
                            <label for="product_price">{{ __('ยอดสุทธิ') }} </label>
                            <input type="text" class="form-control" value="{{ number_format($total[0]->getTotal, 2, '.', ',') }} บาท" readonly>
        
                        </div>
                    </div>
                    
            </div><br>
            

        </div>
    </div>

    


</div>


<br><br><br><br><br><br><br>

<script>
    $(document).ready(function() {
        $('#project_datatable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    } );
</script>

