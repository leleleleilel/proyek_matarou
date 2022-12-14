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
    @if ($mode==1)
      <h5 style="margin-top: 30px; color: darkslategray; font-weight: bold">Add New Admin : </h5>
    @else
      <h5 style="margin-top: 30px; color: darkslategray; font-weight: bold">Edit User </h5>
    @endif

    <form action="{{url('/admin/doTambahAdmin')}}" id="formDaftar" method="POST">
        @csrf

        @if ($mode==2)
          <input type="hidden" name="id_user" value="{{$user->id}}">
        @else
        <input type="hidden" name="id_user" value="-1">
        @endif

        <div class="mb-6">
          <label for="exampleInputEmail1" class="form-label" style="margin-top:20px">Username</label>

          @if (isset($user))
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" style="width: 70%;" placeholder="Username" value="{{$user->username}}">
          @else
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" style="width: 70%;" placeholder="Username">
          @endif


          @error('username')
          <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
         @enderror
        </div>
        <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Full Name</label>

            @if (isset($user))
              <input type="text" name="full_name" class="form-control" id="full_name" style="width: 70%;" placeholder="Full Name" value="{{$user->nama}}">
            @else
              <input type="text" name="full_name" class="form-control" id="full_name" style="width: 70%;" placeholder="Full Name">
            @endif

            @error('full_name')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Address</label>

            @if (isset($user))
              <input type="text" name="alamat" class="form-control" id="address" style="width: 70%;" placeholder="Address" value="{{$user->alamat}}">
            @else
              <input type="text" name="alamat" class="form-control" id="address" style="width: 70%;" placeholder="Address">
            @endif

            @error('alamat')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Phone Number</label>

            @if (isset($user))
                <input type="text" name="phone" class="form-control" id="phone" style="width: 70%;" placeholder="Phone Number" value="{{$user->no_telp}}">
            @else
               <input type="text" name="phone" class="form-control" id="phone" style="width: 70%;" placeholder="Phone Number">
            @endif


            @error('phone')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Email</label>

            @if (isset($user))
              <input type="text" name="email" class="form-control" id="phone" style="width: 70%;" placeholder="Email" value="{{$user->email}}">
            @else
            <input type="text" name="email" class="form-control" id="phone" style="width: 70%;" placeholder="Email" >
            @endif


            @error('email')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>

        <br>
        @if ($mode==1)
           <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 30%;">Insert New Admin</button>
        @else
           <button type="submit" name="btnsubmit" class="btn btn-dark"s id="btnsubmit" style="width: 30%;">Edit</button>
        @endif

      </form>

    {{-- table --}}
    <h3 style="margin-top: 30px">Customers and Administrators List</h3>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
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
                <td>{{$user->nama}}</td>
                <td>{{$user->alamat}}</td>
                <td>{{$user->no_telp}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>

                    @if ($user->deleted_at==null)
                      <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" value="">
                        <a href="{{url('/admin/edit/user/'.$user->id)}}" style="text-decoration: none; color: white">Edit</a>
                      </button>
                    @else
                      <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" value="" disabled>
                        <a href="{{url('/admin/edit/user/'.$user->id)}}" style="text-decoration: none; color: white">Edit</a>
                     </button>
                    @endif



                    @if ($user->deleted_at==null)
                      <button type="submit" name="btnsubmit" class="btn btn-danger" id="btnsubmit" value="" >
                        <a href="{{url('/admin/doDeleteUser/'.$user->id)}}" style="text-decoration: none; color: white">Delete</a>
                      </button>
                    @else
                      <button type="submit" name="btnsubmit" class="btn btn-info" id="btnsubmit" value="" >
                        <a href="{{url('/admin/doDeleteUser/'.$user->id)}}" style="text-decoration: none; color: white">Restore</a>
                      </button>
                    @endif


                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
      </table>

      <div class="h-100 d-flex align-items-center justify-content-center" style="margin-bottom:50px">
        {{$users->links('pagination::bootstrap-4')}}
      </div>

</div>
@endsection
