<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matarou</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('asset/images/banner/icon.jpg')}}" type="image/x-icon">
    <link href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
    {{-- header --}}

    @if (auth()->check() && auth()->user()->role=="customer")
        @include('partial.header')
    @else
        @include('partial.navbar_guest')
    @endif



    {{-- content --}}
    <div class="content">
        @yield('content')
    </div>

    @yield('banner')

    {{-- footer --}}
    <footer>
        @include('partial.footer')
    </footer>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('asset/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
