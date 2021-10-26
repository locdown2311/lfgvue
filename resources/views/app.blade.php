<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Site Name, Title, and Description to be displayed -->
        <meta property="og:site_name" content="LFGDestiny">
        <meta property="og:title" content="Seu buscador de destiny">
        <meta property="og:description" content="Organize um grupo hoje mesmo">

        <!-- Image to display -->
        <!-- Replace   «example.com/image01.jpg» with your own -->
        <meta property="og:image" content="http://www.example.com/image01.jpg">

        <!-- No need to change anything here -->
        <meta property="og:type" content="website" />
        <meta property="og:image:type" content="image/jpeg">

        <!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300">

        <!-- Website to visit when clicked in fb or WhatsApp-->
        <meta property="og:url" content="https://lfgdestiny.live">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700|Lato:300,400,700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
