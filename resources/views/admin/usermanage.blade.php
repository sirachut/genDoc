@extends('documents.app')

@section('content')

<div class="container"><br>
    <div class="card">

        <div class="card-body">
            <h4 class="card-title">ตารางแสดงข้อมูลของผู้ใช้งานทั่วไป</h4>
            <small class="card-subtitle mb-2 text-muted">ข้อมูลของผู้ใช้งานทั่วไป ที่มีอยู่ในระบบ</small> <hr>

            @php
                $i=1;
            @endphp


            <div class="table-responsive">
                <table class="table" id="usermanage_datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getUser as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>ทดสอบ</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td> 
                                    <a href="{{ route('usermanage.show',$item->id) }}" class="btn btn-info btn-just-icon btn-sm">
                                        <i class="fas fa-file-invoice"></i> ดูรายละเอียด                                    
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#usermanage_datatable').DataTable({
            "ordering": false,
        });
    } );
</script>


@endsection