@guest
@extends('layouts.plantilla')
<link rel="stylesheet" href="{{ asset('inicio/css/card.css') }}">
    @section('content')
           <!-- Informacion introductoria -->
        <div class="section">
            <section class="about" >
                <div class="img">
                    <img src="{{ asset('inicio/img/1.jpg') }}" alt="casco">
                </div>
                <div class="cont">
                    <h2 class="heading">Cascos para niños</h2>
                    <p class="txt">
                        Si estás buscando los mejores cascos a medida en Valencia, los encontrarás con  Ortopedia Velásquez.
                        Contamos con un amplia experiencia ofreciendo atención personalizada y asesoramiento profesional.
                        Disponemos de un amplio catálogo de productos de primera calidad, entre ellos destacamos los cascos de
                        ortopedia infantil hechos totalmente a medida. Los cascos que ofrecemos están elaborados a partir de un escáner
                        3D del cráneo del bebé, y su función es la de corregir la forma del cráneo y ayudarlo a desarrollarse con normalidad.
                    </p>
                    <br>
                    <a href="#" clas    s="btn btn3">MAS INFO</a>
                </div>
            </section>
        </div>

        <!-- Productos -->
    <div class="container">
    <br>
    <h4>Productos Ortopedia Velasquez</h2>
	<br>
	<div class="row" id="ads">
    <!-- Category Card -->
    @forelse ($product as $p)
    <div class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-year">{{ date("Y",strtotime($p->created_at)) }}</span>
                <img class="img-fluid" src="/images/{{ $p->photo ? $p->photo : 'nada.png' }}" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
                    <span class="card-detail-badge">{{ $p->name }}</span>
                    <span class="card-detail-badge">{{ $p->category }}</span>
            </div>
        </div>
    </div>
    @empty

    @endforelse


</div>
</div>
    @endsection
@endguest
