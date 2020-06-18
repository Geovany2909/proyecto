@auth
@extends('admin.products.layouts.plantilla')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container contact-form border border-primary rounded" id="form">
     {!! Form::model($product,['method'=>'PATCH','action'=>['productsController@update',$product->id],'files'=>true]) !!}
            <div class="contact-image">
                <img src="/images/{{ $product->photo ? $product->photo : 'product-photoless-standart.jpg' }}"
            </div>
            {!! Form::close() !!}
            {!! Form::model($product,['method'=>'PATCH','action'=>['productsController@update',$product->id],'files'=>true]) !!}
                <h3>Edit this product with id {{ $product->id }}</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::text('name', $product->name , ['required','class' => 'form-control','placeholder'=>'Nombre*']) !!}
                        </div>
                        <div class="form-group">
                      {!! Form::select('category',
                       [
                            $product->category => $product->category,
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
                            <input type="submit" name="btnSubmit" class="btnContact" value="Edit This product!" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::textarea('description', $product->description, ['class'=>'form-control', 'placeholder'=>'Descripcion*', ]) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
</div>
@endauth
