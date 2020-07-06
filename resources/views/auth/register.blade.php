<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('inicio/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Register</title>
</head>
<body>
    <section>
        <div class="container">
            {{ __('Register') }}
            <!-- Registro-->
            <div class="user singupBx">
                <div class="formBx">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2>Crear cuenta</h2>
                        <div class="form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="display: none">{{ __('Name') }}</label>
                            <input type="text" id="name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                            @error('name')
                            <p style="color: red;">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="display: none">{{ __('E-Mail Address') }}</label>
                            <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo">
                            @error('email')
                            <p style="color: red;">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="display: none">{{ __('Password') }}</label>
                            <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Contraseña">
                            @error('password')
                            <p style="color: red;">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" style="display: none" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">

                        </div>

                        {{-- <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button> --}}
                        <input type="submit" value="{{ __('Register') }}">
                        <p class="signup">Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesion</a></p>
                    </form>
                </div>
                <div class="imgBx">
                    <img src="{{ asset('inicio/img/ortopediaMovil.jpeg') }}">
                </div>
            </div>
        </div>
    </section>
</body>
</html>
