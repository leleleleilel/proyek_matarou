@extends('layout.master')
@section('content')
<div class="contact-page">
    <div class="container">
        <div class="col-md-12">
            <div class="headsection">
                <div class="line-dec" style="background-color: black"></div>
                    <br>
                    <h1>Product Detail</h1><br>
                    <form action="" method="post">
                        @csrf
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-lg-5" style="">
                        {{-- Carousel Gambar Baju --}}
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ url('public/image/bajus/'.$foto_baju->nama_file) }}" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{ url('public/image/bajus/'.$foto_baju->nama_file) }}" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{ url('public/image/bajus/'.$foto_baju->nama_file) }}" alt="Third slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        {{-- Ket Baju --}}
                        <h2 style="font-weight: bolder">{{$baju->nama}}</h2>
                        <h2 style="font-weight: lighter">Rp {{$baju->harga}}</h2>
                        <div class="mb-4">{{$baju->deskripsi}}</div>
                        <h4 style="font-weight: bolder">Size : </h4>
                        <select class="form-control" name="" id="">
                            @foreach ($size as $s)
                                <option value="{{$s->stok}}">{{$s->nama}}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="form-control" type="button" class="btn btn-light" style="background-color: #FDFDFD;border-color:#6D6D6D;">Add To Cart</button>
                    </div>
                <br>
                </div>
                <br>
                <br>
                {{-- Reviews --}}
                <div>
                    <div class="jumbotron" style="background-color: #252525;color:white">
                        <div class="row mb-4">
                            {{-- Avg Review & All REviews --}}
                            <h4 class="col-6">{{$avg/count($review)}}/5</h4>
                            {{-- See All perlu onclick biar pindah hal --}}
                            <h4 class="col-6 d-flex flex-row-reverse">See All ({{count($review)}})</h4>
                        </div>
                        <div hidden>
                          {{$ctr=0}}
                        </div>
                        @foreach ($review as $r)
                          @if ($ctr<3)
                          <div class="row">
                              <div class="col">
                                  {{-- Template Review --}}
                                  <div class="" style="
                                      color:#252525;
                                      padding: 20px;
                                      border-radius: 0.3rem;
                                      margin-bottom: 2rem;
                                      background-color: #FFFFFF">
                                      <div>{{$r->username}}</div>
                                      <div>
                                        @for ($i = 0;$i<$r->rate;$i++)
                                          <i class="fa fa-star fa-1x mr-2"></i>
                                        @endfor
                                      </div>
                                      <div>{{$r->deskripsi_review}}</div>
                                  </div>
                              </div>
                          </div>
                          <div hidden>
                            {{$ctr++}}
                          </div>
                          @endif
                        @endforeach
                      </div>
                </div>
                <br>
                <br>
                <button type="submit" name="btnback" class="btn btn-dark" style="margin-top: 20px; width: 120px;">Back</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/06ab807719.js" crossorigin="anonymous"></script>
@endsection
