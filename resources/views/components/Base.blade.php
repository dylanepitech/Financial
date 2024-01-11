<!DOCTYPE html>
<html lang="fr">

<head>
    <meta
        content="Votre artisant boulanger prés de chez vous rapidement. Découvrer une large gamme de produit, et de choix facilement.">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#317EFB">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>@yield('title', 'Financial')</title>
</head>

<body>

    @yield('content')
    @extends('components/footer')
    <script src="{{asset('js/finisher-header.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>