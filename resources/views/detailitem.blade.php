
<?php
function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}
?>
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
                            @if (count($foto_baju)>1)
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol>
                            @endif
                            <div class="carousel-inner">
                                @php
                                    $i=0
                                @endphp
                                @foreach ($foto_baju as $f)
                                @if ($i==0)
                                    <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                @endif
                                @php
                                    $i++;
                                @endphp
                                    <img class="d-block w-100" src="{{ url('public/image/bajus/'.$f->nama_file) }}" >
                                </div>

                                @endforeach
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
                        <h2 style="font-weight: lighter">{{rupiah($baju->harga)}}</h2>
                        <div class="mb-4">{{$baju->deskripsi}}</div>
                        <h4 style="font-weight: bolder">Size : </h4>
                        <select class="form-control" name="selectSize" id="">
                            @foreach ($size as $s)
                                <option value="{{$s->id}}">{{$s->kode}}</option>
                            @endforeach
                        </select>
                        <br>
                        <input class="form-control" type="submit" class="btn btn-light" name="btnAddToCart"
                        style="background-color: #FDFDFD;
                        border-color:#6D6D6D;" value="Add To Cart">

                        <div style="font-weight: bolder" style="color: red;font-size:50px;">
                            {{session()->get('msg')}}
                        </div>
                    </div>
                <br>
                </div>
                <br>
                <br>
                {{-- Reviews --}}


                @if (count($review)>0)
                <div>
                    <div class="jumbotron" style="background-color: #252525;color:white">
                        <div class="row mb-4">
                            {{-- Avg Review & All REviews --}}
                            <h4 class="col-6">{{number_format(($avg/count($review)),1)}}/5</h4>
                            {{-- See All perlu onclick biar pindah hal --}}
                            <h4 class="col-6 d-flex flex-row-reverse" id="seeAll" onclick="hide()" style="display: block">See All ({{count($review)}})</h4>
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
                          @else
                          <div class="row" id="reviewHide" style="display: none">
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
                          @endif
                          <div hidden>
                            {{$ctr++}}
                          </div>
                        @endforeach
                      </div>
                </div>
                @endif

                <br>
                <br>
            </form>
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/06ab807719.js" crossorigin="anonymous"></script>
<script>
    function hide() {
        var x = document.getElementById("reviewHide");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>
@endsection
