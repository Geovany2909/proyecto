<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Usuario  </h1>

{!! Form::model($user,['method'=>'PATCH','action'=>['adminUsersController@update',$user->id],'files'=>true]) !!}
    <table width="500" >
        <tr>
           <img src="/images/{{ $user->foto ? $user->foto->ruta_foto : 'url_foto_standar.jpg' }}" width="150"/>
        </tr>
        <tr>
            <td colspan="2">
                {!! Form::file('foto_id'); !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('role_id', 'Rol'); !!}
            </td>
            <td>
                {!! Form::text('role_id'); !!}
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
                {!! Form::label('email', 'correo Electronico:'); !!}
            </td>
            <td>
                {!! Form::text('email'); !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('email', 'Verificar Correo Electronico:'); !!}
            </td>
            <td>
                {!! Form::text('nara'); !!}
            </td>
        </tr>

        <tr>
            <td>
                {!! Form::submit('Modificar Usuario') !!}
            </td>
            <td>
                {!! Form::reset('borrar') !!}
            </td>
        </tr>

    </table>



{!! Form::close() !!}

<div class="alert alert-danger" onclick="alert('Desea eliminar el usuario?')">
{!! Form::model($user,['method'=>'DELETE','action'=>['adminUsersController@destroy',$user->id]]) !!}
 {!! Form::submit('Eliminar Usuario') !!}
{!! Form::close() !!}
</div>


</body>
</html>
