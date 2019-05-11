@extends('documents.app')

@section('content')

<img style="background-size:cover;" width="100%" height="200px" src="{{ URL::to('/assets/img/action-bg.jpg') }}">

<div class="container">

    <div class="centered">
        
        <h1 style="color:aliceblue">รายการร้านค้าของคุณ</h1>
        <small style="color:aliceblue" >หมายเหตุ : รายการห้างร้าน/บริษัทที่ได้ทำการบันทึกไว้</small>

    </div>

    <style>
    .centered {
    position: absolute;
    top: 22%;
    left: 30%;
    transform: translate(-50%, -50%);
    }
    .card{
        -webkit-box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        -moz-box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        box-shadow: -200px -200px 0px -200px rgba(0,0,0,0);
        
    }
    </style>

</div>

<div class="container">
    <br>
    <div class="card" style="padding:15px">
        <div class="row col-sm-12">
            <div class="col-sm-x">
                <h4>ตารางแสดงร้านค้า/ห้างร้าน </h4> 
                <small>สามารถกดดูรายละเอียดเพิ่มเติมที่ "รายละเอียด" หรือ เพิ่มรายการร้านค้า ได้ที่ปุ่มด้านข้างนี้</small>
                &nbsp; &nbsp; <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">เพิ่มรายการร้านค้า</button>
                <br><br>
            </div>
        </div>
   
        <div class="table-responsive">
            <table class="table" id="store_datatable">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>ชื่อห้างร้าน</th>
                        <th>เบอร์โทรติดต่อ</th>
                        <th>ที่อยู่</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                
                    @php
                        $i=1;
                    @endphp

                    @foreach ($getStore as $item)
                        
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $item->store_name }}</td>
                        <td>{{ $item->store_tel }}</td>
                        <td width="35%">{{ $item->store_address }}</td>

                        <form action="{{ route('storemanage.destroy',$item->store_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td class="td-actions text-right">
                                <a href="{{ route('storemanage.show',$item->store_id) }}" class="btn btn-info btn-just-icon btn-sm">
                                    <i class="fas fa-file-invoice"></i> รายละเอียด                                    
                                </a>
                                <a href="{{ route('storemanage.edit',$item->store_id) }}" class="btn btn-success btn-just-icon btn-sm">
                                    <i class="fas fa-edit"></i> แก้ไข
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </form>
                    </tr>

                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>

    <br><br><br><br>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">เพิ่มร้านค้า</h4>
                <small id="store_name" class="form-text text-muted"> &nbsp; &nbsp;{{ Auth::user()->name }}</small>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
           
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('storemanage.store') }}" method="POST">
            @csrf

            <div class="form-row">
                
                <div class="form-group col-md-8">
                    <label for="store_name">{{ __('ห้างร้านบริษัทที่จัดซื้อ') }} </label>
                    <textarea style="text" class="form-control" name="store_name" required></textarea>
                    <small id="store_name" class="form-text text-muted">คำอธิบาย : ชื่อร้านค้าที่จัดซื้อ</small>

                </div>
                <div class="form-group col-md-4">
                    <label for="store_tel">{{ __('โทรศัพท์') }} </label>
                    <input style="text" class="form-control" name="store_tel" autocomplete="off" required>
                    <small id="store_tel" class="form-text text-muted">คำอธิบาย : เบอร์โทรร้านค้า</small>

                </div>
                <div class="form-group col-md-4">
                    <label for="store_teletex">{{ __('โทรสาร') }} </label>
                    <input style="text" class="form-control" name="store_teletex" value="-" autocomplete="off">
                    <small id="store_teletex" class="form-text text-muted">คำอธิบาย : เบอร์โทรสารร้านค้า</small>

                </div>
                <div class="form-group col-md-8">
                    <label for="store_address">{{ __('ที่อยู่ห้างร้านบริษัทที่จัดซื้อ') }} </label>
                    <textarea style="text" class="form-control" name="store_address" required></textarea>
                    <small id="store_address" class="form-text text-muted">ตัวอย่าง : 130 หมู่ 11 ต.เจดีย์หลวง อ.แม่สรวย จ.เชียงราย 57180</small>

                </div>
                

                {{-- hidden --}}
                <input style="text" class="form-control" name="store_id_fk" value="{{ Auth::user()->id }}" hidden>
                <input style="text" class="form-control" name="status" value="s" hidden>

            </div>

            <div class="form row">

                <div class="form-group col-md-12">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_store_employee" aria-expanded="false" aria-controls="collapseExample">
                            เพิ่มผู้มีอำนาจลงนามของร้านค้า
                    </button>
                    <small id="bank_number" class="form-text text-muted">หมายเหตุ : หากไม่ได้เพิ่มผู้มีอำนาจลงนามของร้านค้า ชุดข้อมูลดังกล่าวจะถูกระบุไว้ว่า "ยังไม่ได้ระบุ"</small>

                    
                </div>
            
            </div>
            <div class="collapse" id="collapse_store_employee">
                <div class="form row">
                        <div class="form-group col-md-6">
                                <label for="store_employeeNumber">{{ __('เลขประจำตัวผู้เสียภาษี') }} </label>
                                <input style="text" class="form-control" name="store_employeeNumber" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                                <small id="store_employeeNumber" class="form-text text-muted">ตัวอย่าง : 05735420xxxx</small>
            
                            </div>
                            <div class="form-group col-md-6">
                                <label for="store_employee">{{ __('ผู้มีอำนาจลงนาม') }} </label>
                                <input style="text" class="form-control" name="store_employee" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                                <small id="store_employee" class="form-text text-muted">คำอธิบาย : ผู้ลงนามร้านค้า</small>
            
                            </div>
                </div>
            </div>

            <div class="form row">

                    <div class="form-group col-md-12">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_store_bank" aria-expanded="false" aria-controls="collapseExample">
                                เพิ่มบัญชีธนาคาร
                        </button>
                        <small id="bank_number" class="form-text text-muted">หมายเหตุ : หากไม่ได้เพิ่มธนาคารของร้านค้า ชุดข้อมูลดังกล่าวจะถูกระบุไว้ว่า "ยังไม่ได้ระบุ"</small>

                        
                    </div>
                
            </div>

            <div class="collapse" id="collapse_store_bank">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="bank_number">{{ __('เลขที่บัญชีเงินฝากธนาคาร') }} </label>
                        <input id="bank_number" style="text" class="form-control" name="bank_number" onfocus="this.value=''" autocomplete="off" onfocusout="myFunction()" value="(ยังไม่ได้ระบุ)" required>
                        <small id="bank_number" class="form-text text-muted">ตัวอย่าง : 987673****</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank_account">{{ __('ชื่อบัญชี') }} </label>
                        <input style="text" class="form-control" name="bank_account" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                        <small id="bank_account" class="form-text text-muted">คำอธิบาย : ชื่อบัญชีธนาคาร</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank_number">{{ __('ธนาคาร') }} </label>
                        <input id="bank_name" style="text" class="form-control" name="bank_name" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                        <small id="bank_name" class="form-text text-muted">ตัวอย่าง : ชื่อธนาคารที่บัญชีสังกัดอยู่</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bank_branch">{{ __('สาขา') }} </label>
                        <input style="text" class="form-control" name="bank_branch" onfocus="this.value=''" value="(ยังไม่ได้ระบุ)" required autocomplete="off">
                        <small id="bank_branch" class="form-text text-muted">คำอธิบาย : สาขาที่ธนาคารสังกัดอยู่</small>
                    </div>

                    {{-- hidden --}}

                </div>
            </div>

        </div>
        
        <!-- Modal footer -->

        <div class="modal-footer">
            <input type="reset" class="btn btn-dark" value="Reset">
            <button type="submit" class="btn btn-success">บันทึกข้อมูลร้านค้า</button>
        </div>
    </form>


    <script>
        $(document).ready(function() {
            $('#store_datatable').DataTable({
                "ordering": false,
            });
        } );
    </script>


@endsection