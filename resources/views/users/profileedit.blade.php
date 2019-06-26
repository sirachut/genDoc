@extends('documents.app')
   
@section('content')

<div class="container"><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ข้อมูลของผู้งาน</h5> <hr>  
                    <form method="post" action="{{ action('ProfileController@update', $id) }}">
                    @csrf
                    @method('PUT') 
                    @foreach ($getUserDetail as $item)
                    <p class="card-text">
                            <div class="row" >
                                <div class="form-group col-sm-4">
                                    <label for="">ชื่อ-นามสกุล <small color="red">*</small></label>
                                    <input type="text" name="fullname" class="form-control" value="{{ $item->fullname }}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Username</label>
                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                                    
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $item->email }}">
                                    <input type="text" name="password" class="form-control" value="{{ $item->password }}" hidden>

                                   
                                </div>

                            </div>
                        </p>
                        
                    @endforeach
                    <button class="btn btn-success" type="submit" style="float:right;">บันทึก</button> &nbsp;
                    <button class="btn btn" onclick="goBack()"  style="float:right;">ยกเลิก</button>

                    
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection