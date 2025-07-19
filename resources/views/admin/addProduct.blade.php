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
                <form method="POST" action="{{ route('storproduct') }}" enctype="multipart/form-data">
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="col-form-label">أسم المنتج</label>
                            <input type="text" class="form-control" name="name" multiple id="inputCity">
                            <p class="p-validtor">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"  class="col-form-label">صنف المنتج</label>
                            <select id="inputState" name="parint" class="form-control">
                                @foreach ( $cat_Parint as $data )
                                <option value="{{ $data->id }}">{{ $data->name }}</option>

                                @endforeach

                            </select>

                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">الكمية</label>
                            <input type="text" class="form-control" name="qul" id="inputZip">
                            <p class="p-validtor">{{ $errors->first('qul') }}</p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">سعر المنتح الواحد</label>
                            <input type="text" class="form-control" name="price" id="inputZip">
                            <p class="p-validtor">{{ $errors->first('price') }}</p>
                        </div>
                    </div>
                    <div class="from-row">
                        <div class="form-group col-md-12">
                            <label for="inputZip" class="col-form-label">أضافة صوزة</label>
                            <input type="file" class="form-control" id="inputZip" name="image">
                            <p class="p-validtor">{{ $errors->first('image') }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">وصف المنتج</label>
                        <textarea class="form-control" name="disc" rows="4" placeholder="Address2.."></textarea>
                        <p class="p-validtor">{{ $errors->first('disc') }}</p>
                    </div>

                    <div class="form-group">
                        <div class="form-check pl-0">
                            <div class="checkbox checkbox-secondary"><input id="checkbox1" type="checkbox">
                                <label for="checkbox1"><span> I Agree !</span></label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ">أضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

