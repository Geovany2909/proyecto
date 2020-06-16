@auth
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Products</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Products</b></h2>
					</div>
					<div class="col-sm-6">
						 <a href="{{ route('products.create') }}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Name</th>
                        <th>description</th>
						<th>created</th>
                        <th>updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($products))
                        @foreach($products as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>
                                @if($p->photo)
                                    <img src="/images/{{ $p->photo }}" class="img-thumbnail card"
                                    style="margin: 0 auto" width="140" height="80"/>
                                @else
                                    <img src="/images/product-photoless-standart.png" class="img-thumbnail card"
                                    style="margin: 0 auto" width="100" height="60"/>
                                @endif
                            </td>
                            <td>{{ $p->name}}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->created_at }}</td>
                            <td>{{ $p->updated_at }}</td>
                            <td>
                                <a href="{{ route('products.edit', $p->id) }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                               <div>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['productsController@destroy', $p->id]]) !!}
                                    {{ csrf_field() }}

                                    <button onclick=""
                                    class="delete alert-heading alert-danger" style="border: hidden; color:rgb(246, 38, 38); background-color: #fff;" data-toggle="modal" type="submit"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>

                                    {!! Form::close() !!}
                               </div>

                            </td>
                        </tr>
                        @endforeach
                     @endif
                </tbody>
            </table>
        </div>
    </div>

{{--
<div class="alert alert-danger" onclick="alert('Desea eliminar el usuario?')">
{!! Form::model($user,['method'=>'DELETE','action'=>['adminUsersController@destroy',$user->id]]) !!}
 {!! Form::submit('Eliminar Usuario') !!}
{!! Form::close() !!}
</div>  --}}
</body>
</html>
@endauth
