@extends('layout.master')
@section('content')
    <div class="batas" style="height:100px"></div>
    <div class="single-product">
      <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
              <div class="mb-6">
                <div class="card" style="width: 18rem;">
                  <img src="" class="card-img-top" alt="" >
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="right-content">
                  <h4></h4>
                  <h6 style="color: black"></h6>
                  <p></p>
                  <span>left on stock</span>
                  <form action="#" method="POST">
                    <label for="quantity">Quantity:</label>
                    <input name="quantity" type="quantity" class="quantity-text" id="quantity" value=1>
                    <button class="btn btn-dark" style="width: 120px;" name="btnAdd">Add To Cart</button>
                  </form>
                  <div class="down-content">
                    <div class="categories">
                      <h6>Category: <span></span></h6>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>

    <div class="featured-items" style="margin-bottom:100px">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="headsection">
              <div class="line-dec"></div>
              <h1>You May Also Like</h1>
            </div>
            <div class="carousel slide" data-ride="carousel" id="mycarousel">
              <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target = "#mycarousel"></li>
                <li data-slide-to ="1" data-target = "#mycarousel"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">

                    <div id="1" class="item new col-md-4">
                      <a href="">
                        <div class="featured-item">
                          <img style="width:300px; height:350px; background-size: cover;" src="" alt="">
                          <h4></h4>
                          <h6 style="color: black;"></h6>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">

                    <div id="1" class="item new col-md-4">
                      <a href="">
                        <div class="featured-item">
                          <img style="width:300px; height:350px; background-size: cover;" src="" alt="">
                          <h4></h4>
                          <h6 style="color: black;"></h6>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
