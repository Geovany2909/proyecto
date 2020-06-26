@auth
@extends('admin.users.layouts.pantilla')
    @section('title')
    Create Users
    @endsection

    @section('content')
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>
                                Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Create Users
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                 {!! Form::open(['action'=>'usersController@store','files'=>'true']) !!}
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input name="name"    value="{{ old('name') }}" class="form-control" placeholder="Enter name" />
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Enter email" />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Enter pass" />
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password"  name="repeat_password" class="form-control" placeholder="Enter pass" />
                    </div>

                    <div class="form-group">
                        <label>Add photo</label>
                        <input name="photo" type="file" accept="image/*" class="form-control-file" />
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-success">
                            Add Product
                        </button>
                        <button type="reset" class="btn btn-warning">
                            Reset
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection

@endauth
