@extends('layout.main_admin')

@section('masterUsersContent')

<div class="container">
    <h3 style="margin-top: 30px">Master Users</h3>

    {{-- sesssion error message --}}
    @if (Session::has("message"))
        <h3 style="color: red">
        {{Session::get("message.isi")}}
        </h3>
    @endif

    {{-- form  --}}
    <h5 style="margin-top: 30px; color: darkslategray; font-weight: bold">Add New Admin : </h5>
    <form action="{{url('/admin/doTambahAdmin')}}" id="formDaftar" method="POST">
        @csrf
        <div class="mb-6">
          <label for="exampleInputEmail1" class="form-label" style="margin-top:20px">Username</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" style="width: 70%;" placeholder="Username">
          @error('username')
          <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
         @enderror
        </div>
        <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" id="full_name" style="width: 70%;" placeholder="Full Name">
            @error('full_name')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Address</label>
            <input type="text" name="alamat" class="form-control" id="address" style="width: 70%;" placeholder="Address">
            @error('alamat')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" id="phone" style="width: 70%;" placeholder="Phone Number">
            @error('phone')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="phone" style="width: 70%;" placeholder="Email">
            @error('email')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
        <div class="mb-6">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" style="width: 70%;"placeholder="Password">
          @error('password')
          <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
         @enderror
        </div>
        <br>
        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 30%;" value="" >Insert New Admin</button>
      </form>

    {{-- table --}}
    <h3 style="margin-top: 30px">Customers and Administrators List</h3>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (
               isset($users)
            )
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>
                    @if ($user->role=="admin")
                        {{$user->password}}
                    @endif
                </td>
                <td>{{$user->nama}}</td>
                <td>{{$user->alamat}}</td>
                <td>{{$user->no_telp}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 35%;" value="">
                        <a href="{{url('/admin/edit/user/'.$user->id)}}" style="text-decoration: none; color: white">Edit</a>
                    </button>
                    <button type="submit" name="btnsubmit" class="btn btn-danger" id="btnsubmit" style="width: 45%;" value="" >
                    <a href="" style="text-decoration: none; color: white">Delete</a>
                    </button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
      </table>


</div>
@endsection
