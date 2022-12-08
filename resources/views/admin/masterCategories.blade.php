@extends('layout.main_admin')

@section('masterCategoriesContent')

<div class="container">

    <h3 style="margin-top: 30px">Master Categories</h3>

    {{-- if session has message here --}}

    @if (Session::has("message"))
        <h3 style="color: red">
        {{Session::get("message.isi")}}
        </h3>
    @endif


    {{-- forms --}}
    <form action="{{url('/admin/doTambahKategori')}}" id="formKategori" method="POST">
        @csrf
        @if ($mode==2)
            <input type="hidden" name="id_edit" value="{{$kategori->id}}">
        @else
            <input type="hidden" name="id_edit" value="-1">
        @endif
        <div class="mb-6">
          <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Category Name</label>
          @if (isset($kategori))
             <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" style="width: 70%;" placeholder="Category Name" value="{{$kategori->nama}}">

          @else
             <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" style="width: 70%;" placeholder="Category Name" >
          @endif

          @error('name')
          <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
         @enderror
        </div>
        <br>
        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 30%;" value="" >
        @if ($mode==1)
            Insert
        @else
            Edit
        @endif
        </button>
      </form>


    {{-- table --}}
    <h3 style="margin-top: 30px">Categories List</h3>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (
               isset($kategories)
            )
            @foreach ($kategories as $kat)
            <tr>
                <td>{{$kat->id}}</td>
                <td>{{$kat->nama}}</td>
                <td>
                    @if ($kat->deleted_at==null)
                        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 15%;" value="">
                            <a href="{{url('/admin/edit/category/'.$kat->id)}}" style="text-decoration: none; color: white">Edit</a>
                       </button>
                    @else
                    <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 15%;" value="" disabled>
                        <a href="{{url('/admin/edit/category/'.$kat->id)}}" style="text-decoration: none; color: white">Edit</a>
                   </button>
                    @endif


                    @if ($kat->deleted_at==null)
                        <button type="submit" name="btnsubmit" class="btn btn-danger" id="btnsubmit" style="width: 15%;" value="" >
                             <a href="{{url('/admin/doDeleteKategori/'.$kat->id)}}" style="text-decoration: none; color: white">Delete</a>
                        </button>
                    @else
                        <button type="submit" name="btnsubmit" class="btn btn-info" id="btnsubmit" style="width: 15%;" value="" >
                             <a href="{{url('/admin/doDeleteKategori/'.$kat->id)}}" style="text-decoration: none; color: white">Restore</a>
                        </button>
                    @endif

                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
      </table>

</div>

@endsection
