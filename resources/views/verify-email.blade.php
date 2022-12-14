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
    @if (session('message') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 d-flex justify-content-center">
                    A new email verification link has been emailed to you!
                </div>
    @endif
    <div class="jumbotron jumbotron-fluid d-flex justify-content-center" style="margin-top: 180px; width: 50%; margin-left: 25%;">
        <div class="container">
            <div class="about-page verifemail">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{asset('asset/images/banner/iconverif.png')}}" alt="" style="iconverif">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <form action="{{ route('verification.send') }}" method="post">
                            @csrf
                                <button type="submit" class="btn btn-dark btnreq">Request a new link</button>
                            </form>
                        </div>
                        <div class="col-2">
                            {{-- <a href="{!!url('/home')!!}"><button type="submit" class="btn btn-dark">Home</button></a> --}}
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>


