@auth
@extends('admin.products.layouts.plantilla')

<!-- Material form subscription -->
<div class="card px-lg-5">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Register one product!</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 px-0">

        <!-- Form -->
            {!! Form::open(['action'=>'productsController@store','files'=>'true'],['class'=>'text-center']) !!}
                <div class="md-form">
                    <p class="text-center font-weight-bold">Insert a new Product</p>

                <p class="text-center">
                    <a href="{{ route('products.index') }}" class="text-center" >Back to Home!</a>
                </p>
                </div>

                <!-- Name -->
                <div class="md-form mt-3">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', '' , ['class' => 'form-control']) !!}
                </div>

                <!-- description -->
                <div class="md-form mt-3">
                    {!! Form::label('description', 'Description: ') !!}
                    {!! Form::text('name', '' , ['class' => 'form-control']) !!}
                </div>
                <!-- photo -->
                <div class="md-form">
                    <div class="custom-file">
                    {!! Form::file('photo', ['class'=>'custom-file-input']) !!}
                    <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                    </div>
                </div>
                <!-- save in button -->
                <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Save Product</button>

        {!! Form::close() !!}

    </div>

    </div>
</body>
</html>
@endauth
