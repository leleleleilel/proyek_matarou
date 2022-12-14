<?php
function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}
?>

@extends('layout.master')
@section('content')
<div class="banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),
                       rgba(0, 0, 0, 0.5)), url('{{asset('asset/images/banner/banner.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="caption">
                    <h1>Why do we use it?</h1>
                    <p> Matarou is a local product that is perfect for you lovers of casual looks or for those of you who usually collect casual looks.
                    Matarou provides a variety of trendy looks for women and is also certainly up to date with current fashion developments.
                    <br><br>Matarou provides a wide selection of women's fashion ranging from korean looks, western looks, with various fashion categories ranging from shorts, jackets, shirts, t-shirts. So what are you waiting for?.</p>
                    <div class="main-button">
                        @if (auth()->check())
                            <a href="{{url('customer/catalogue')}}" style="background-color: transparent">
                        @else
                            <a href="{{url('/catalogue')}}" style="background-color: transparent">
                        @endif
                            <button class="btn btn-dark" name="btnOrder" id="btnshop">
                                Shop Now
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- carousel product --}}
<div class="featured-items" style="margin-bottom:100px">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="headsection">
            <div class="line-dec"></div>
            <h1>Trending Today</h1>
          </div>
          <div class="carousel slide" data-ride="carousel" id="mycarousel">
            <ol class="carousel-indicators">
              <li class="active" data-slide-to="0" data-target = "#mycarousel"></li>
              <li data-slide-to ="1" data-target = "#mycarousel"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  @if (isset($listbaju))
                    @foreach ($listbaju as $key=> $baju)
                      @if ($key<3)
                        <div id="1" class="item new col-md-4">
                        @if (auth()->check())
                            <a href="{{url('/customer/product/'.$baju->id)}}">
                        @else
                            <a href="{{url('/product/'.$baju->id)}}">
                        @endif
                            <div class="featured-item" style="min-height:550px">
                              <img style="max-width:100% ; background-size: cover;" src="{{ url('public/image/bajus/'.$baju->nama_file) }}" alt="">
                              <h4>{{$baju->nama}}</h4>
                              <h6 style="color: black;">{{$baju->deskripsi}}</h6>
                            </div>
                          </a>
                        </div>
                      @endif
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  @if (isset($listbaju))
                    @foreach ($listbaju as $key=> $baju)
                      @if ($key>3 && $key<7)
                        <div id="1" class="item new col-md-4">
                            @if (auth()->check())
                                <a href="{{url('/customer/product/'.$baju->id)}}">
                            @else
                                <a href="{{url('/product/'.$baju->id)}}">
                            @endif
                            <div class="featured-item" style="min-height:550px;">
                              <img style="max-width:100% ; background-size: cover;" src="{{ url('public/image/bajus/'.$baju->nama_file) }}" alt="">
                              <h4>{{$baju->nama}}</h4>
                              <h6 style="color: black;">{{$baju->deskripsi}}</h6>
                            </div>
                          </a>
                        </div>
                      @endif
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  {{-- carousel review --}}
<div class="featured-items" style="margin-bottom:100px">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="headsection">
            <div class="line-dec"></div>
            <h1>Best Reviews</h1>
          </div>
          <div class="carousel slide" data-ride="carousel" id="mycarousel">
            <ol class="carousel-indicators">
              <li class="active" data-slide-to="0" data-target = "#mycarousel"></li>
              <li data-slide-to ="1" data-target = "#mycarousel"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  @if (isset($listreview))
                    @foreach ($listreview as $key=> $review)
                      @if ($key<3)
                        <div id="1" class="item new col-md-4">
                          <a href="">
                            <div class="featured-item" style="min-height:250px; background-color: black; ">
                              {{-- <img style="max-width:100% ;background-size: cover;" src="{{ url('public/image/bajus/'.$baju->nama_file) }}" alt=""> --}}
                              @if (isset($listbaju))
                                @foreach ($listbaju as $baju)
                                    @if ($baju->id==$review->fk_baju)
                                        <h4 style="color: white">{{$baju->nama}}</h4>
                                    @endif
                                @endforeach
                              @endif
                              @if (isset($listhtrans))
                                @foreach ($listhtrans as $htrans)
                                    @if ($htrans->id==$review->fk_htrans)
                                        <h6 style=" color: white">{{$htrans->tanggal_trans}}</h6>
                                    @endif
                                @endforeach
                              @endif
                              <h6 style="color: black; color: white">{{$review->deskripsi_review}}</h6>
                            </div>
                          </a>
                        </div>
                      @endif
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  @if (isset($listreview))
                    @foreach ($listreview as $key=> $review)
                      @if ($key>3 && $key<7)
                        <div id="1" class="item new col-md-4">
                          <a href="">
                            <div class="featured-item" style="min-height:250px; background-color: black">
                              {{-- <img style="max-width:100%; height:320px; background-size: cover;" src="{{ url('public/image/bajus/'.$baju->nama_file) }}" alt=""> --}}
                              @if (isset($listbaju))
                                @foreach ($listbaju as $baju)
                                    @if ($baju->id==$review->fk_baju)
                                        <h4 style="color: white">{{$baju->nama}}</h4>
                                    @endif
                                @endforeach
                              @endif
                              @if (isset($listhtrans))
                                @foreach ($listhtrans as $htrans)
                                    @if ($htrans->id==$review->fk_htrans)
                                        <h6 style="color: white">{{$htrans->tanggal_trans}}</h6>
                                    @endif
                                @endforeach
                              @endif
                              <h6 style="color: black; color: white">{{$review->deskripsi_review}}</h6>
                            </div>
                          </a>
                        </div>
                      @endif
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('banner')
    <div id="banner2" style="height: 1000px; width: 100%; background-image: url({{asset('asset/images//banner/collection.gif')}}); background-size: cover; background-position: center;">
    </div>
@endsection
