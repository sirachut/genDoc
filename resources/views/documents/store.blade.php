
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('createstore.store') }}" method="POST">
            @csrf
         
            <div class="form row">
                <div class="form-group col-md-12">
                    <label for="store_id_fk">{{ __('ผู้ใช้') }}</label>
                    <input type="text" id="store_id_fk" class="form-control" name="store_id_fk" value=" {{ Auth::user()->id }}">
                </div>
                <div class="form-group col-md-12">
                    <label for="store_name">{{ __('ชื่อร้าน') }}</label>
                    <input type="text" id="store_name" class="form-control" name="store_name"  required>
                </div>
                <div class="form-group col-md-12">
                    <label for="store_tel">{{ __('store_tel') }}</label>
                    <input type="text" id="store_tel" class="form-control" name="store_tel" >
                </div>
                <div class="form-group col-md-12">
                    <label for="store_teletex">{{ __('store_teletex') }}</label>
                    <input type="text" id="store_teletex" class="form-control" name="store_teletex" >
                </div>
                <div class="form-group col-md-12">
                    <label for="store_address">{{ __('store_address') }}</label>
                    <input type="text" id="store_address" class="form-control" name="store_address" >
                </div>
                <div class="form-group col-md-12">
                    <label for="store_employee">{{ __('store_employee') }}</label>
                    <input type="text" id="store_employee" class="form-control" name="store_employee" >
                </div>
                <div class="form-group col-md-12">
                    <label for="store_employeeNumber">{{ __('store_employeeNumber') }}</label>
                    <input type="text" id="store_employeeNumber" class="form-control" name="store_employeeNumber" >
                </div>
                <div class="form-group col-md-12">
                    <label for="bank_branch">{{ __('bank_branch') }}</label>
                    <input type="text" id="bank_branch" class="form-control" name="bank_branch" >
                </div>
                <div class="form-group col-md-12">
                    <label for="bank_number">{{ __('bank_number') }}</label>
                    <input type="text" id="bank_number" class="form-control" name="bank_number" >
                </div>
                <div class="form-group col-md-12">
                    <label for="bank_account">{{ __('bank_account') }}</label>
                    <input type="text" id="bank_account" class="form-control" name="bank_account" >
                </div>
                <div class="form-group col-md-12">
                    <label for="bank_name">{{ __('bank_name') }}</label>
                    <input type="text" id="bank_name" class="form-control" name="bank_name" >
                </div>
            </div>
        
         
        </div>
        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
        </div>
    </form>

        
      
      </div>
    </div>
  </div>
