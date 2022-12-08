@extends('layout.master')
@section('content')
    <div class="contact-page">
      <div class="container">
            <div class="row">
            <div class="col-12 col-lg-7 ">
                  <form action="" id="formDaftar" method="POST">
                    <div class="mb-6">
                      <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Username</label>
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" style="width: 70%;" value="" disabled>
                    </div>
                    <div class="mb-6">
                      <label for="exampleInputAlamat" class="form-label">Address</label>
                      <input type="text" name="alamat" class="form-control" id="address" style="width: 70%;" value="">
                    </div>
                    <div class="mb-6">
                      <label for="exampleInputAlamat" class="form-label">Full Name</label>
                      <input type="text" name="full_name" class="form-control" id="full_name" style="width: 70%;"value="">
                    </div>
                    <div class="mb-6">
                      <label for="exampleInputAlamat" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" style="width: 70%;"value="">
                    </div>
                    <div class="mb-6">
                      <label for="exampleInputAlamat" class="form-label">Phone Number</label>
                      <input type="text" name="phone" class="form-control" id="phone" style="width: 70%;" value="">
                    </div>
                    <br>
                    <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 70%;" value="DAFTAR" >Edit</button>
                    <div class="mb-6">
                      <br>
                      <label for="" class="form-label" id="loading_daftar" style="font-weight:bold">Updated</label> <br>
                      <label for="" class="form-label" id="keterangan"style="font-weight:bold"></label>
                    </div>
                  </form>
                </div>
                <div class="col-12 col-lg-5 py-5">
                <form action="#" id="formPass" method="POST">
                        <div class="mb-6">
                          <label for="exampleInputPassword1" class="form-label">Current Password</label>
                          <input type="password" name="password" class="form-control" id="input_password" style="width: 90%;" placeholder="Current Password">
                        </div>
                        <div class="mb-6">
                          <label for="exampleInputPassword1" class="form-label">New Password</label>
                          <input type="password" name="new_password" class="form-control" id="input_new_password" style="width: 90%;" placeholder="New Password">
                        </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-dark" id="submitpass" style="width: 90%;" value="DAFTAR"
                        >Change Password</button>
                        <br>
                      <div class="mb-6">
                        <br>
                        <label for="" class="form-label" id="loading_daftar1" style="font-weight:bold">Loading...</label> <br>
                        <label for="" class="form-label" id="keterangan1"style="font-weight:bold"></label>
                      </div>
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
