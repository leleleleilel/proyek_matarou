<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('style_admin.css')}}">
    <link rel="shortcut icon" href="{{asset('asset/images/banner/icon.jpg')}}" type="image/x-icon">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('partial.navbar_admin')

    {{-- master Users --}}
    @yield('masterUsersContent')

    {{-- master Categories --}}
    @yield('masterCategoriesContent')

    {{-- master Products --}}
    @yield('masterProductsContent')

    {{-- manage size and stock of a products --}}
    @yield('manageSizeStokContent')

    {{-- list reviews --}}
    @yield('listReviewsContent')

    {{-- list history --}}
    @yield('listhistory')

    {{-- master kode promo --}}
    @yield('masterPromoCode')

    {{-- profile admin --}}
    @yield('profileAdmin')

    {{-- content edit baju --}}
    @yield('editBajuContent')

    <div class="container-fluid bg-light text-white text-center py-3">
        <div class="row">
            <div class="footer col">
                    Copyright ©️ Matarou 2022
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
