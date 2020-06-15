@auth

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
        @foreach ($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            @if ($p->photo)
            <td><img src="/images/{{ $p->photo }}" width="150" /></td>
            @else
            <td><img src="/images/url_foto_standar.jpg" width="130" /></td>
            @endif
            <td>{{ $p->name }}</td>
            <td>{{ $p->description }}</td>
            <td>{{ $p->created_at }}</td>
            <td>{{ $p->updated_at }}</td>
            <td>
                <a href="{{ route('products.edit', $p->id) }}">
                    editar
                </a>
            </td>
        </tr>
        @endforeach
        @endif

    </table>
    <!-- solo son ejemplos -->
    @if (isset($products))
    @foreach ($products as $p)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($p->photo)
                <img src="/images/{{ $p->photo }}" width="150" class="card-img" />
                @else
                <img src="/images/url_foto_standar.jpg" width="130" class="card-img" />
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->name }}</h5>
                    <p class="card-text">{{ $p->description }}</p>
                    <p class="card-text"><small class="text-muted">{{ $p->create_at }}</small></p>
                    <p class="card-text"><small class="text-muted">{{ $p->update_at }}</small></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>

@endauth
