@auth
@extends('admin.products.layouts.pantilla')
@section('title')
    List of product
@endsection
    @section('content')
        <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Products</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> List of Products</li>
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
                                <td>{{ date('d-M-Y', strtotime($product->created_at)) }}</td>
                                <td>{{ date('d-M-Y', strtotime($product->updated_at)) }}</td>
                                <td>

                                   <div>
                                        <a href="{{ route('products.edit', $product->id) }}" class="edit" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="{{ route('products.destroy', $product->id) }}" class="delete" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="delete">&#xE872;</i></a>
                                   </div>
                                </td>
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
