@auth
@extends('admin.products.layouts.plantilla')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
             {!! Form::open(['action'=>'productsController@store','files'=>'true']) !!}
                <h3>Insert a new product</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::text('name', '' , ['required','class' => 'form-control','placeholder'=>'Nombre*']) !!}
                        </div>
                        <div class="form-group">
                      {!! Form::select('category',
                       [
                            ''=>'Seleccione una categoria',
                            'Ortesis' => 'Ortesis',
                            'Protesis' => 'Protesis'],
                       null,
                      ['class'=>'form-control', 'required'] ) !!}
                        </div>
                        <div class="form-group custom-file">
                           {!! Form::file('photo', ['class'=>'custom-file-input form-control']) !!}
                            <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                        </div>

                        <div class="form-group" style="margin-top: 5%">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Add New Product!" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Descripcion*', ]) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
</div>
@endauth
