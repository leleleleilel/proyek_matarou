@extends('layout.master')

@section('content')
    <div class="featured-page">
      <div class="container">
      <form action="products.php" method="POST">
            <input type="text" name="keyword" placeholder="Search..." style="width: 300px;"
            value="">
            <button name="btnSearch" id="btnsearch">Search</button>
      </form>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="headsection">
              <div class="line-dec" style="background-color:black"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group" style="margin-top:50px">
              <select name="filter" id="">
                @if (isset($kategori))
                  @foreach ($kategori as $kat)
                    <option value="{{$kat->id}}">{{$kat->nama}}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="featured container no-gutter">

        <div class="row posts">
            {{-- start for --}}
            @if (isset($products))
              @foreach ($products as $product)
                <div id="1" class="item new col-md-4">
                  <a href="">
                    <div class="featured-item">
                      @if (isset($images))
                        @foreach($images as $image)
                          @if ($image->id_baju==$product->id)
                            <img style="width:280px; height:320px; background-size: cover;" src="{{ url('public/image/bajus/'.$image->nama_file) }}" alt="">
                          @endif
                        @endforeach
                      @endif
                      <h4>{{$product->nama}}</h4>
                      <h6 style="color: black;">Rp {{$product->harga}}</h6>
                      <a href=""><button name="btnTambah" class="btn btn-dark" value="idBaju">Add To Cart</button></a>
                    </div>
                  </a>
                </div>
              @endforeach
            @endif
            {{-- end for --}}
        </div>
    </div>

    <div class="page-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
                <li>
                    {{-- Ini << --}}
                    <a href=""  style="color:white;background-color:#000000;font-size:28px;font-weight:bold">
                        &laquo
                    </a>
                </li>
                <li>
                    {{-- Ini Halaman Aktif --}}
                    <a href="" style="color:white;background-color:gray;font-size:28px;font-weight:bold">
                        3
                    </a>
                </li>
                <li>
                    {{-- Ini Halaman Lain --}}
                    <a href=""style="color:white;background-color:#000000;font-size:28px;font-weight:bold">
                        4
                    </a>
                </li>
                <li>
                    {{-- Ini >> --}}
                    <a href=""style="color:white;background-color:#000000;font-size:28px;font-weight:bold">
                         &raquo
                     </a>
                </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('banner')
    <div id="banner2" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner2.jpg')}}); background-size: cover; background-position: center;">
    </div>
    <div id="banner3" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner3.jpg')}}); background-size: cover; background-position: center;">
    </div>
@endsection
