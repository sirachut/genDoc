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
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#new_doc">โครงการ/กิจกรรม</a>
            </li>
         
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="new_doc" class="container tab-pane active" ><br>

                <div class="table-responsive">
                    <table class="table" id="project_datatable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>ชื่อโครงการ</th>
                                <th>ฝ่ายงาน</th>
                                <th>กลุ่มสาระ</th>
                                <th>เมื่อวันที่</th>
                                @if (Auth::user()->name == "admin")
                                    <th>สร้างโดย</th>
                                @endif
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @php
                                $i=1;
                            @endphp
        
                            @foreach ($project_n_Q as $item)
                                
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $item->project_name }}</td>
                                <td>{{ $item->project_department }}</td>
                                <td width="35%">{{ $item->project_subject }}</td>
                                <td>  
                                    @php
                                        echo App\Http\Controllers\DocumentController::DateThai($item->project_datein);
                                    @endphp
                                </td>
                                @if (Auth::user()->name == "admin")
                                    <td>{{ $item->name }}</td>
                                @endif
        
                                <form action="{{ route('home.destroy',$item->project_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td class="td-actions text-right">

                                        @if (Auth::user()->name == "admin")
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
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                        @endif
                                    </td>
                                </form>
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
</script>

@endsection
