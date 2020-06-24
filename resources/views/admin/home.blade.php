@auth
@extends('admin.users.layouts.pantilla')
    @section('title')
    Inicio
    @endsection

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                    </ol>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ auth()->user()->name }}
                    </div>
                </div>
            </div>

 </div>

</div>
@endsection

@endauth
