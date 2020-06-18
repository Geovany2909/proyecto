<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
	<title>User Information and Form</title>

	<!--JQUERY-->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script
		src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<!-- Los iconos tipo Solid de Fontawesome-->
	<link rel="stylesheet"
		href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

	<!-- Nuestro css-->
    <link rel="stylesheet" href="{{ asset('css/prueba.css') }}">
    <script src="{{ asset('js/laravel.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //Asegurate que el id que le diste a la tabla sea igual al texto despues del simbolo #
        $('#userList').DataTable();
    } );
</script>
</head>
<body>
    <!-- Mucho mucho codigo aqui-->
<div class="container">
      @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif

		<div class="tab-content" id="myTabContent"  style="margin-top: 5%;">
			<div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
            <div class="card">
            <div class="card-header">
                <h4>Lista de Productos</h4>
            </div>
            <div class="card-body" style="">
                <div class="table-responsive">
                    <table id="userList" class="table table-bordered table-hover table-striped">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Creado</th>
                                <th scope="col">Actualizado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if ($products->count())
                                 @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>
                                            @if ($product->photo)
                                            <img src="/images/{{ $product->photo }}" class="card-img">
                                            @else
                                                <img src="/images/product-photoless-standart.png    " class="card-img">
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td >{{ $product->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}"><i class="fas fa-edit"></i></a> |

                                                {!! Form::open(['method'=>'DELETE', 'action'=>['productsController@destroy', $product->id]]) !!}
                                                @csrf
                                                
                                                 <button class="delete alert-heading alert-danger"
                                                 style="border: 0; border-radius: 50%; color:rgb(246, 38, 38); "
                                                  data-toggle="modal" type="submit">
                                                  <i class="fas fa-trash"></i>
                                                </button>

                                                {!! Form::close() !!}
                                                </div>
                                            </a>


                                        </td>
                                    </tr>
                                 @endforeach
                                @endif
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
		</div>
	</div>
</div>
</body>
</html>
