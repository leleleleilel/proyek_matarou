<?php
function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}
?>
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
                                        <br> <br>
                                        Promo Code:
                                        <br><br>
                                        Discount :
                                        <br><br>
                                        Subtotal :
                                        </p>
                                        <br>
                                        <br>
                                        <p></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text" style="font-size: 20px">
                                            {{rupiah($harga_asli)}}
                                            <br><br>
                                            Free
                                            <br> <br>
                                            @if ($kode_promo!="")
                                            {{$kode_promo}}
                                            @else
                                            -
                                            @endif
                                            <br><br>
                                            {{$potongan}}
                                            <br><br>
                                            {{rupiah($subtotal)}}
                                            </p>
                                            </div>
                                    </div>
                                    <div class="main-button" style="margin-top: 30px">
                                        {{-- <form action="{{url('customer/doPay')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
                                            <button id="pay-button" class="btn btn-dark">Pay</button>
                                        </form> --}}

                                        <button id="pay-button" class="btn btn-dark">Pay</button>

                                        <form action="{{url('customer/payment')}}" id="submit_form" method="POST">
                                            @csrf
                                            <input type="hidden" name="fk_promo" value="{{$fk_promo}}">
                                            <input type="hidden" name="json" id="json_callback">
                                        </form>

                                        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ruBcktegSYjKWFQv"></script>
                                        <script type="text/javascript">
                                            document.getElementById('pay-button').onclick = function(){
                                              // SnapToken acquired from previous step
                                              window.snap.pay('<?=$snapToken?>', {
                                                // Optional
                                                onSuccess: function(result){
                                                    console.log(result);
                                                    send_response_to_form(result);
                                                },
                                                // Optional
                                                onPending: function(result){
                                                    console.log(result);
                                                    send_response_to_form(result);
                                                },
                                                // Optional
                                                onError: function(result){
                                                    console.log(result);
                                                    send_response_to_form(result);
                                                }
                                              });
                                            };

                                            function send_response_to_form(result){
                                                document.getElementById('json_callback').value = JSON.stringify(result);
                                                $('#submit_form').submit();
                                            }

                                          </script>
                              </div>
                                  </div>
                            </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                <div class="about-page" style="margin-bottom: 50px">
                <div class="container">
                    <div class="row">
                        {{-- For disini (?) --}}

                        <div class="col-md-2"></div>
                        <div class="col-md-12 col-lg-8">
                            @foreach ($carts as $cart)
                            @foreach ($dbajus as $dbaju)
                                @if ($dbaju->id==$cart->id_dbaju && $dbaju->stok-$cart->quantity>=0)
                                    @foreach ($bajus as $baju )
                                        @if ($baju->id==$dbaju->fk_baju)
                                        <div class="card mb-3" style="max-width: 800px;">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                <img src="{{asset('public/image/bajus/'.$baju->nama_file)}}" class="img-fluid rounded-start" style="height:100%;width:110%">
                                                </div>
                                                <div class="col-md-6 d-flex justify-content-center">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="margin-top: 8%">{{$baju->nama}}</h5>
                                                    <p class="card-text" style="font-size: 15px;">{{$baju->deskripsi}}</p>
                                                    <p class="card-text" style="font-size: 15px;">Quantity : {{$cart->quantity}}</p>
                                                    <p class="card-text" style="font-size: 15px;">{{rupiah($baju->harga)}}</p>
                                                </div>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
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
