<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} - ERGEXPIN</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
         --}}

    @include('includes.head')

    <!-- Scripts -->
</head>

<body class="font-sans antialiased">
    <!-- Page Content -->
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            {{ $slot }}
        </div>
        {{-- @include('includes.footer') --}}
    </div>
    @include('includes.script')
    @stack('scripts')
</body>

</html>
