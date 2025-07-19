@extends('admin.layout')

@section('content')
<style>
    .p-validtor{
        color: red;
        padding: 5px;
        font-size: 12px;

    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Form row</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('storCatgory') }}" enctype="multipart/form-data">

                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label">اسم الصنف</label>
                            <input  type="text" class="form-control"   name="name" id="inputCity">
                            {{-- <p class="p-validtor">{{ $errors->first('name') }}</p> --}}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState" class="col-form-label">نوع الصنف</label>
                            <select id="inputState" class="form-control" value="{{ old('parint') }}" name="parint">
                                <option value="0">الرئسية</option>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip" class="col-form-label">أضافة صورة</label>
                            <input type="file" value="{{ old('image') }}"  class="form-control"  id="inputZip" name="image" >
                            {{-- <p class="p-validtor">{{ $errors->first('image') }}</p> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">الوصف</label>
                        <textarea class="form-control"   rows="4"   name="disc"></textarea>
                        {{-- <p class="p-validtor">{{ $errors->first('disc') }}</p> --}}
                    </div>

                    <div class="form-group">
                        <div class="form-check pl-0">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ">أضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

