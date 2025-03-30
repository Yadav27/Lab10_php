<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header>
        @include('partials.nav')  {{-- Including the navigation partial --}}
    </header>

    <main class="container">
        @yield('content')  {{-- This section will be replaced by child views --}}
    </main>

    <footer class="text-center mt-4 p-3">
        <p>&copy; {{ date('Y') }} My Laravel App. All Rights Reserved.</p>
    </footer>
</body>
</html>
