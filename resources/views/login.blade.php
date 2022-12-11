@extends('layout.master')
@section('content')
    <div class="about-page bannerlogin" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('asset/images/banner/banner_login.jpg')}}')">
      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 cardlogin">
            <form action="{!!url('/login')!!}" method="POST">
            @csrf
              <div class="mb-6">
                <h1>Login</h1>
                <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" style="width: 70%;" placeholder="Username">
                @error('username')
                    <div class="error">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" style="width: 70%;" placeholder="Password">
                @error('password')
                    <div class="error">{{$message}}</div>
                @enderror
              </div>
              <br>
              @if (session()->has('message'))
                <h6 class="error">{{ session()->get('message') }}</h6>
              @endif
              <button type="submit" name="btnlogin" class="btn btn-dark" id="btnsubmitlogin" style="width: 70%;">Login</button>
            </form>
            <a href="{!!url('/register')!!}">
              Don't have an account ?
              <button style="
                background-color:transparent;
                border: none;
                text-decoration: underline;
                font-size: 18px;
                color: #98F4D9;
                outline: none;
                border:none;
              ">Register</button>
            </a>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
@endsection
@section('banner')
    <div id="banner2" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner2.jpg')}}); background-size: cover; background-position: center;">
    </div>
    <div id="banner3" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner3.jpg')}}); background-size: cover; background-position: center;">
    </div>
@endsection
