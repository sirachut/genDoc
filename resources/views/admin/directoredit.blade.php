@extends('documents.app')

@section('content')

<div class="container">
  <br>
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">ข้อมูลบุคลากรโรงเรียนบ้านเทอดไทย</h4>
          <small class="card-subtitle mb-2 text-muted">เป็นข้อมูลบุคลากร ที่เป็นค่าเริ่มต้น (Default) ในแต่ละโครงการ/กิจกรรม</small>

          <form method="post" action="{{ action('DirectorController@update', $id) }}">
            @csrf
            @method('PUT')

            <p class="card-text"><br>
            @foreach ($getDirector as $item)

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">เจ้าหน้าที่ตรวจรับ</label>
                        <input type="text" class="form-control" name="teacher_getproduct_name" value="{{ $item->teacher_getproduct_name }}" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">ตำแหน่งของเจ้าหน้าที่ตรวจรับ</label>
                        <input type="text" class="form-control col-sm-6" name="teacher_rank" value="{{ $item->teacher_rank }}" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="">เจ้าหน้าที่พัสดุ</label>
                        <input type="text" class="form-control" name="parcelcheck_name" value="{{ $item->parcelcheck_name }}" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="">หัวหน้าเจ้าหน้าที่พัสดุ</label>
                        <input type="text" class="form-control" name="headerparcel_name" value="{{ $item->headerparcel_name }}" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</label>
                        <input type="text" class="form-control" name="director_name" value="{{ $item->director_name }}" required>
                    </div>
                </div>
            
            @endforeach
            </p>

            <button class="btn btn-success" type="submit">บันทึก</button>
            <button class="btn btn" onclick="goBack()">ยกเลิก</button>


        </form>

         
        </div>
    </div>

</div>


<script>
function goBack() {
  window.history.back();
}
</script>

    

@endsection