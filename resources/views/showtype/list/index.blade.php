
<div class="container">
    <br>
        <p>เพิ่มรายการสินค้าของโครงการ</p>
        <h4>{{ $show->project_name }}</h4>
        <a href="{{ route('home.show', $show->project_id) }}" class="btn btn-info btn-sm"><i class="fas fa-file-invoice"></i> กลับหน้าเดิม</a>
        
    <br>
    <form action="{{ action('ProductController@store') }}" method="POST">
            @csrf
    
            <div class="form row">
                <div class="form-group col-sm-6">
                    <label for="">ชื่อรายการสินค้า</label>
                    <input type="text" id="product_name" class="form-control" name="product_name" required >
                </div>
                <div class="form-group col-sm-2">
                        <label for="">ราคาสินค้าต่อชิ้น</label>
                    <input type="number" id="product_price" class="form-control" name="product_price" step="0.01" required>
                </div>
                <div class="form-group col-sm-2">
                    <label for="">จำนวนสินค้า</label>
                    <input type="number" id="product_amount" class="form-control" name="product_amount" required>
                </div>
                <div class="form-group col-sm-2">
                        <label for="">ลักษณะนาม</label>
    
                    <input type="text" id="product_unitname" class="form-control" name="product_unitname" required>
                    {{-- <input type="text" id="project_fk" class="form-control" name="project_fk" value="{{ $show->project_id }}" hidden> --}}
                </div>
                <div>
                    
                    <button type="submit" class="form-control btn btn-info-xl" hidden></button>
                </div>
            </div>   
    </form>    
</div>
    
    