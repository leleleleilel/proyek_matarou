@extends('layout.main_admin')

@section('manageSizeStokContent')

<div class="container">
    <h3 style="margin-top: 30px">Manage Item Sizes and Stocks</h3>
    {{-- if session has message --}}

    @if (Session::has("message"))
        <h3 style="color: red">
        {{Session::get("message.isi")}}
        </h3>
    @endif

    {{-- product information --}}
    <h1 style="margin-top: 30px; font-weight: bold">
        @if (isset($item))
            {{$item->nama}} - {{$item->kode}}
        @endif
    </h1>

    {{-- carousel photo --}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 30%;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

        @if (isset($images))
            @php
                $i = 0;
            @endphp
            @foreach ($images as $img)
            @if ($i==0)
            <div class="item active">
                <img src="{{ url('public/image/bajus/'.$img->nama_file) }}"  style="width:60%;"class="rounded mx-auto d-block">
              </div>

            @else
            <div class="item">
                <img src="{{ url('public/image/bajus/'.$img->nama_file) }}" style="width:60%;" class="rounded mx-auto d-block">
              </div>
            @endif
            @php
            $i = $i+1;
        @endphp
            @endforeach
        @endif

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    <h3 style="margin-top: 30px; font-weight: bold">Manage :</h3>
    {{--form--}}
    <form action="{{url('/admin/masters/products/sizes')}}" id="formProducts" method="POST">
        @csrf
        <input type="hidden" name="id_product" value="{{$item->id}}">
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Size</label> <br>
            <select class="form-select" aria-label="Default select example" name="size" style="width: 70%;" >
                @if (isset($sizes))
                    @foreach ($sizes as $size )
                        <option value="{{$size->id}}">{{$size->nama}}</option>
                    @endforeach
                @endif
              </select>
            @error('size')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputEmail1" class="form-label" style="">Quantity</label>
            <input type="text" class="form-control" id="qty" name="qty" aria-describedby="emailHelp" style="width: 70%;" placeholder="Quantity">
            @error('qty')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
        <br>
        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 30%;" value="" >Insert</button>
    </form>
</div>

  {{-- table / list  --}}
  <h3 style="margin-top: 30px">Sizes and Stocks List</h3>

  <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Product Code</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Size</th>
          <th scope="col">Product Stock</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if (
             isset($dbajus)
          )
          @foreach ($dbajus as $dbaju)
          <tr>
              <td>{{$dbaju->id}}</td>
              <td>{{$item->kode}}</td>
              <td>{{$item->nama}}</td>
              <td>
                    @if (isset($sizes_dbaju))
                        @foreach ($sizes_dbaju as $sz )
                            {{$sz->nama}}
                        @endforeach
                    @endif
              </td>
              <td>{{$dbaju->stok}}</td>
              <td>

                   @if ($dbaju->deleted_at==null)
                        <button type="submit" name="btnsubmit" class="btn btn-danger" id="btnsubmit" value="" >
                             <a href="{{url('/admin/doDeleteSizeStock/'.$dbaju->id)}}" style="text-decoration: none; color: white">Delete</a>
                        </button>
                    @else
                        <button type="submit" name="btnsubmit" class="btn btn-info" id="btnsubmit" value="" >
                             <a href="{{url('/admin/doDeleteSizeStock/'.$dbaju->id)}}" style="text-decoration: none; color: white">Restore</a>
                        </button>
                    @endif
              </td>
          </tr>
          @endforeach
          @endif
      </tbody>
    </table>

@endsection
