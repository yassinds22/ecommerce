

@extends('admin.layout')

@section('content')



<div class="row">

    <div class="col-md-12 col-lg-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Border Table</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered border-top mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>نوع الصنف</th>
                                <th>الوصف</th>
                                <th>الصورة</th>
                                <th>الحذف</th>
                                <th>التعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCatgory as $data )
                             <tr>
                                <th>{{ $data->id }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->parint }}</td>
                                <td>{{ $data->discrption }}</td>
                                <td><img src="{{ $data->getMedia("images")->first()?->getUrl()}}" width="50"  height="50"></td>

                                <td><a href="editCatgory/{{ $data->id }}"><img src="assets/images/admin/edit.png" width="30"></a></td>
                                <td><a href="{{ $data->id }}" data-toggle="modal" data-target="#deleteModal" data-item-id="1"><img src="assets/images/admin/delete.png" width="30"></a></td>

                            </tr>


{{-- <!-- نافذة التأكيد (Modal) --> --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تأكيد الحذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                هل أنت متأكد أنك تريد حذف هذا العنصر؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>

                    @method('DELETE')
                    <a  href="deleteRecordCatgory/{{ $data->id }}" class="btn btn-danger">حذف</a>

            </div>
        </div>
    </div>
</div>

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // الزر الذي فتح النافذة
        var itemId = button.data('item-id'); // استخراج ID العنصر

        var modal = $(this);
        var actionUrl = '/items/' + itemId; // عنوان الحذف

        modal.find('#deleteForm').attr('action', actionUrl);
    });
</script>

                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>




</div>


@endsection
