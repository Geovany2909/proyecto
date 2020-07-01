@auth
    @extends('admin.products.layouts.pantilla')
    @section('title')
    Edit product
    @endsection
    @section('content')
     <div id="wrapper">
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
                            <i class="fa fa-dashboard"></i> Edit user
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
                 {!! Form::model($users,['method'=>'PATCH','action'=>['usersController@update',$users->id],'files'=>true]) !!}
                 @csrf
                    <div class="form-group mx-auto d-block">
                        <img style="margin-left: 38%;"
                            src="/images/{{ $users->photo ? $users->photo : 'user-photo-default.png' }}"
                            width="130" height="100" alt="" />
                    </div>

                    <div class="form-group">
                        <label>UserName</label>
                        <input class="form-control" value="{{ $users->name }}" name="name" placeholder="Enter name" />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $users->email }}" placeholder="Enter name" />
                    </div>

                    <div class="form-group">
                        @if($users->photo)
                            <label><strong>Foto actual "{{ $users->photo }}"</strong>, Modificar?</label>
                            @else
                            <label><strong>Add photo ?</label>
                        @endif
                        <input type="file" placeholder="" name="photo" class="form-control" accept="image/*" />
                    </div>


                    <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-success">
                        Edit Product
                    </button>
                    <button type="reset" class="btn btn-warning">
                        Reset
                    </button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection
  @endauth
