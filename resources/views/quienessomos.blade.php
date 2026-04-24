@extends('layouts.app')
@section('content')

<!-- Hero de la sección con corte diagonal suave -->
<div class="hero" style="min-height: 50vh; clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%);">
    <div class="hero-content">
        <h1>Nuestra Historia</h1>
        <span class="slogan">10 años de amor perruno</span>
    </div>
</div>

<main class="container my-5 py-4">
    <!-- Trayectoria -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h2 class="section-title text-primary" style="font-size: 3rem;">Nuestra Trayectoria</h2>
            <p class="lead mt-3 fw-bold">Seleccionamos productos con un estándar único: que los usaríamos con nuestras propias mascotas.</p>
            <p>Nuestro objetivo es ofrecer soluciones prácticas y estéticas para el día a día, garantizando la salud y felicidad de los animales.</p>
        </div>
        <div class="col-md-6">
            <div class="video-container">
                <img src="{{ asset('img/Picky.jpg') }}" class="img-fluid" alt="Trayectoria">
            </div>
        </div>
    </div>

    <!-- Sección Equipo -->
    <h2 class="section-title text-center mb-5" style="font-size: 3.5rem;">Nuestro Equipo 🐶</h2>
    <div class="row text-center g-4">
        <!-- Laura -->
        <div class="col-md-4">
            <div class="card p-4">
                <div class="badge">BOSS</div>
                <h3 class="fw-black">Laura Rodríguez</h3>
                <p class="text-muted fw-bold">Fundadora</p>
            </div>
        </div>
        <!-- Javier -->
        <div class="col-md-4">
            <div class="card p-4">
                <div class="badge">CHEF</div>
                <h3 class="fw-black">Javier Peña</h3>
                <p class="text-muted fw-bold">Especialista en Nutrición</p>
            </div>
        </div>
        <!-- Milo -->
        <div class="col-md-4">
            <div class="card p-4 border-primary" style="border-width: 4px;">
                <div class="badge" style="background: var(--brand-pink); color: white;">PRO</div>
                <h3 class="fw-black">Milo</h3>
                <p class="text-muted fw-bold">Probador de Camas Oficial</p>
            </div>
        </div>
    </div>
</main>
@endsection

