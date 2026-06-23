@extends('layouts.app')

@section('content')

    <div class="hero">
        <div class="hero-content text-center">
            <h1>Picky Petshop</h1>

            <span class="slogan d-block mb-4">
                Accesorios y alimentos de alta gama para tus mejores amigos.
            </span>

            <a href="#productos" class="btn btn-light btn-lg px-5 shadow-sm">
                ¡VER LO NUEVO!
            </a>
        </div>

    </div>

    <main>

        <section class="community-section container my-5 text-center">

            <h2 class="community-title mb-4">
                Nuestra Comunidad 🐾
            </h2>

            <div class="video-box ratio ratio-16x9 mx-auto">
                <video controls>
                    <source src="{{ asset('video/perrito.mp4') }}" type="video/mp4">
                </video>
            </div>

        </section>


        <section id="productos" class="container my-5">

            <h2 class="text-center mb-4 fw-bold">
                Favoritos de la Manada
            </h2>

            <div class="row justify-content-center mb-5">

                <div class="col-md-5 col-lg-4">

                    <form action="{{ route('home') }}" method="GET">

                        <select name="categoria" class="form-select shadow-sm" onchange="this.form.submit()">

                            <option value="">
                                Todas las categorías
                            </option>

                            @foreach($categorias as $categoria)

                                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>

                                    {{ $categoria->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </form>

                </div>

            </div>

            <div class="row g-4 text-center">

                @forelse($productos as $producto)

                    <div class="col-6 col-md-4 col-lg-4">

                        <article class="card product-card h-100 border-0 shadow-sm overflow-hidden" data-bs-toggle="modal"
                            data-bs-target="#productoModal{{ $producto->id }}" style="cursor:pointer;">

                            <div class="product-image-container">

                                <img src="{{ asset('storage/' . $producto->url_imagen) }}" alt="{{ $producto->nombre }}"
                                    class="product-image">

                            </div>

                            <div class="card-body text-center">

                                <h5 class="fw-bold">
                                    {{ $producto->nombre }}
                                </h5>

                                <p class="h5 text-primary fw-bold">
                                    ${{ number_format($producto->precio, 0, ',', '.') }}
                                </p>

                                <small class="text-muted">
                                    Mas detalles
                                </small>

                            </div>

                        </article>

                    </div>

                    <div class="modal fade" id="productoModal{{ $producto->id }}" tabindex="-1" aria-hidden="true">

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title">
                                        {{ $producto->nombre }}
                                    </h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>

                                </div>

                                <div class="modal-body">

                                    <div class="row align-items-center">

                                        <div class="col-md-5 text-center">

                                            <img src="{{ asset('storage/' . $producto->url_imagen) }}"
                                                alt="{{ $producto->nombre }}" class="img-fluid rounded">

                                        </div>

                                        <div class="col-md-7">

                                            <h3 class="fw-bold mb-3">
                                                {{ $producto->nombre }}
                                            </h3>

                                            <p class="text-muted">
                                                {{ $producto->descripcion }}
                                            </p>

                                            <p class="h4 text-primary fw-bold">
                                                ${{ number_format($producto->precio, 0, ',', '.') }}
                                            </p>

                                            <p class="fw-bold">
                                                Stock disponible:
                                                {{ $producto->stock }}
                                            </p>

                                            @auth
                                                @if(Auth::user()->rol == 'usuario')

                                                    @if($producto->stock > 0)

                                                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST"
                                                            class="form-agregar-carrito">

                                                            @csrf

                                                            <button type="submit" class="btn btn-picky-yellow fw-bold btn-agregar-carrito">

                                                                Agregar al carrito

                                                            </button>

                                                        </form>

                                                    @else

                                                        <button class="btn btn-secondary" disabled>

                                                            Sin stock

                                                        </button>

                                                    @endif

                                                @endif
                                            @endauth

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-warning">
                            No hay productos disponibles.
                        </div>

                    </div>

                @endforelse

            </div>

            @if($productos->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $productos->links() }}
                </div>
            @endif

        </section>

    </main>

@endsection