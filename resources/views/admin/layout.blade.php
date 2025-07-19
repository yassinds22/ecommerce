
@extends('admin.index')
@section('call')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">

        <!--Page-Header-->
        <div class="page-header">
            <h4 class="page-title">Dashboard 02</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard 02</li>
            </ol>
        </div>
        <!--/Page-Header-->
        @yield('content')


    </div>
</div>
@endsection()


