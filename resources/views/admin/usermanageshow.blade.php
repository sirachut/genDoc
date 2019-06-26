@extends('documents.app')

@section('content')
<div class="container"><br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ข้อมูลผู้ใช้งาน</h5>
            <p class="card-text">
                <div class="row" >
                    <div class="form-group col-sm-4">
                        <label for="">ชื่อ-นามสกุล</label>
                        <p class="form-control">{{ $getUserDetail->fullname }}</p>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Username</label>
                        <p class="form-control">{{ $getUserDetail->name }}</p>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Email</label>
                        <p class="form-control">{{ $getUserDetail->email }}</p>
                    </div>
                    {{-- <div class="form-group col-sm-12">
                        <label for="">Password</label>
                        <p class="form-control">{{ $getUserDetail->password }}</p>
                    </div> --}}
                </div>
            </p>
        </div>
       
    </div><br>
    <div class="card col-sm-12">
        <div class="card-body">
            <h5 class="card-title">ห้างร้าน ที่ผู้ใช้งานกำกับอยู่</h5><hr>

            @php
                $i=1;
            @endphp
            <div class="table-responsive">
                <table class="table" id="store_datatable">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="30%">ชื่อห้างร้าน</th>
                            <th width="15%">เบอร์โทรติดต่อ</th>
                            <th>ที่อยู่</th>
                            <th>สถานะ</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getStore as $item)
                        @if ($item->status=='s')
                            @php
                                $status="ปกติ"
                            @endphp
                        @else
                            @php
                                $status="ถูกลบโดยผู้ใช้"
                            @endphp
                        @endif
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->store_name }}</td>
                            <td>{{ $item->store_tel }}</td>
                            <td>{{ $item->store_address }}</td>
                            <td>{{ $status }}</td>
                            <td><a href="{{ route('storemanage.show', $item->store_id) }}" class="btn btn-info btn-sm"><i class="fas fa-file-invoice"> ดูรายละเอียด</i></a></td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
            

        </div>
    </div><br>

    <div class="card col-sm-12">
        <div class="card-body">
            <h5 class="card-title">โครงการ/กิจกรรม ที่ผู้ใช้งานกำกับอยู่</h5><hr>
            @php
                $i=1;
             @endphp
        <div class="table-responsive">
            <table class="table" id="project_datatable">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="40%">ชื่อโครงการ/กิจกรรม</th>
                        <th width="10%">ฝ่ายงาน</th>
                        <th width="10%">กลุ่มสาระ</th>
                        <th width="20%">เมื่อวันที่</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getProject as $project)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ $project->project_department }}</td>
                        <td>{{ $project->project_subject }}</td>
                        <td>
                            @php
                                echo App\Http\Controllers\DocumentController::DateThai($project->project_datein);
                            @endphp
                        </td>
                        <td><a href="{{ route('home.show', $project->project_id) }}" class="btn btn-info btn-sm"><i class="fas fa-file-invoice"> ดูรายละเอียด</i></a></td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        </div>

    </div>


</div><br><br><br>

<script>
    $(document).ready(function() {
        $('#store_datatable').DataTable({
            "ordering": false,
        });
    } );

    $(document).ready(function() {
        $('#project_datatable').DataTable({
            "ordering": false,
        });
    } );
</script>
@endsection