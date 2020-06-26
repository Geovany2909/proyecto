@auth
@extends('admin.products.layouts.pantilla')
    @section('title')
    create products
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
                            <i class="fa fa-dashboard"></i> Create products
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
                 {!! Form::open(['action'=>'productsController@store','files'=>'true']) !!}
                    @csrf
                    <div class="form-group">
                        <label>Name of product</label>
                        <input name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name" />
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value=" ">Seleccione una opcion </option>
                            <option value="Protesis">Protesis</option>
                            <option value="Ortesis">Ortesis</option>
                            <option value="Ortesis inferior">Ortesis inferior</option>
                            <option value="Protesis Superior">Protesis Superior</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Add Photo</label>
                        <input name="photo" type="file" accept="image/*" class="form-control-file" />
                    </div>

                    <div class="form-group">
                        <label>Description of product</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
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
