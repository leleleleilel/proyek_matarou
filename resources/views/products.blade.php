<?php
function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}
?>
@extends('layout.master')
@section('content')

    <div class="featured-page">
      <div class="container">
      <form action="" method="get">
      {{-- @csrf --}}
            <input type="text" name="keyword" placeholder="Search..." style="width: 300px; border-radius: 5px"
            value="{{$keyword}}">
            <button type="submit" name="btnSearch" id="btnsearch"
            style="background-color: black; border-radius: 5px; color: white; padding-left: 15px; padding-right: 15px;"
            >Search</button>
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
              <form action="" method="get">
              {{-- @csrf --}}
              <select name="filter" id="filterkategori" class="cmbkategori" onchange="this.form.submit()" style="width: 40%; height: 30px; border-radius: 5px;font-size: 18px; margin-top: 20px; border: 1px solid black">
                  <option value="all" selected>All</option>
                  @if (isset($kategori))
                    @foreach ($kategori as $kat)
                      @if ($kat->id==$temp)
                        <option value="{{$kat->id}}" selected>{{$kat->nama}}</option>
                      @else
                        <option value="{{$kat->id}}">{{$kat->nama}}</option>
                      @endif
                    @endforeach
                  @endif
                </select>
              </form>
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

                    @if (auth()->check())
                        <a href="{{url('/customer/product/'.$product->id)}}">
                    @else
                        <a href="{{url('/product/'.$product->id)}}">
                    @endif

                    <div class="featured-item">
                      <img style="max-width:100% ; background-size: cover;" src="{{ url('public/image/bajus/'.$product->nama_file) }}" alt="">
                      <h4>{{$product->nama}}</h4>
                      <h6 style="color: black;">{{rupiah($product->harga)}}</h6>
                    </div>
                  </a>
                </div>
              @endforeach
            @endif
            {{-- end for --}}
        </div>
    </div>

    <div class="h-100 d-flex align-items-center justify-content-center" style="margin-bottom:50px">
        {{$products->links('pagination::bootstrap-4')}}
      </div>

@endsection

@section('banner')
    <div id="banner2" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner2.jpg')}}); background-size: cover; background-position: center;">
    </div>
    <div id="banner3" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner3.jpg')}}); background-size: cover; background-position: center;">
    </div>
@endsection
