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
</head>
<body>

    {{-- header --}}
    @include('partial.header')

    {{-- content --}}
    <div class="content">
        @yield('content')
    </div>

    @yield('banner')

    {{-- footer --}}
    <footer>
        @include('partial.footer')
    </footer>

    <script src="{{asset('asset/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
