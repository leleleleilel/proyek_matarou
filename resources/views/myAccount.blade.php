@extends('layout.master')
@section('content')
    <div class="contact-page">
      <div class="container">
            <div class="row">
            <div class="col-12 col-lg-7 ">
                @if (Session::has("message"))
                    <h3 style="color: red; font-weight: bold; text-align: center">
                        {{Session::get("message.isi")}}
                    </h3>
                @endif
                  <form action="{{url('customer/myAccount/doEditProfile')}}" id="formDaftar" method="POST">
                    @csrf
                    <div class="mb-6">
                      <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Username</label>
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" style="width: 70%;" value="{{$user->username}}" disabled>
                      @error('username')
                        <div class="error" style="color: red">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="mb-6">
                      <label for="exampleInputAlamat" class="form-label">Address</label>
                      <input type="text" name="alamat" class="form-control" id="address" style="width: 70%;" value="{{$user->alamat}}">
                      @error('alamat')
                        <div class="error" style="color: red">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="mb-6">
                      <label for="exampleInputAlamat" class="form-label">Full Name</label>
                      <input type="text" name="nama" class="form-control" id="full_name" style="width: 70%;"value="{{$user->nama}}">
                        @error('nama')
                        <div class="error" style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                      <label for="exampleInputAlamat" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" style="width: 70%;"value="{{$user->email}}">
                        @error('email')
                        <div class="error" style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                      <label for="exampleInputAlamat" class="form-label">Phone Number</label>
                      <input type="text" name="no_telp" class="form-control" id="phone" style="width: 70%;" value="{{$user->no_telp}}">
                        @error('no_telp')
                        <div class="error" style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 70%;" value="DAFTAR" >Edit</button>
                  </form>
                </div>
                <div class="col-12 col-lg-5 py-5">
                <form action="{{url('customer/myAccount/doEditPassword')}}" id="formPass" method="POST">
                        @csrf
                        <div class="mb-6">
                          <label for="exampleInputPassword1" class="form-label">Current Password</label>
                          <input type="password" name="password" class="form-control" id="input_password" style="width: 90%;" placeholder="Current Password">
                          @error('password')
                              <div class="error" style="color: red">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="mb-6">
                          <label for="exampleInputPassword1" class="form-label">New Password</label>
                          <input type="password" name="newpassword" class="form-control" id="input_new_password" style="width: 90%;" placeholder="New Password">
                          @error('newpassword')
                          <div class="error" style="color: red">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="mb-6">
                            <label for="exampleInputPassword1" class="form-label">Confirmation New Password</label>
                            <input type="password" name="confirm" class="form-control" id="input_new_password" style="width: 90%;" placeholder="New Password">
                            @error('confirm')
                            <div class="error" style="color: red">{{$message}}</div>
                            @enderror
                          </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-dark" id="submitpass" style="width: 90%;" value="DAFTAR"
                        >Change Password</button>
                        <br>
                    </form>
                </div>
            </div>
          </div>
        </div>
@endsection
@section('banner')
    <div id="banner2" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner2.jpg')}}); background-size: cover; background-position: center;">
    </div>
@endsection
