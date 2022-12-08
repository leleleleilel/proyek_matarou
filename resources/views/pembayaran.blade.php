@extends('layout.master')

@section('content')
        <div class="about-page" style="margin-top: 80px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                                  <h5 class="card-header">Your Orders</h5>
                                  <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <p class="card-text" style="font-size: 20px">
                                        Total Cart:
                                        <br><br>
                                        Delivery:
                                        </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text" style="font-size: 20px">
                                            Rp 5.000.000
                                            <br><br>
                                            Free
                                            </p>
                                            </div>
                                    </div>
                                    <div class="main-button" style="margin-top: 30px">
                                    <button id="pay-button" class="btn btn-dark">Pay</button>
                              </div>
                                  </div>
                            </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                <div class="about-page">
                <div class="container">
                    <div class="row">
                        {{-- For disini (?) --}}
                        <div class="col-md-2"></div>
                        <div class="col-md-12 col-lg-8">
                        <div class="card mb-3" style="max-width: 800px;">
                        <div class="row g-0">
                            <div class="col-md-3">
                            <img src="{{asset('asset/images/baju1.jpg')}}" class="img-fluid rounded-start" style="height:100%;width:110%">
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                            <div class="card-body">
                                <h5 class="card-title" style="margin-top: 8%">Baju Baru</h5>
                                <p class="card-text" style="font-size: 15px;">Ini baru baju</p>
                                <p class="card-text" style="font-size: 15px;">Qty   : 11</p>
                                <p class="card-text" style="font-size: 15px;">Price : Rp 567.431</p>
                            </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        </div>
                            </div>
                            <div class="col-md-2"></div>

                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection

@section('banner')
<div id="banner3" style="height: 500px; width: 100%; background-image: url({{asset('asset/images//banner/banner3.jpg')}}); background-size: cover; background-position: center;">
</div>
@endsection
