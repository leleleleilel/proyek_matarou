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
                <div class="col-12 col-lg-8 "></div>
                <div class="col-12 col-lg-4">
                    <div class="col-md-12">
                        <form id="contact" action="" method="post">
                            <div class="card border mb-3" style="max-width: 25rem;">
                                <div class="card-header bg-transparent border" style="font-weight: bolder;">Shopping Cart Total</div>
                                <div class="row">
                                <div class="card-body text">
                                    <div class="col-md-6">
                                    <p class="card-text" style="font-size:15px">Total Item </p>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                    <p class="card-text" style="font-size:15px">Total
                                    </p>
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
