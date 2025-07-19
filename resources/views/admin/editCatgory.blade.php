@extends('admin.layout')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Form row</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('updatecatgory',$data->id) }}"  enctype="multipart/form-data">
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label">اسم الصنف</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState" class="col-form-label">نوع الصنف</label>
                            <select id="inputState" class="form-control" name="parint">
                                <option  value="0">الرئسية</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip" class="col-form-label">أضافة صورة</label>
                            <input type="file" class="form-control" name="image" id="inputZip" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">الوصف</label>
                        <textarea class="form-control"   rows="4" placeholder="Address2.."  name="discrption" > {{ $data->discrption }}</textarea>
                    </div>

                    <div class="form-group">
                        <div class="form-check pl-0">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ">تعديل</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

