<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matarou | Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('asset/css/styleadmin.css')}}">
    <style>
        .footer{
            position: absolute;
            bottom:0;
            width:100%;
            height:60px;
            color: white;
            background-color: black;
            text-align: center
        }
        .footer p{
            font-size: 12px;
            color: #7a7a7a;
            line-height: 60px;
        }
    </style>
</head>
<body style="overflow: hidden">
    <div class="content">
    <div class="about-page bannerloginadmin" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('asset/images/banner/banner_loginAdmin.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 cardlogin">
            <form action="{!!url('/admin/doLogin')!!}" method="POST">
            @csrf
                <div class="mb-6">
                <h1>Admin Login</h1>
                @if (Session::has("message"))
                    <h3 style="color: red; font-weight: bold">{{Session::get("message.isi")}}</h3>
                @endif
                <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" style="width: 70%;" placeholder="Username">
                @error('username')
                <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
               @enderror
                </div>
                <div class="mb-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" style="width: 70%;" placeholder="Password">
                </div>
                @error('password')
                <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
               @enderror
                <br>
                <button type="submit" name="buttonLogin" class="btn btn-dark" id="btnsubmitlogin">Login</button>
            </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
</div>
<div class="footer" id="" style="bottom: 0">
    <p>Copyright &copy; 2022 Matarou</p>
</div>
</body>
</html>


