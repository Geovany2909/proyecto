<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Productos</title>
    </head>
    <body>
        <h1>Formulario de registro</h1>

        {!! Form::open(['action'=>'productsController@store', 'files'=>true])
        !!}
        <table width="500">
            {!! Form::token() !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre: ') !!}
                {!! Form::text('name','jeans', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Descripcion: ') !!}
                {!! Form::text('description', 'nuevo jean', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo', 'Imagen: ') !!}
                {!! Form::file('photo','', ['class' => 'form-control']) !!}
            </div>

            {{--
            <tr>
                <td>
                    {!! Form::submit('Crear Usuario') !!}
                </td>
                <td>
                    {!! Form::reset('borrar') !!}
                </td>
            </tr>
            --}}
            <button class="btn btn-success" type="submit">
                Agregar producto
            </button>
        </table>

        {!! Form::close() !!}
    </body>
</html>
