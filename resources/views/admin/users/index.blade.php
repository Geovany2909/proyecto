@auth
@extends('admin.products.layouts.pantilla')
@section('title')
    List of product
@endsection
    @section('content')
        <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        @if (session('noticeA'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('noticeA') }}
                        </div>
                        @elseif(session('noticeU'))
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('noticeU') }}
                        </div>
                        @elseif(session('noticeD'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('noticeD') }}
                        </div>
                        @endif
                    </div>
                    <h1>Products</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> List of Products</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2>Manage <b>Users</b></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> </th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <img src="/images/{{ $user->photo ? $user->photo : 'user-photo-default.png'  }}"
                                        width="100" height="100" alt="">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td> {{ $user->updated_at }}</td>
                                <td>

                                       <a href="{{ route('users.edit', $user->id) }}" class="edit" data-toggle="modal"><i
                                                        class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                            | &nbsp;
                                                            <a href="{{ route('users.destroy', $user->id) }}" class="delete" data-toggle="modal"><i
                                                        class="material-icons" data-toggle="tooltip" title="delete">&#xE872;</i></a>
                                                {{--  <a href="{{ route('users.destroy', $user->id) }}" onclick="event.preventDefault();
                                                    document.getElementById('delete-form').submit();" class="delete" data-toggle="modal"><i
                                                    class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>  --}}

                                </td>
                                   {{--  {!! Form::open(['method'=>'DELETE','id'=>'delete-form', 'action'=>['usersController@destroy', $user->id]]) !!}
                                                @csrf
                                {!! Form::close() !!}  --}}
                            </tr>
                            @empty
                                @section('Mensaje')
                                <p class="text-center" style="color: red; font-size: 160%;"><b>Aun no hay Usarios</b></p>
                                @endsection
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /#page-wrapper -->

    @endsection

@endauth
