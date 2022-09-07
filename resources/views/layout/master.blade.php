<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matarou</title>
</head>
<link rel="stylesheet" href="{{asset('template/home.css')}}">

<body>

    {{-- header --}}
    @include('partial.header')

    {{-- banner --}}
    @include('partial.banner')

    {{-- content --}}
    <div class="sec">
        @yield('content')
    </div>

    {{-- footer --}}
    <footer>

    </footer>

{{-- <script src="{{asset('template/index.js')}}"></script> --}}
</body>
</html>
