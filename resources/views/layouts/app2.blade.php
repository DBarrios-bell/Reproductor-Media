<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    
    <title>Video Playlist</title>
    <!-- S-Tech04 | www.youtube.com/STech04 -->
</head>

<body>

    @yield('content')

    @include('layouts.themes.tab')


    @include('layouts.themes.scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
