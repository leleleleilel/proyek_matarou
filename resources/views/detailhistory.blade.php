<?php
function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}
?>@extends('layout.master')
@section('content')
<div class="contact-page">
    <div class="container">
        <div class="col-md-12">
            <div class="headsection">
                <div class="line-dec" style="background-color: black"></div>
                <br>
                <h1>Transaction Detail</h1><br>

                  {{-- sesssion error message --}}
                    @if (Session::has("message"))
                        <h3 style="color: red">
                        {{Session::get("message.isi")}}
                        </h3>
                     @endif

                    <div class="jumbotron" style="background-color: #252525;color:white;padding:35px;font-weight:lighter;font-size:25px;">
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Invoice ID :</div>
                            <div class="col-md-8">#{{$h_trans->id}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Transaction Date :</div>
                            <div class="col-md-8">{{$h_trans->tanggal_trans}}</div>
                        </div> <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Transaction Date :</div>
                            <div class="col-md-8">{{$h_trans->tanggal_trans}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Promo Code :</div>
                            <div class="col-md-8">{{$h_trans->kode}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Subtotal :</div>
                            <div class="col-md-8">{{rupiah($allSubTotal)}}</div>
                        </div>
                    </div>
                    <h1>Items</h1><br>
                    <table class="table table-dark" style="background-color: #252525">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ITEM NAME</th>
                            <th scope="col">ITEM PRICE</th>
                            <th scope="col">QTY</th>
                            <th scope="col">SUBTOTAL</th>
                            <th scope="col">ITEM PHOTO</th>
                            <th scope="col">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($d_trans as $d)
                                <tr>
                                    <th scope="row">#{{$d->id}}</th>
                                    <td>{{$d->nama}}</td>
                                    <td>{{rupiah($d->harga)}}</td>
                                    <td>{{$d->qty}}</td>
                                    <td>{{rupiah($d->subtotal)}}</td>
                                    <td>
                                        <img src="{{ url('public/image/bajus/'.$d->nama_file) }}" style="height: 100px; width: 70px">
                                    </td>
                                    <td>
                                        {{-- Ini nyambung ke mana --}}
                                        {{-- /customer/review/{{$d->id}}/{{$h_trans->id}} --}}

                                        @foreach ($reviews as $r)
                                            @if ($r->fk_baju==$d->id)
                                                @php
                                                    $ada = true;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if ($ada==true)
                                            <a href="{{url('/customer/review/'.$d->id."/".$h_trans->id)}}">
                                                <input type="submit" class="btn btn-light" value="Review" disabled>
                                            </a>
                                        @else
                                            <a href="{{url('/customer/review/'.$d->id."/".$h_trans->id)}}">
                                                <input type="submit" class="btn btn-light" value="Review">
                                            </a>
                                        @endif

                                        @php
                                            $ada = false
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
            </div>
        </div>
    </div>
</div>
<div class="contact-page">
    <div class="container" style="padding-left:10%;">
        <div class="col-md-12">
            <div class="row">

            </div>
        </div>
    </div>
</div>
@endsection
@section('banner')
<div id="banner2" style="height: 500px; width: 100%; background-image: url('assets/images/Collection.gif'); background-size: cover; background-position: center;">
</div>
@endsection
