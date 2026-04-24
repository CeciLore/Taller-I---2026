@extends('layouts.app')

@section('content')

<div class="hero" style="min-height: 50vh; clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%); display: flex; align-items: center; justify-content: center;">
        
             <div class="hero-content">
                <h1>Picky Petshop</h1>
                <span class="slogan d-block mb-4">Accesorios y alimentos de alta gama para tus mejores amigos.</span>
                <a href="#productos" class="btn btn-light btn-lg px-5 shadow-sm">¡VER LO NUEVO!</a>
            </div>        
        </div>
<main>
    

    

    <!-- Video Sección -->
    <section class="container my-5 text-center">
        <h2 class="mb-4">Nuestra Comunidad 🐾</h2>
        <div class="ratio ratio-16x9 shadow rounded overflow-hidden mx-auto" style="max-width: 600px;">
            <video controls>
                <source src="{{ asset('video/perrito.mp4') }}" type="video/mp4">
            </video>
        </div>
    </section>

    <!-- Grilla de Productos -->
    <section id="productos" class="container my-5">
        <h2 class="text-center mb-5 fw-bold">Favoritos de la Manada</h2>
        <div class="row g-4 text-center">
            <div class="col-12 col-sm-6 col-lg-4">
                <article class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('img/pretal.jpg') }}" class="card-img-top" alt="Pretal">
                    <div class="card-body">
                        <h3>Pretal "Neon"</h3>
                        <p class="text-muted">Máxima visibilidad.</p>
                        <p class="h4 text-primary">$15.500</p>
                        <button class="btn btn-purple-gradient btn-sm text-white">Agregar al carrito</button>
                    </div>
                </article>
            </div>
            <!-- Aquí se pueden agregar más productos -->
        </div>
    </section>
</main>
@endsection



