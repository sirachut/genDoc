<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ action('ProductController@store') }}" method="POST">
                @csrf
                <div class="form-row">
                
                        <div class="form-group col-md-4">
                            <label for="store_tel">{{ __('product_name') }} </label>
                            <input style="text" class="form-control" name="product_name" autocomplete="off" required>
                            <small id="store_tel" class="form-text text-muted">คำอธิบาย : เบอร์โทรร้านค้า</small>
        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="store_teletex">{{ __('product_unitname') }} </label>
                            <input style="text" class="form-control" name="product_unitname" value="-" autocomplete="off">
                            <small id="store_teletex" class="form-text text-muted">คำอธิบาย : เบอร์โทรสารร้านค้า</small>
        
                        </div>
                        <div class="form-group col-md-8">
                            <label for="store_address">{{ __('product_amount') }} </label>
                            <textarea style="text" class="form-control" name="product_amount" required></textarea>
                            <small id="store_address" class="form-text text-muted">ตัวอย่าง : 130 หมู่ 11 ต.เจดีย์หลวง อ.แม่สรวย จ.เชียงราย 57180</small>
        
                        </div>
                        <div class="form-group col-md-8">
                            <label for="store_address">{{ __('product_price') }} </label>
                            <textarea style="text" class="form-control" name="product_price" required></textarea>
                            <small id="store_address" class="form-text text-muted">ตัวอย่าง : 130 หมู่ 11 ต.เจดีย์หลวง อ.แม่สรวย จ.เชียงราย 57180</small>
            
                        </div>
                        
        
                        {{-- hidden --}}
                        <input style="text" class="form-control" name="project_fk" value="{{ $show->project_id }}" hidden>
                        
        
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
            </form>

        </div>
    </div>
</div>