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
                <h1>Shopping Cart</h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 ">

                    @if (Session::has("message"))
                        <h3 style="color: red; font-weight: bold">{{Session::get("message.isi")}}</h3>
                    @endif

                    @foreach ($cart as $c)
                    <div class="jumbotron" style="background-color: #252525;color:white;">
                        <div class="row">
                            <div class="col-4">
                                <img class="d-block w-100" style="border-radius: 10px;" src="{{ url('public/image/bajus/'.$c->nama_file) }}">
                            </div>
                            <div class="col-8 d-flex align-items-center flex-column pt-4 mt-4">
                                <h1 class="display-4">{{$c->nama}}</h1>
                                <h3 style="font-weight: lighter">{{rupiah($c->harga * $c->quantity)}}</h3>
                                <div class="row" >
                                    <div class="col-3" style="padding: 0px;margin:0px;"><input type="button" class="btn" style="text-align: center;width:35px:margin-right:6px;" value="-"></div>
                                    <div class="col-6 d-flex align-items-center flex-column" style="text-align: center;font-size:25px;">{{$c->quantity}}</div>
                                    <div class="col-3" style="padding: 0px;margin:0px;"><input type="button" class="btn" style="text-align: center;width:35px;"value="+"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 col-lg-4">
                    <div class="col-md-12">
                        <form id="contact" action="{{url('customer/payment')}}" method="GET">
                            <input type="hidden" name="idUser" value="{{auth()->user()->id}}">
                            <div class="card border mb-3" style="max-width: 25rem;">
                                <div class="card-header bg-transparent border" style="font-weight: bolder;">Shopping Cart Total</div>
                                <div class="row">
                                <div class="card-body text">
                                    <div class="row" style="padding: .75rem 1.25rem">
                                        <div class="col-md-5">
                                            <p class="card-text" style="font-size:15px">Total Item</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="card-text" style="font-size:15px">{{$totalItem}}</p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row"  style="padding: .75rem 1.25rem">
                                        <div class="col-md-5">
                                            <p class="card-text" style="font-size:15px">Total</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="card-text" style="font-size:15px">{{rupiah($totalHarga)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <button type="submit" name="btnbayar" class="btn btn-dark" style="margin-top: 10px; width: 290px; margin-bottom: 10px;">Continue To Payment</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card bg-light mb-3" style="max-width: 25rem;">
                        <div class="card-header">Information</div>
                        <div class="card-body">
                            <h5 class="card-title">Delivery</h5>
                            <p class="card-text">
                            standard shipping is free shipping, it will take 2-3 if the customer's location is on the island of Java. While outside Java the shipping process will take 8-10 days. Delivery is made every Monday to Saturday, and not on national holidays.
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
