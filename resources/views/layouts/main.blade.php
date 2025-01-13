<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="https://web.dpmptsp.padang.go.id/assets/Logo_Padang.svg">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Custom Styles -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')
    
    <!-- Content -->
    <main>
        @yield('content')   
        @stack('scripts')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script>
        // Navbar toggle
        const btn = document.querySelector("button[data-collapse-toggle='navbar-default']");
        const menu = document.querySelector("#navbar-default");
        
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</body>
</html>