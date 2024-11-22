<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header')
    <main class="mt-5">
        <div class="container">
            @yield('content')
        </div>
    </main>
    @include('includes.footer')
    <script src="{{asset('js/bootstrap.bundle.min.css')}"></script>
</body>
</html>