<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.style')

    <title>genDoc</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>

<style>
    body{
        font-family: 'Sarabun', sans-serif;
    }
</style>

<body >
    @include('layouts.navbar')

        <div>
            @yield('content')
        </div>
    </div>

    <style>
        .footer{
            background-color: #f5f5f5;
            height: 60px;
            line-height: 60px; /* Vertically center the text there */
        }
    </style>

    
    {{-- <footer class="footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div> --}}
    
    
      
</body>
</html>
