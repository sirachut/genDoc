@extends('documents.app')
   
@section('content')

<div class="container"><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ข้อมูลของผู้งาน</h5> <hr> 

                    
                    @foreach ($getUserDetail as $item)
                    <p class="card-text">
                            <div class="row" >
                                <div class="form-group col-sm-4">
                                    <label for="">ชื่อ-นามสกุล</label>
                                    <p class="form-control" d>{{ $item->fullname }}</p>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Username</label>
                                    <p class="form-control">{{ $item->name }}</p>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Email</label>
                                    <p class="form-control">{{ $item->email }}</p>
                                </div>
                                
                            </div>
                        </p>
                        
                    @endforeach
                    <a href="{{ route('profile.edit',$item->id) }}" class="btn btn-success btn-just-icon btn-sm" style="float:right;">
                        <i class="fas fa-edit"></i> แก้ไข
                    </a>

                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection