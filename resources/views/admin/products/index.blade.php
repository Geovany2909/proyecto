@extends('admin.products.layouts.plantilla')

<body>
    @if(Session::has('usuario_eliminado'))
       <div class="alert alert-danger">
        {{ session('usuario_eliminado') }}
        </div>

    @endif

<h1 style="text-align: center; margin: 50px 0">Pagina incio</h1>
<table width="500" class="table table-bordered">
    <tr>
        <th scope="col">#</th>
        <th scope="col">foto</th>
        <th scope="col">name</th>
        <th scope="col">description</th>
        <th scope="col">creado</th>
        <th scope="col">actualizado</th>
        <th scope="col">Acciones</th>
    </tr>
    @if (isset($products))
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                @if ($product->photo)
                    <td><img src="/images/{{ $product->photo }}" width="150"/></td>
                @else
                 <td><img src="/images/url_foto_standar.jpg" width="130"/></td>
                @endif
                <td>{{ $user->name }}</td>
                <td>{{ $user->description }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}">
                        editar
                    </a>
                </td>
            </tr>
        @endforeach
    @endif

</table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
