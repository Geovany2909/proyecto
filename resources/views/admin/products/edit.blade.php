@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar producto  </h1>

{!! Form::model($product,['method'=>'PATCH','action'=>['productsController@update',$product->id],'files'=>true]) !!}
     <table width="500" >
        <tr>
           <img src="/images/{{ $product->photo ? $product->photo : 'url_foto_standar.jpg' }}" width="150"/>
        </tr>
        <tr>
            <td colspclan="2">
                {!! Form::file('photo'); !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('name', 'Nombre:'); !!}
            </td>
            <td>
                {!! Form::text('name'); !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('descripcion', 'Descripcion:'); !!}
            </td>
            <td>
                {!! Form::text('description'); !!}
            </td>
        </tr>

        <tr>
            <td>
                {!! Form::submit('Modificar producto') !!}
            </td>
            <td>
                {!! Form::reset('borrar') !!}
            </td>
        </tr>

    </table>  



{!! Form::close() !!}
{{--
<div class="alert alert-danger" onclick="alert('Desea eliminar el usuario?')">
{!! Form::model($user,['method'=>'DELETE','action'=>['adminUsersController@destroy',$user->id]]) !!}
 {!! Form::submit('Eliminar Usuario') !!}
{!! Form::close() !!}
</div>  --}}


</body>
</html>

@endauth
