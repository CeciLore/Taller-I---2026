<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Picky Admin</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('vendor/bootstrap/css/myStyle.css') }}?v={{ filemtime(public_path('vendor/bootstrap/css/myStyle.css')) }}">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>

    <div class="admin-layout">

        <aside class="admin-layout-sidebar">

            <div class="text-center mb-4">

                <img src="{{ asset('img/Picky.jpg') }}" class="rounded-circle mb-3" width="90">

                <h2 class="section-title">Admin</h2>

                <hr class="custom-hr">

            </div>

            <a href="{{ url('/') }}" class="btn-primary text-center w-100 mb-4">

                ← Volver al sitio

            </a>

            <nav>

                <a href="{{ route('admin.dashboard') }}"
                    class="admin-layout-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    📊 Dashboard
                </a>

                <a href="{{ route('admin.productos.index') }}"
                    class="admin-layout-link {{ request()->routeIs('admin.productos.*') ? 'active' : '' }}">
                    🐶 Productos
                </a>

                <a href="{{ route('admin.usuarios.index') }}"
                    class="admin-layout-link {{ request()->routeIs('admin.usuarios.*') ? 'active' : '' }}">
                    👥 Usuarios
                </a>

                <a href="{{ route('admin.categorias.index') }}"
                    class="admin-layout-link {{ request()->routeIs('admin.categorias.*') ? 'active' : '' }}">
                    🏷️ Categorías
                </a>

                <a href="{{ route('admin.consultas.index') }}"
                    class="admin-layout-link {{ request()->routeIs('admin.consultas.*') ? 'active' : '' }}">
                    💬 Consultas
                </a>

                <a href="{{ route('admin.pedidos.index') }}"
                    class="admin-layout-link {{ request()->routeIs('admin.pedidos.*') ? 'active' : '' }}">
                    📦 Pedidos
                </a>

            </nav>

        </aside>

        <main class="admin-layout-content">

            @yield('content')

        </main>

    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')

</body>

</html>