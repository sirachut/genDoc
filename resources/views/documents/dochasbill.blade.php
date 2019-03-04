{{-- <h3>แสดงเอกสารที่ดำเนินการเสร็จแล้ว</h3>
<table class="table" id="table">
    <thead>
        <tr >
            <th>#</th>
            <th>กิจกรรม/โครงการ</th>
            <th>ฝ่ายงาน</th>
            <th>วันที่รับเข้า</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1;
        @endphp

        @foreach ($documentsD as $key => $value)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $value->project_name }}</td>
            <td style="width: 40%">{{ $value->project_department }}</td>
            <td>{{ $value->create_at }}</td>
            <td>
                <form action="" method="post">

                </form>
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#table').DataTable( {
            "bFilter" : false,
            "bLengthChange": false,
            "searching": true,
        });
    } );
</script> --}}