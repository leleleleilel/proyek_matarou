@extends('layout.master')
@section('content')
    <div class="about-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('asset/images/banner/banneregister.png')}}'); height: 100%; background-position: center; background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8 cardlogin" style="margin-bottom: 300px;">
            <form action="{!!url('/register')!!}" id="formDaftar" method="POST">
            @csrf
              <div class="mb-6">
                <h1>Register</h1>
                <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" style="width: 70%;" placeholder="Username">
                @error('username')
                    <div class="error">{{$message}}</div>
                @enderror
            </div>
                <div class="mb-6">
                <label for="exampleInputAlamat" class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" id="fullname" style="width: 70%;" placeholder="Name">
                @error('fullname')
                    <div class="error">{{$message}}</div>
                @enderror
              </div>
                <div class="mb-6">
                <label for="exampleInputAlamat" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" style="width: 70%;" placeholder="Address">
                @error('address')
                    <div class="error">{{$message}}</div>
                @enderror
              </div>
                <div class="mb-6">
                <label for="exampleInputAlamat" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="phone" style="width: 70%;" placeholder="Phone Number">
                @error('phone')
                    <div class="error">{{$message}}</div>
                @enderror
              </div>
                <div class="mb-6">
                    <label for="exampleInputAlamat" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" style="width: 70%;" placeholder="Email">
                    @error('email')
                    <div class="error">{{$message}}</div>
                    @enderror
                </div>
              <div class="mb-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="input_password" style="width: 70%;" placeholder="Password">
                @error('password')
                    <div class="error">{{$message}}</div>
                @enderror
              </div>
                <div class="mb-6">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="input_password" style="width: 70%;" placeholder="Confirmation Password">
                @error('password_confirmation')
                    <div class="error">{{$message}}</div>
                @enderror
              </div>
              <br>
              <button type="submit" name="btnregister" class="btn btn-dark" id="btnsubmitlogin" style="width: 70%;" value="DAFTAR" >Register</button>
              <br>
            </form>
            <a href="{!!url('/login')!!}">
              Already has an account ?
              <button style="
                background-color:transparent;
                border: none;
                text-decoration: underline;
                font-size: 18px;
                color: #98F4D9;
                outline: none;
                border:none;
              ">Login Here</button>
            </a>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
    <br>
@endsection
