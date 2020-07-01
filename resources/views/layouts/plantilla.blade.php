<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('inicio/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('inicio/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('inicio/css/style.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.8/fullpage.min.css">
</head>
<body>

<nav class="menu">
    <a href="{{ route('root') }}" class="active">Portada</a>
    <a href="#">Saber mas</a>
    <a href="#">Galeria</a>
    <a href="{{ route('productos') }}">Productos</a>
    <a href="contactenos.php">Contacto</a>
</nav>

<div class="fullpage">
    @yield('content')
</div>

<div class="section fp-auto-height">
    <section class="footer">
        <div>
            <img src="img/mess.png">
            <h2 class="txt2">Contacta con nosotros</h2>
            <p class="txt3">Telf: 960 05 57 68</p>
            <p class="txt3">Telf: 640231023</p>
        </div>
        <div>
            <img src="img/location.png">
            <h2 class="txt2">DÓNDE ESTAMOS</h2>
            <p class="txt4">Carrer de lEnginyer José Sirera, 2 Avenida Cr Tomás Sala con Calle Soria.</p>
            <p class="txt4">46017 València Valencia</p>
            <ul>
                <p class="txt2">Siguenos en: </p>
                <li><a href="#"><img src="img/facebook.png" alt=""></a></li>
                <li><a href="#"><img src="img/twitter.png" alt=""></a></li>
                <li><a href="#"><img src="img/instagram.png" alt=""></a></li>
            </ul>
        </div>
    </section>
    <div class="fot">
        <h2 class="txt2">ENLACES DE INTERÉS</h2>
        <p>- Ayudas técnicas Valencia - Plantillas personalizadas pies Valencia - Camas articuladas Valencia - Cascos a medida Valencia - Protesis biónica Valencia</p>
        <p>- Sillas de ruedas eléctricas Valencia - Aparatos ortopédicos Valencia - Sillas ortopédicas para ducha Valencia</p>
    </div>
    <div class="foot">
        <p>Aviso legal - Política de privacidad - Política de cookies</p>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.8/fullpage.extensions.min.js"></script>
    <script>
        var fp = new fullpage('#fullpage',{
            navigation: true,
        });
    </script>
</body>
</html>
