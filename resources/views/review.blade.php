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

            @if (Session::has("message"))
                <h3 style="color: red; font-weight: bold">{{Session::get("message.isi")}}</h3>
            @endif

            <div class="headsection">
                <h1>Give A Review</h1>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="d-flex justify-content-center card "
                style="
                width: 400px;
                height:500px;
                background-color:#000000;
                color:#FFFFFF;
                padding: 3%;
                border-radius:20px;">
                    <div class="d-flex justify-content-center">
                        {{-- tolong atur ukuran gambar. gk bisa css -V --}}
                        <img class="card-img-top" src="{{ url('public/image/bajus/'.$baju->nama_file) }}" style="width: 250px; height:300px;border-radius:20px;">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title" name="namaBaju" id="namaBaju">{{$baju->nama}}</h2>
                        <h5 name="hargaBaju" id="hargaBaju" style="font-weight: lighter">{{rupiah($baju->harga)}}</h5>
                    </div>
                </div>
            </div>

            <form action="{{url('/customer/review/doReview')}}" method="POST">
                @csrf
                <input type="hidden" name="id_trans" value="{{$id_trans}}">
                <input type="hidden" name="id_baju" value="{{$baju->id}}">
                <div class="row ml-1">
                    <h4>Rate :</h4>
                </div>
                <div class="row mb-5 ml-1">
                    <select class="form-select" aria-label="Default select example" style="width: 50%;" name="rate">
                        <option value="1">★</option>
                        <option value="2">★★</option>
                        <option value="3">★★★</option>
                        <option value="4">★★★★</option>
                        <option value="5">★★★★★</option>
                      </select>
                </div>
                <div class="row ml-1">
                    <h4>Review :</h4>
                </div>
                <textarea class="form-control" name="deskripsi_review" id="" cols="30" rows="5" style="resize: none;"></textarea>
                @error('deskripsi_review')
                    <div class="error" style="color: red">{{$message}}</div>
                @enderror

                <button type="submit" class="btn mt-3" style="background-color: #000000;color:#FFFFFF;padding-left:60px;padding-right:60px;">Submit</button>
            </form>

        </div>

        <h1 style="margin-top: 50px">List Review</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">RATE</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRODUCT CODE</th>
                <th scope="col">PRODUCT NAME</th>
                <th scope="col">TRANS NUMBER</th>
              </tr>
            </thead>
            <tbody>
                @if (isset($reviews))
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{$review->id}}</td>
                            <td>
                                @if ($review->rate==1)
                                ★
                                @elseif($review->rate==2)
                                ★★
                                @elseif($review->rate==3)
                                ★★★
                                @elseif($review->rate==4)
                                ★★★★
                                @elseif($review->rate==5)
                                ★★★★★
                                @endif
                            </td>
                            <td>{{$review->deskripsi_review}}</td>
                            <td>{{$review->Baju()->first()->kode}}</td>
                            <td>{{$review->Baju()->first()->nama}}</td>
                            <td>{{$review->fk_htrans}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
    </div>
</div>
<script src="https://kit.fontawesome.com/06ab807719.js" crossorigin="anonymous"></script>
@endsection
