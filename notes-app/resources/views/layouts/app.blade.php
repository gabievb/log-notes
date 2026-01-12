<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log Notes</title>
    <!-- CSS Style -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('components.header')

    @yield('content', 'Nenhum conteúdo renderizado!')

    @stack('scripts')
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
</body>
</html>