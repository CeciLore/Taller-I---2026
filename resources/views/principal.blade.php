@extends('layouts.app')

@section('content')

<div class="hero" style="min-height: 50vh; clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%); display: flex; align-items: center; justify-content: center;">
    <div class="hero-content text-center">
        <h1>Picky Petshop</h1>
        <span class="slogan d-block mb-4">Accesorios y alimentos de alta gama para tus mejores amigos.</span>
        <a href="#productos" class="btn btn-light btn-lg px-5 shadow-sm">¡VER LO NUEVO!</a>
    </div>        
</div>

<main>
    <section class="container my-5 text-center">
        <h2 class="mb-4">Nuestra Comunidad 🐾</h2>
        <div class="ratio ratio-16x9 shadow rounded overflow-hidden mx-auto" style="max-width: 600px;">
            <video controls>
                <source src="{{ asset('video/perrito.mp4') }}" type="video/mp4">
            </video>
        </div>
    </section>

    <section id="productos" class="container my-5">
        <h2 class="text-center mb-5 fw-bold">Favoritos de la Manada</h2>
        
        <div class="tab-content" id="pills-tabContent">
            
            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                <div class="row g-4 text-center">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                            <img src="{{ asset('img/pretal.jpg') }}" class="card-img-top" alt="Pretal" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h3>Pretal "Neon"</h3>
                                <p class="text-muted flex-grow-1">Máxima visibilidad.</p>
                                <p class="h4 text-primary mt-2">$15.500</p>
                                <button class="btn btn-picky-yellow btn-sm fw-bold btn-agregar-carrito">Agregar al carrito</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                            <img src="{{ asset('img/alimentopremium.jpg') }}" class="card-img-top" alt="Alimento" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h3>Alimento Premium</h3>
                                <p class="text-muted flex-grow-1">Energía y salud.</p>
                                <p class="h4 text-primary mt-2">$32.000</p>
                                <button class="btn btn-picky-yellow btn-sm fw-bold btn-agregar-carrito">Agregar al carrito</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                            <img src="{{ asset('img/mordisco.jpg') }}" class="card-img-top" alt="Mordillo" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h3>Mordillo Dental</h3>
                                <p class="text-muted flex-grow-1">Diversión duradera.</p>
                                <p class="h4 text-primary mt-2">$4.500</p>
                                <button class="btn btn-picky-yellow btn-sm fw-bold btn-agregar-carrito">Agregar al carrito</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                            <img src="{{ asset('img/camadog.jpg') }}" class="card-img-top" alt="Cama" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h3>Cama Confort</h3>
                                <p class="text-muted flex-grow-1">El mejor descanso.</p>
                                <p class="h4 text-primary mt-2">$21.800</p>
                                <button class="btn btn-picky-yellow btn-sm fw-bold btn-agregar-carrito">Agregar al carrito</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                            <img src="{{ asset('img/rascador.jpg') }}" class="card-img-top" alt="Rascador" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h3>Torre Rascador</h3>
                                <p class="text-muted flex-grow-1">Para gatos felices.</p>
                                <p class="h4 text-primary mt-2">$25.600</p>
                                <button class="btn btn-picky-yellow btn-sm fw-bold btn-agregar-carrito">Agregar al carrito</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                            <img src="{{ asset('img/bolsatransporte.jpg') }}" class="card-img-top" alt="Transportadora" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h3>Bolso de Viaje</h3>
                                <p class="text-muted flex-grow-1">Viajes cómodos.</p>
                                <p class="h4 text-primary mt-2">$18.900</p>
                                <button class="btn btn-picky-yellow btn-sm fw-bold btn-agregar-carrito">Agregar al carrito</button>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                <div class="row g-4 text-center">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                            <img src="{{ asset('img/shampoo.jpg') }}" class="card-img-top" alt="Nuevo" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h3>Shampoo Pet</h3>
                                <p class="text-muted flex-grow-1">Pelaje brillante.</p>
                                <p class="h4 text-primary mt-2">$8.500</p>
                                <button class="btn btn-picky-yellow btn-sm fw-bold btn-agregar-carrito">Agregar al carrito</button>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

        </div> 

        <nav aria-label="Navegación de productos" class="mt-5">
            <ul class="pagination justify-content-center border-0" id="pills-tab" role="tablist">
                <li class="page-item" role="presentation">
                    <button class="page-link active shadow-sm border-0" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" style="border-radius: 15px 0 0 15px;">1</button>
                </li>
                <li class="page-item" role="presentation">
                    <button class="page-link shadow-sm border-0" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" style="border-radius: 0 15px 15px 0; color: var(--brand-purple);">2</button>
                </li>
            </ul>
        </nav>
    </section>
</main>


@endsection