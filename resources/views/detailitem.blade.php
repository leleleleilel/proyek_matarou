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
                </div>
                <div class="row">
                    <div class="col-12 col-lg-5" style="">
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
                    <div class="col-12 col-lg-7" style="background-color: yellow">
                        <h2>{{$baju->nama}}</h2>
                        <div>Rp {{$baju->harga}}</div>
                        <div>{{$baju->deskripsi}}</div>
                        <div>Size : </div>
                        <select name="" id="">
                            @foreach ( as )

                            @endforeach
                        </select>
                    </div>
                <br>
                </div>
                <br>
                <br>
                <button type="submit" name="btnback" class="btn btn-dark" style="margin-top: 20px; width: 120px;">Back</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
