@auth
@extends('admin.users.layouts.pantilla')
    @section('title')
    Delete
    @endsection

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><i class="fa fa-trash-o"></i> Delete Product</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center" style="margin: 0 auto; float: none; margin-bottom: 5%">
    		    <div class="card profile-card-1">
    		        <img src="https://i.pinimg.com/236x/9b/51/78/9b5178a8a761a2536322e6ca75c74240--wallpapers-android-backgrounds-wallpapers.jpg" alt="profile-sample1" class="background"/>
    		        <img src="/images/{{  $product->photo ? $product->photo : 'product-photoless-standart.png' }}" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h4>name: {{ $product->name }}</h4>
                     <h5>Created: {{ date('d-M-Y', strtotime($product->created_at)) }}</h5>
                     <h5>Updated: {{ date('d-M-Y', strtotime($product->updated_at)) }}</h5>
                    <div class="icon-block">
                        {!! Form::open(['method'=>'DELETE','id'=>'delete-form', 'action'=>['productsController@destroy', $product->id]]) !!}
                                                @csrf
                        <button class="btn btn-danger">
                            Delete Product
                        </button>
                        {!! Form::close() !!}
                    </div>
                    </div>
                </div>
            </div>

</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endauth
