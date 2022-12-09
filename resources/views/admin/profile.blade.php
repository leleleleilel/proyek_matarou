@extends('layout.main_admin')

@section('profileAdmin')

<div class="container">

    <h3 style="margin-top: 30px; font-weight: bold">My Profile</h3>

    @if (Session::has("message"))
      <h3 style="color: red">
      {{Session::get("message.isi")}}
      </h3>
    @endif

    <form action="{{url('admin/doEditProfile')}}" id="formDaftar" method="POST">
        @csrf
        <div class="mb-6">
          <label for="exampleInputEmail1" class="form-label" style="margin-top:20px">Username</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" style="width: 70%;" placeholder="Username" value="{{$user->username}}">
          @error('username')
          <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
         @enderror
        </div>
        <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" id="full_name" style="width: 70%;" placeholder="Full Name" value="{{$user->nama}}">
            @error('full_name')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Address</label>
            <input type="text" name="alamat" class="form-control" id="address" style="width: 70%;" placeholder="Address" value="{{$user->alamat}}">
            @error('alamat')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" id="phone" style="width: 70%;" placeholder="Phone Number" value="{{$user->no_telp}}">
            @error('phone')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="phone" style="width: 70%;" placeholder="Email" value="{{$user->email}}">
            @error('email')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
        <div class="mb-6">
          <label for="exampleInputPassword1" class="form-label">New Password</label>
          <input type="password" name="password" class="form-control" id="password" style="width: 70%;"placeholder="Password">
          @error('password')
          <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
         @enderror
        </div>
        <div class="mb-6">
            <label for="exampleInputPassword1" class="form-label">Current Password</label>
            <input type="password" name="newpassword" class="form-control" id="newpassword" style="width: 70%;"placeholder="New Password">
            @error('newpassword')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
        <br>
        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 30%; margin-bottom: 50px" value="" >Edit</button>
      </form>

</div>

@endsection
