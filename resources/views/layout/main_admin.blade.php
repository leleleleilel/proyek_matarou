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
