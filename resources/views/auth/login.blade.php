<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('inicio/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<body>
    <section>
        <div class="container">
            <div class="user singinBx">
                <div class="imgBx">
                    <img src="{{ asset('inicio/img/ortopediaMovil.jpeg') }}">
                </div>
                <div class="formBx">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>Iniciar sesion</h2>
                        
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo">
                            @error('email')
                            <p style="color: red;">
                                {{ $message }}
                            </p>
                            @enderror

                            <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Contrasena">
                            @error('password')
                            <p style="color: red;">
                                {{ $message }}
                            </p>
                            @enderror

                        <input type="submit" value="Acceder">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
