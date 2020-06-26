@auth
    @extends('admin.users.layouts.pantilla')
    @section('title')
    Info
    @endsection

    @section('content')
        <div class="col-md-4 text-center" style="margin: 0 auto; float: none; margin-top: 10%; margin-left: 40%">
    		    <div class="card profile-card-1">
    		        <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb" alt="profile-sample1" class="background"/>
    		        <img src="/images/{{ auth()->user()->photo ? auth()->user()->photo : 'user-photo-default.png' }}" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>{{ auth()->user()->name }}<small>Admin</small></h2>
                    <h5><small>{{ auth()->user()->email }}</small></h5>
                    <div class="icon-block">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"> <i class="fa fa-twitter"></i></a>
                        <a href="#"> <i class="fa fa-google-plus"></i></a>
                    </div>
                    </div>
                </div>
            </div>
    @endsection
@endauth
