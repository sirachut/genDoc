@extends('documents.app')

@section('content')

<img style="background-size:cover;" width="100%" height="200px" src="{{ URL::to('/assets/img/action-bg.jpg') }}">


<div class="centered">
        
    <h1 style="color:aliceblue">โครงการ/กิจกรรมการสั่งซื้อ</h1>
    <small style="color:aliceblue" >หมายเหตุ : หน้าต่าง ตารางแสดงโครงการ/กิจกรรมของผู้ใช้</small>

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



<div class="container">
    <div>
        <br>

            
        <div class="row">

                <div class="row col-sm-12">
                    <div class="col-sm-x">
                        <h4>ตารางแสดงโครงการ/กิจกรรมการสั่งซื้อ</h4> 
                        @if (Auth::user()->status == "admin")
                            <small>สามารถกดดูรายละเอียดเพิ่มเติมที่ "รายละเอียด"</small>

                        @else
                            <small>สามารถกดดูรายละเอียดเพิ่มเติมที่ "รายละเอียด" หรือ เพิ่มโครงการ/กิจกรรมการสั่งซื้อ ได้ที่ปุ่มด้านข้างนี้</small>
                            &nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{ route('home.create') }}" ><i class="fas fa-plus-circle"> &nbsp; </i>เพิ่มโครงการ</a>

                        @endif
                       
                        <br><br>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">

        @if (Auth::user()->status == "admin")
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#project_private">โครงการ/กิจกรรมทั้งหมด</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#project_private"><i class="fas fa-file-contract">&nbsp; </i>โครงการ/กิจกรรมของคุณ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#project_public"><i class="fas fa-share-alt-square"> &nbsp; </i>โครงการ/กิจกรรมที่แชร์ร่วมกัน</a>
            </li>
        @endif
         
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="project_private" class="container tab-pane active" ><br>

                <div class="table-responsive">
                    <table class="table" id="project_datatable">
                        <thead>
                            <tr>
                                @if (Auth::user()->status == "admin")
                                    <th class="text-center">#</th>
                                    <th>ชื่อโครงการ</th>
                                    <th>เลขที่จัดซื้อ</th>
                                    <th>ฝ่ายงาน</th>
                                    <th>สร้างโดย</th>
                                    <th class="text-right">Actions</th>
                                @else
                                    <th class="text-center">#</th>
                                    <th>ชื่อโครงการ</th>
                                    <th>เลขที่จัดซื้อ</th>
                                    <th>ฝ่ายงาน</th>
                                    <th>สถานะ</th>
                                    <th class="text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        
                            @php
                                $i=1;
                            @endphp
        
                            @foreach ($Project_Queries as $item)
                                
                            <tr>
                                @if (Auth::user()->status == "admin")
                                    <td width="3%" class="text-center">{{ $i++ }}</td>
                                    <td width="37%">{{ $item->project_name }}</td>
                                    <td>{{ $item->project_number }}</td>
                                    <td width="10%">{{ $item->project_department }}</td>
                                    <td>{{ $item->name }}</td>
                                @else
                                    <td width="3%" class="text-center">{{ $i++ }}</td>
                                    <td width="37%">{{ $item->project_name }}</td>
                                    <td>{{ $item->project_number }}</td>
                                    <td width="10%">{{ $item->project_department }}</td>

                                    @if ( $item->project_status == 'private')
                                        <td width="10%"><i class="fas fa-key"></i> &nbsp; </i>{{ $item->project_status }}</td>  
                                    @else
                                        <td width="10%"  style="color:red"><i class="fas fa-share-alt-square" style="color:red"> &nbsp; </i>{{ $item->project_status }}</td>
                                    @endif
                                @endif

                                
                                    <td class="td-actions text-right">
                                    <form action="{{ route('home.destroy',$item->project_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            @if (Auth::user()->status == "admin")
                                                <a href="{{ route('home.show',$item->project_id) }}" class="btn btn-info btn-just-icon btn-sm">
                                                    <i class="fas fa-file-invoice"></i> รายละเอียด                                    
                                                </a>
                                            @else
                                                <a href="{{ route('home.show',$item->project_id) }}" class="btn btn-info btn-just-icon btn-sm">
                                                    <i class="fas fa-file-invoice"></i> รายละเอียด                                    
                                                </a>
                                                
                                                <a href="{{ route('home.edit',$item->project_id) }}" class="btn btn-success btn-just-icon btn-sm">
                                                    <i class="fas fa-edit"></i> แก้ไข
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal"><i class="far fa-trash-alt"></i></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="delete_modal">ลบโครงการ/กิจกรรม</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                               คุณแน่ใจที่จะลบโครงการนี้จริงๆ หรือไม่?
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                            <a href="#delete"><button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"> &nbsp; </i>ลบโครงการ</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>

                                    </td>
                            </tr>
        
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            
            </div>

            <div id="project_public" class="container tab-pane fade" ><br>

                <div class="table-responsive">
                    <table class="table" id="project_shared_datatable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>ชื่อโครงการ</th>
                                <th>เลขที่จัดซื้อ</th>
                                <th>ฝ่ายงาน</th>
                                <th>ห้างร้าน</th>
                                <th>เจ้าของโครงการ</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @php
                                $i=1;
                            @endphp
        
                            @foreach ($Project_public as $item)
                                
                            <tr>
                                <td width="3%" class="text-center">{{ $i++ }}</td>
                                <td width="37%">{{ $item->project_name }}</td>
                                <td>{{ $item->project_number }}</td>
                                <td>{{ $item->project_department }}</td>
                                <td width="10%">{{ $item->store_name }}</td>
                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#profile_modal"><i class="fas fa-id-card">&nbsp;</i>{{ $item->name }}</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="profile_modal" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="profile_modal">ข้อมูลของผู้ใช้ : {{ $item->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="fullname">ชื่อ-นามสกุล</label>
                                                        <input type="text" class="form-control" value="{{ $item->fullname }}" readonly style="background-color:white">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name">ชื่อผู้ใช้งาน</label>
                                                        <input type="text" class="form-control" value="{{ $item->name }}" readonly style="background-color:white">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="email">อีเมล</label>
                                                        <input type="text" class="form-control" value="{{ $item->email }}" readonly style="background-color:white">
                                                    </div>
                                                   
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                    <td class="td-actions text-right">
                                        <form action="{{ route('home.destroy',$item->project_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                            <a href="{{ route('home.show',$item->project_id) }}" class="btn btn-info btn-just-icon btn-sm">
                                                <i class="fas fa-file-invoice"></i> รายละเอียด                                    
                                            </a>
                                                
                                        </form>

                                    </td>
                            </tr>
        
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            
            </div>

        </div>
    </div>

</div>

<br><br><br><br><br>

<script>
    $(document).ready(function() {
        $('#project_datatable').DataTable({
            "ordering": false,
        });
    } );
    $(document).ready(function() {
        $('#project_shared_datatable').DataTable({
            "ordering": false,
        });
    } );
    
</script>


@endsection
