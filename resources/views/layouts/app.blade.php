<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/chattle_style.min.css') }}">
</head>
@include('chat.chat')

<body class="font-sans antialiased">
    @include('chat.chat')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <header>
            @include('layouts.navigation')

        </header>
        <!-- Page Content -->
        <main>
            @yield('content')

        </main>

    </div>
    <div class="relative bottom-0">

        @include('layouts.footer')
    </div>



    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    {{-- chatbox --}}
    <script src="/js/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="/js/jquery-cookie.js"></script>
    <script src="/js/chattle_customer.js"></script>
    <script src="/js/handleLogout.js"></script>

    {{-- end chat box --}}
</body>

</html>
