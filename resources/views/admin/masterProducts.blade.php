<?php
function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}
?>

@extends('layout.main_admin')

@section('masterProductsContent')

<div class="container">
    <h3 style="margin-top: 30px">Master Products</h3>
    {{-- if session has message --}}

    @if (Session::has("message"))
        <h3 style="color: red">
        {{Session::get("message.isi")}}
        </h3>
    @endif


    {{-- forms --}}
    <h5 style="margin-top: 30px; color: darkslategray; font-weight: bold">Add New Item : </h5>
    <form action="{{url('/admin/doAddProduct')}}" id="formProducts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Product Name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" style="width: 70%;" placeholder="Product Name">
          @error('name')
          <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
         @enderror
        </div>
        <div class="mb-6">
            Product Photos
            <input type="file" name="photo[]" id="" class="form-control" multiple style="width: 70%" placeholder="Photos">
            @error('photo')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
       </div>
        <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Product Price</label>
            <input type="text" name="price" class="form-control" id="price" style="width: 70%;" placeholder="Product Price">
            @error('price')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Product Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Description" style="width: 70%;" ></textarea>
            @error('description')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Product Category</label> <br>
            <select class="form-select" aria-label="Default select example" name="category" style="width: 70%;" >
                @if (isset($kategories))
                    @foreach ($kategories as $kat )
                        <option value="{{$kat->id}}">{{$kat->nama}}</option>
                    @endforeach
                @endif
              </select>
            @error('category')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
        <br>
        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 30%;" value="" >Insert</button>
    </form>

    {{-- table --}}
    <h3 style="margin-top: 30px">Products List</h3>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Images</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (
               isset($products)
            )
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->kode}}</td>
                <td>{{$product->nama}}</td>
                <td>{{rupiah($product->harga)}}</td>
                <td>
                    @if (isset($categories))
                        @foreach ($categories as $cat )
                            @if ($cat->id==$product->fk_kategori)
                                {{$cat->nama}}
                            @endif
                        @endforeach
                    @endif
                </td>
                <td>

                    @if (isset($images))
                        @foreach($images as $img)
                        @if ($img->id_baju==$product->id)
                        <img src="{{ url('public/image/bajus/'.$img->nama_file) }}" style="height: 100px; width: 80px">
                        @endif
                        @endforeach
                    @endif
                </td>
                <td>

                    @if ($product->deleted_at==null)
                    <button type="submit" name="btnsubmit" class="btn btn-success" id="btnsubmit" value="">
                        <a href="{{url('/admin/toManageItem/'.$product->id)}}" style="text-decoration: none; color: white">Manage</a>
                   </button>
                    @else
                    <button type="submit" name="btnsubmit" class="btn btn-success" id="btnsubmit"  value="{{url('/admin/toManageItem/'.$product->id)}}" disabled>
                        <a href="" style="text-decoration: none; color: white">Manage</a>
                </button>
                    @endif


                    @if ($product->deleted_at==null)
                        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit"  value="">
                            <a href="{{url('/admin/products/edit/'.$product->id)}}" style="text-decoration: none; color: white">Edit</a>
                       </button>
                    @else
                    <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit"  value="" disabled>
                        <a href="{{url('/admin/products/edit/'.$product->id)}}" style="text-decoration: none; color: white">Edit</a>
                   </button>
                    @endif


                    @if ($product->deleted_at==null)
                        <button type="submit" name="btnsubmit" class="btn btn-danger" id="btnsubmit"  value="" >
                             <a href="{{url('/admin/doDeleteProduct/'.$product->id)}}" style="text-decoration: none; color: white">Delete</a>
                        </button>
                    @else
                        <button type="submit" name="btnsubmit" class="btn btn-info" id="btnsubmit"  value="" >
                             <a href="{{url('/admin/doDeleteProduct/'.$product->id)}}" style="text-decoration: none; color: white">Restore</a>
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
