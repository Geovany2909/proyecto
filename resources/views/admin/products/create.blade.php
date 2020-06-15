@auth
@extends('admin.products.layouts.plantilla')

        <h1>Formulario de registro</h1>

        <div class="card">
            <div class="card-body px-lg-5">
            {!! Form::open(['action'=>'productsController@store','files'=>true],
            ['class'=>'text-center'])
            !!}

            <div class="md-form mt-3">
                {!! Form::label('name', 'name') !!}
                {!! Form::text('name', '' , ['class' => 'form-control'], ['placeholder' =>'Juan']) !!}
            </div>

            <div class="md-form">
                {!! Form::label('description', 'description') !!}
                {!! Form::text('description', '' , ['class' => 'form-control']) !!}
            </div>

            <div class="md-form">
                {!! Form::label('photo', 'photo') !!}
                {!! Form::file('photo', ['class'=>'form-control-file']) !!}
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"
            type="submit">
                Agregar producto
            </button>


        {!! Form::close() !!}
            </div>

        </div>

    </body>
</html>
@endauth
