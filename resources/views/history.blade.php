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
            <h1>Shopping History</h1>
            <div class="line-dec" style="background-color: black"></div>
            <br>
            </div>
        </div>
    </div>
</div>
<!-- List History -->
<div class="contact-page">
    <div class="" style="padding-left:10%;padding-right:10%;">
        <div class="col-md-12 ">
            <div class="row">
                <table class="table table-dark" style="background-color: #252525">
                    <thead>
                      <tr>
                        <th scope="col">INVOICE ID</th>
                        <th scope="col">SUBTOTAL</th>
                        <th scope="col">DATE</th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($h_trans as $h)
                            <tr>
                                <th scope="row">#{{$h->id}}</th>
                                <td>{{rupiah($h->dSub)}}</td>
                                <td>{{$h->tanggal_trans}}</td>
                                <td>
                                    <a href="/customer/history/detail/{{$h->id}}">
                                        <input type="submit" class="btn btn-light" value="Detail">
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
<div class="page-navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('banner')
<div id="banner2" style="height: 500px; width: 100%; background-image: url('assets/images/Collection.gif'); background-size: cover; background-position: center;">
</div>
@endsection
