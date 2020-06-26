@auth
@extends('admin.products.layouts.pantilla')
@section('title')
    List of product
@endsection
    @section('content')
            {{--  @if(Session::has('notice'))
            <p> <strong> {{ Session::get('notice') }} </strong> </p>
            @endif  --}}
        <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        @if (session('noticeA'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('noticeA') }}
                        </div>
                        @elseif(session('noticeU'))
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('noticeU') }}
                        </div>
                        @elseif(session('noticeD'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('noticeD') }}
                        </div>
                        @endif
                    </div>
                    <h1>Products</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> List of Products</li>
                        <button class="btn btn-danger" onclick="swal('Good job!', 'You clicked the button!', 'success');">prueb</button>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2>Manage <b>Products</b></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> </th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img src="/images/{{ $product->photo ? $product->photo : 'product-photoless-standart.png'  }}"
                                        width="100" height="100" alt="">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td> {{ $product->updated_at }}</td>
                                <td>

                                                 <a href="{{ route('products.edit', $product->id) }}" class="edit" data-toggle="modal"><i
                                                        class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                            | &nbsp;
                                                            <a href="{{ route('products.destroy', $product->id) }}" class="delete" data-toggle="modal"><i
                                                        class="material-icons" data-toggle="tooltip" title="delete">&#xE872;</i></a>
                                                {{--  <a href="{{ route('products.destroy', $product->id) }}" onclick="event.preventDefault();
                                                    document.getElementById('delete-form').submit();" class="delete" data-toggle="modal"><i
                                                    class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>  --}}

                                </td>
                                 {{--  {!! Form::open(['method'=>'DELETE','id'=>'delete-form', 'action'=>['productsController@destroy', $product->id]]) !!}
                                                @csrf
                                {!! Form::close() !!}  --}}
                            </tr>
                            @empty
                                @section('Mensaje')
                                <p class="text-center" style="color: red; font-size: 160%;"><b>Aun no hay productos</b></p>
                                @endsection
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /#page-wrapper -->

    @endsection

@endauth
