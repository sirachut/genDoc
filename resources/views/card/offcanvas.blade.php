
  <h4>ตารางแสดงเอกสารฟอร์มซื้อ</h4>
  <div class="row">
  <div class="col-sm-12 my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">สร้างล่าสุด</h6>

    @foreach ($project_n_Q as $value)

    <form id="for_delete" class="form-horizontal" method="POST" action="{{ route('home.destroy',$value->project_id) }}" >

        @csrf
        @method('DELETE')
    <div class="media text-muted pt-3">
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">@โครงการ : {{ $value->project_name }}</strong>
         

          <span>
            <a href="{{ route('home.show', $value->project_id) }}" class="btn btn-info btn-sm"><i class="fas fa-file-invoice"></i> รายละเอียด</a>
            <a class="btn btn-success btn-sm" style="color:white; text-decoration:none;" href="{{ route('home.edit', $value->project_id) }}"><i class="far fa-edit"></i>&nbsp;แก้ไข</a>
            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

            
          </span>
         
          
        </div>
        <span class="d-block">วันที่: 
            @php
              echo App\Http\Controllers\DocumentController::DateThai($value->project_datein);
            @endphp
        </span>
        <span class="d-block">ฝ่ายงาน: {{ $value->project_department }} || กลุ่มสาระ: {{ $value->project_subject }}</span>
        

      </div>
    </div>
  </form>

    @endforeach
  </div>
</div>

{{-- <script>

  
  var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
</script> --}}
