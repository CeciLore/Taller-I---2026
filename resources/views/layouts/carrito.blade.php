<!DOCTYPE html>
<html lang="es">

<head>

      <meta charset="UTF-8">

      <meta name="csrf-token" content="{{ csrf_token() }}">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Picky Petshop</title>

      <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

      <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">

      <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/myStyle.css') }}">

</head>

<body>

      <main>
            @yield('content')
      </main>

      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

      <script src="{{ asset('js/carrito.js') }}"></script>
      <script src="{{ asset('js/perfil.js') }}"></script>

</body>

</html>