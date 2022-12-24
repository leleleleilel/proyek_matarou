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

                    <div class="jumbotron" style="background-color: #252525;color:white;padding:35px;font-weight:lighter;font-size:25px;">
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Invoice ID :</div>
                            <div class="col-md-8">#{{$h_trans->id}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Transaction Date :</div>
                            <div class="col-md-8">{{$h_trans->tanggal_trans}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Promo Code :</div>
                            <div class="col-md-8">{{$h_trans->nama}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex justify-content-end">Subtotal :</div>
                            <div class="col-md-8">Rp {{$allSubTotal}}</div>
                        </div>
                    </div>
                    <h1>Items</h1><br>
                    <table class="table table-dark" style="background-color: #252525">
                        <thead>
                          <tr>
                            <th scope="col">ITEM ID</th>
                            <th scope="col">ITEM NAME</th>
                            <th scope="col">ITEM PRICE</th>
                            <th scope="col">QTY</th>
                            <th scope="col">SUBTOTAL</th>
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
                                        {{-- Ini nyambung ke mana --}}
                                        {{-- /customer/review/{{$d->id}}/{{$h_trans->id}} --}}
                                        <a href="{{url('/customer/review/'.$d->id."/".$h_trans->id)}}">

                                            @foreach ($dbajus as $db)
                                                    @if ($db->id==$d->fk_dbaju)
                                                        @foreach ($bajus as $b)
                                                            @if ($b->id==$db->fk_baju)
                                                            @foreach ($reviews as $r)
                                                            @if ($b->id==$r->fk_baju)
                                                                @php
                                                                    $ada = true
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                            @endforeach
                                            @if ($ada==true)
                                                <input type="submit" class="btn btn-light" value="Review" disabled>

                                            @else
                                            <input type="submit" class="btn btn-light" value="Review">
                                            @endif
                                            @php
                                                $ada = false
                                            @endphp
                                        </a>
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
