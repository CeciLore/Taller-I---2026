@extends('layouts.carrito')
@section('content')

<section class="hero">
    <div class="hero-content text-center">
        <h1>
            Mi Carrito 🛒
        </h1>
        <p class="slogan">
            ¡Ya casi tus mascotas reciben sus favoritos!
        </p>
    </div>
</section>

<section class="cart-section py-5">
    <div class="container">
        <div class="row g-5">
        
            <div class="col-lg-8">
                @php
                    $total = 0;
                @endphp
                @if($carrito && $carrito->items->count() > 0)
                    @foreach($carrito->items as $item)
                        @php
                            $producto = $item->producto;
                            $subtotal = $producto->precio * $item->cantidad;
                            $total += $subtotal;
                        @endphp
                
                        <div class="card product-card p-3 mb-3 shadow-sm border-0">
                            <div class="row align-items-center g-3">
                    
                                <div class="col-3">
                                    <img src="{{ asset('storage/' . $producto->url_imagen) }}"
                                         class="product-image rounded"
                                         alt="{{ $producto->nombre }}">
                                </div>
                    
                                <div class="col-5">
                                    <h5 class="fw-bold mt-3 product-title">
                                        {{ $producto->nombre }}
                                    </h5>
                                    <p class="text-muted product-description mb-2">
                                        {{ $producto->descripcion ?? 'Sin descripción' }}
                                    </p>
                                    <span class="price fs-5">
                                        ${{ number_format($producto->precio, 0, ',', '.') }}
                                    </span>
                                    <small class="d-block mt-2 text-muted">
                                        Stock disponible:
                                        {{ $producto->stock }}
                                    </small>
                                </div>
                    
                                <div class="col-2">
                                    <div class="quantity-control d-flex align-items-center justify-content-center gap-2">
                    
                                        <button
                                            type="button"
                                            class="qty-btn btn-restar"
                                            data-id="{{ $item->id }}">
                                            -
                                        </button>
                                        <span
                                            class="qty-number"
                                            id="cantidad-{{ $item->id }}">
                                            {{ $item->cantidad }}
                                        </span>
                            
                                        <button
                                            type="button"
                                            class="qty-btn btn-sumar"
                                            data-id="{{ $item->id }}"
                                            {{ $item->cantidad >= $producto->stock ? 'disabled' : '' }}>
                                            +
                                        </button>
                                    </div>
                                </div>
                    
                                <div class="col-2 text-center">
                                    <h6
                                        class="fw-bold mb-3"
                                        id="subtotal-{{ $item->id }}">
                                        ${{ number_format($subtotal, 0, ',', '.') }}
                                    </h6>
                                  
                                    <form action="{{ route('carrito.eliminar', $item->id) }}"
                                          method="POST">
                                        @csrf
                                        <button class="btn-remove-cart">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                 
                    <div class="card product-card p-5 text-center shadow-sm border-0">
                        <h3 class="mb-3">
                            Tu carrito está vacío 🐾
                        </h3>
                        <p class="text-muted">
                            Agrega productos para comenzar tu compra.
                        </p>
                    </div>
                @endif
            </div>
            
            <div class="col-lg-4">
                <div class="card cart-summary-card p-4 shadow-sm border-0">
                    <h2 class="section-title mb-4">
                        Resumen 💳
                    </h2>
                    <div class="summary-line">
                        <span>
                            Subtotal
                        </span>
                        <span id="resumen-subtotal">
                            ${{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="summary-line">
                        <span>
                            Envío
                        </span>
                        <span>
                            Gratis
                        </span>
                    </div>
                    <hr class="custom-hr mx-0">
                    <div class="summary-total">
                        <span>
                            Total
                        </span>
                        <span id="resumen-total">
                            ${{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>
                    @if($carrito && $carrito->items->count() > 0)

                        <form
                            action="{{ route('carrito.finalizar') }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="btn-primary w-100 mt-4">

                                Finalizar Compra 🚀

                            </button>

                        </form>

                        @if($carrito->items->count() >= 2)

                            <form
                                action="{{ route('carrito.vaciar') }}"
                                method="POST"
                                class="mt-3">

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-danger w-100">

                                    🗑️ Vaciar Carrito

                                </button>

                            </form>

                        @endif

                    @endif
                    <a href="{{ route('home') }}"
                       class="btn btn-outline-dark w-100 mt-3 rounded-pill fw-bold">
                        Seguir Comprando
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
