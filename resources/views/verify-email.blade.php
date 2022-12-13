<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matarou</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('asset/images/banner/icon.jpg')}}" type="image/x-icon">
    <link href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
</head>
<body>
    <div class="about-page d-flex justify-content-center verifemail">
        <form action="{{ route('verification.send') }}" method="post">
        @csrf
            <button type="submit" class="btn btn-dark">Request a new link</button>
        </form>
    </div>
    @if (session('message') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 d-flex justify-content-center">
            A new email verification link has been emailed to you!
        </div>
    @endif
</body>
</html>


