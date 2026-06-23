@extends('layouts.app')
@section('content')

    <div class="hero">
        <div class="hero-content text-center">
            <h1>Nuestra Historia</h1>
            <span class="slogan">
                10 años de amor perruno
            </span>
        </div>
    </div>

    <main class="container my-5 py-4">

        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="section-title text-primary section-history-title">
                    Nuestra Trayectoria
                </h2>
                <p class="lead mt-3 fw-bold">
                    Seleccionamos productos con un estándar único:
                    que los usaríamos con nuestras propias mascotas.
                </p>
                <p>
                    Nuestro objetivo es ofrecer soluciones prácticas y estéticas
                    para el día a día, garantizando la salud y felicidad
                    de los animales.
                </p>
            </div>
            <div class="col-md-6">
                <div class="video-container">
                    <img src="{{ asset('img/Picky.jpg') }}" class="img-fluid" alt="Trayectoria">
                </div>
            </div>
        </div>
        <h2 class="section-title text-center mb-5 section-team-title">
            Nuestro Equipo 🐶
        </h2>
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="card team-card p-4 h-100 d-flex align-items-center">
                    <div class="badge">
                        BOSS
                    </div>
                    <div class="img-container mb-3">
                        <img src="{{ asset('img/jefa.jpg') }}" class="img-equipo img-fluid" alt="Laura Rodríguez">
                    </div>
                    <h3 class="fw-black">
                        Laura Rodríguez
                    </h3>
                    <p class="text-muted fw-bold">
                        Fundadora
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card team-card p-4 h-100 d-flex align-items-center">
                    <div class="badge">
                        CHEF
                    </div>
                    <div class="img-container mb-3">
                        <img src="{{ asset('img/especialista.jpg') }}" class="img-equipo img-fluid" alt="Javier Peña">
                    </div>
                    <h3 class="fw-black">
                        Javier Peña
                    </h3>
                    <p class="text-muted fw-bold">
                        Especialista en Nutrición
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card team-card p-4 h-100 d-flex align-items-center">
                    <div class="badge badge-pro">
                        PRO
                    </div>
                    <div class="img-container mb-3">
                        <img src="{{ asset('img/milo.jpg') }}" class="img-equipo img-fluid" alt="Milo">
                    </div>
                    <h3 class="fw-black">
                        Milo
                    </h3>
                    <p class="text-muted fw-bold">
                        Probador de Camas Oficial
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection