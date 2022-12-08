@extends('layout.main_admin')

@section('masterProductsContent')

<div class="container">
    <h3 style="margin-top: 30px">Master Products</h3>
    {{-- if session has message --}}

    {{-- forms --}}
    <form action="" id="formProducts" method="POST" enctype="multipart/form-data">
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
            @error('photo[]')
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
                <option selected>Open this select menu</option>
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

</div>

@endsection
