@extends('layout.main_admin')

@section('editBajuContent')

<div class="container">
    <h3 style="margin-top: 30px">Edit Item</h3>


    @if (Session::has("message"))
        <h3 style="color: red">
        {{Session::get("message.isi")}}
        </h3>
    @endif

    <h1 style="margin-top: 30px; font-weight: bold">
        @if (isset($item))
            {{$item->nama}} - {{$item->kode}}
        @endif
    </h1>

    <h3 style="margin-top: 30px">Item Pictures :</h3>
    <div class="blog py-5">
        <div class="container">
            <div class="row">
                @if (isset($images))
                @foreach($images as $img)
               @if ($img->id_baju==$item->id)
                      <div class="card  bg-dark border-dark mb-3" style="width: 40rem; margin-right: 10px">
                          <img src="{{ url('public/image/bajus/'.$img->nama_file) }}" style="height: 180px; width: 120px; margin-top: 10px" class="rounded mx-auto d-block" alt="Card image cap" >
                          <div class="card-body">
                            <div class="card-footer bg-transparent border-l">
                                <form action="" method="POST" style="text-align: center; left: 0; right: 0;">
                                    @csrf
                                    <a href="{{url('/admin/doDeleteFoto/'.$img->id)}}" class="btn btn-danger" style="">Delete</a>
                                </form>
                            </div>
                          </div>
                      </div>
                      <br>
                @endif
             @endforeach
           @endif

            </div>
        </div>
    </div>

    <h3 style="margin-top: 1px">Item Details :</h3>
    <form action="" id="formProducts" method="POST" enctype="multipart/form-data">
         {{-- upload and edit image  --}}
        @csrf
        <input type="hidden" name="id_item" value="{{$item->id}}">
        <div class="mb-6">
        <label for="exampleInputEmail1" class="form-label" style="">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" style="width: 70%;" placeholder="Product Name" value="{{$item->nama}}">
        @error('name')
        <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
        @enderror
        </div>
        <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Product Price</label>
            <input type="text" name="price" class="form-control" id="price" style="width: 70%;" placeholder="Product Price" value="{{$item->harga}}">
            @error('price')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
        @enderror
        </div>
        <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Add More Pictures</label>
            <input type="file" name="photo[]" id="" class="form-control" multiple style="width: 70%" placeholder="Photos">
            @error('photo')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
       </div>
        <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Product Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Description" style="width: 70%;">{{$item->deskripsi}}</textarea>
            @error('description')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
        @enderror
        </div>
        <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Product Category</label> <br>
            <select class="form-select" aria-label="Default select example" name="category" style="width: 70%;" >
                @if (isset($kategories))
                    @foreach ($kategories as $kat )
                        @if ($kat->id==$item->fk_kategori)
                            <option value="{{$kat->id}}" selected>{{$kat->nama}}</option>
                        @else
                            <option value="{{$kat->id}}">{{$kat->nama}}</option>
                        @endif

                    @endforeach
                @endif
            </select>
            @error('category')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
        @enderror
        </div>
        <br>
        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 30%;" value="" >Edit</button>
    </form>




</div>

@endsection
