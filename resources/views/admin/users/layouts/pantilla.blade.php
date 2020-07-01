@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/themes/default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">

    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .delete{
            display: none;
        }
    </style>
</head>
<body>
   <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">Ortopedia Velasquez</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('products.index') }}"><i class="fa fa-table"></i> Admin Products</a></li>
                    <li><a href="{{ route('products.create') }}"><i class="fa fa-edit"></i> Create Products</a></li>
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-table"></i> Admin Users</a></li>
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-edit"></i> Create Users</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">

                    <li class="dropdown user-dropdown">
                        {{--  <img src="/images/{{ auth()->user()->photo ? auth()->user()->photo : 'user-photo-default.png' }}" width="80" alt="profile-image" />   --}}
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                                   {{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('info') }}"><i class="fa fa-user"></i> Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i>
                                        {{ __('Logout') }}
                                </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>



@yield('content')
<div>
    @yield('Mensaje')
</div>

    @include('sweetalert::alert')
    <script src="{{ asset('js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/alertify.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
</body>
</html>
@endauth
