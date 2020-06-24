@auth
@extends('admin.layouts.pantilla')
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


    		<div class="col-md-4 text-center" style="margin: 0 auto; float: none; margin-bottom: 10%">
    		    <div class="card profile-card-1">
    		        <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb" alt="profile-sample1" class="background"/>
    		        <img src="/images/{{ auth()->user()->photo ? auth()->user()->photo : 'user-photo-default.png' }}" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>{{ auth()->user()->name }}<small>Admin</small></h2>
                    <h5><small>{{ auth()->user()->email }}</small></h5>
                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
            </div>


 </div>

</div>
@endsection

@endauth
