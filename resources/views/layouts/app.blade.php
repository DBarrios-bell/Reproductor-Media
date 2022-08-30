<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    @include('layouts.themes.styles')
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="http://127.0.0.1:8000/" class="navbar-brand">{{ config('app.name') }}</a>
            <div class="d-flex">
                @include('auth.logout')
                {{-- {{Auth::user()->specialty_id}} --}}
            </div>
        </div>

        </div>
        </div>
    </nav>
    <br><br>

    @yield('content')
    {{-- script --}}
    @include('layouts.themes.scripts')
</body>

</html>
