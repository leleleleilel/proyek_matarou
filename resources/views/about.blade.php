@extends('layout.master')
@section('content')
    <div class="about-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="headsection">
              <div class="line-dec"></div>
              <h1>About Us</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-image">
              <img src="{{asset('asset/images/banner/aboutus.jpg')}}" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4>Matarou Fashion</h4>
              <p>For those who don't know what Matarou is. Matarou is a local fashion product that uses warm, smooth and environmentally friendly materials. Matarou follows today's fashion styles and provides styles for young people to adults.</p>
              <br>
              <p>The styles provided are from various parts of the world, we provide western styles, Asian styles, and many more. The price is also affordable according to the quality of our products.</p>
              <br>
              <p>Our delivery is fast, and we also free shipping. So don't worry about shopping with us. For delivery on the island of Java it will take from two-three working days. while outside Java it will take a maximum of ten working days.</p>
              <br>
              <p>Our collection will be updated every time there is a new collection, our collection is aesthetic and also suitable for all of you who like aesthetic fashion. So what are you waiting for?.</p>
              <div class="share">
              <h6>Find us on: <span><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a><a href="https://twitter.com/home"><i class="fa fa-twitter"></i></a></span></h6>
              </div>
            </div>
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
    <div id="banner4" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner4.jpg')}}); background-size: cover; background-position: center;">
    </div>
@endsection
