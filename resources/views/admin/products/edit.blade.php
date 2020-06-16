@auth
@extends('admin.products.layouts.plantilla')
<!-- Material form subscription -->
<div class="card px-lg-5">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Edit product product!</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 px-0">

        <!-- Form -->
        {!! Form::model($product,['method'=>'PATCH','action'=>['productsController@update',$product->id],'files'=>true]
        ,['class'=>'text-center']) !!}

        <div class="md-form">
            <p class="text-center font-weight-bold">Edit this Product</p>

            <p class="text-center">
                <a href="{{ route('products.index') }}" class="text-center">Back to Home!</a>
            </p>
        </div>
        <!-- photo -->
        <div class="md-form ">
             <img src="/images/{{ $product->photo ? $product->photo : 'url_foto_standar.jpg' }}"
             class="img-thumbnail card" style="margin: 0 auto" width="100" height="100"/>
        </div>
        <!-- Name -->
        <div class="md-form mt-3">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', $product->name , ['class' => 'form-control']) !!}
        </div>

        <!-- description -->
        <div class="md-form mt-3">
            {!! Form::label('description', 'Description: ') !!}
            {!! Form::text('description', $product->description , ['class' => 'form-control']) !!}
        </div>
        <!-- photo -->
        <div class="md-form " >
            <div class="alert alert-warning  alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Si desea modificar la foto seleccione una nueva a continuacion.</strong>
            </div>
            <div class="custom-file">
                {!! Form::file('photo',['class'=>'custom-file-input']) !!}
                <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
            </div>
        </div>
        <!-- save in button -->
        {{-- <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Save Product</button> --}}
        <div class="md-form text-center">
             {!! Form::submit('Save Product', ['class'=>'btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect']) !!}
        </div>
       {!! Form::close() !!}

    </div>

</div>
@endauth
