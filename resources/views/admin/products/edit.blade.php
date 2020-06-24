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
                            <i class="fa fa-dashboard"></i> Edit product
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
                 {!! Form::model($product,['method'=>'PATCH','action'=>['productsController@update',$product->id],'files'=>true]) !!}
                 @csrf
                    <div class="form-group mx-auto d-block">
                        <img style="margin-left: 38%;"
                            src="/images/{{ $product->photo ? $product->photo : 'product-photoless-standart.png' }}"
                            width="160" height="100" alt="" />
                    </div>

                    <div class="form-group">
                        <label>Name of product</label>
                        <input class="form-control" value="{{ $product->name }}" placeholder="Enter name" />
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select  class="form-control">
                            <option value="{{ $product->category }}">{{ $product->category }}</option>
                            <option value="Protesis">Protesis</option>
                            <option value="Ortesis">Ortesis</option>
                            <option value="Ortesis inferior">Ortesis inferior</option>
                            <option value="Protesis Superior">Protesis Superior</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><strong>Foto actual "{{ $product->photo }}"</strong>, Modificar?</label>
                        <input type="file" placeholder="" class="form-control" accept="image/*" />
                    </div>

                    <div class="form-group">
                        <label>Description of product</label>
                        <textarea class="form-control" rows="3">{{ $product->description }}</textarea>
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
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @endsection
  @endauth
