@extends('documents.app')

@section('content')

<div class="container">
  <br>
  @foreach ($getDirector as $item)
    <div class="card">
      
        <form action="{{ route('director.destroy',$item->director_id) }}" method="POST">

        <div class="card-body">
          <h4 class="card-title">ข้อมูลบุคลากรโรงเรียนบ้านเทอดไทย</h4>
          <small class="card-subtitle mb-2 text-muted">เป็นข้อมูลบุคลากร ที่เป็นค่าเริ่มต้น (Default) ในแต่ละโครงการ/กิจกรรม</small>


          <p class="card-text"><br>

              <div class="row">
                <div class="form-group col-sm-6">
                    <label for="">เจ้าหน้าที่ตรวจรับ</label>
                    <input type="text" class="form-control" value="{{ $item->teacher_getproduct_name }}" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">ตำแหน่งของเจ้าหน้าที่ตรวจรับ</label>
                    <input type="text" class="form-control col-sm-6" value="{{ $item->teacher_rank }}" disabled>
                </div>
                <div class="form-group col-sm-12">
                    <label for="">เจ้าหน้าที่พัสดุ</label>
                    <input type="text" class="form-control" value="{{ $item->parcelcheck_name }}" disabled>
                </div>
                <div class="form-group col-sm-12">
                    <label for="">หัวหน้าเจ้าหน้าที่พัสดุ</label>
                    <input type="text" class="form-control" value="{{ $item->parcelcheck_name }}" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">ผู้อำนวยการโรงเรียนบ้านเทอดไทย</label>
                    <input type="text" class="form-control" value="{{ $item->director_name }}" disabled>
                </div>
               


              </div>
          </p>
          <a href="{{ route('director.edit',$item->director_id) }}" class="btn btn-success btn-just-icon btn-sm">
              <i class="fas fa-edit"></i> แก้ไข
          </a>
         
        </div>
        </form>
      </div>
  @endforeach

</div>

    

@endsection