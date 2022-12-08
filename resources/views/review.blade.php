@extends('layout.master')
@section('content')
<div class="contact-page">
    <div class="container">
        <div class="col-md-12">
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
                        <img class="card-img-top" src="{{asset('asset/images/baju1.jpg')}}" style="width: 303px; height:260px;border-radius:20px;">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title" name="namaBaju" id="namaBaju">Baju Bagus</h2>
                        <h5 name="hargaBaju" id="hargaBaju" style="font-weight: lighter">Rp 2.000.000,00</h5>
                        <h5 name="sizeBaju" id="sizeBaju" style="font-weight: lighter">Size : XLSM</h5>
                    </div>
                </div>
            </div>
            <div class="row ml-1">
                <h4>Rate :</h4>
            </div>
            <div class="row mb-5 ml-1">
                <i class="far fa-star fa-2x mr-2"></i>
                <i class="far fa-star fa-2x mr-2"></i>
                <i class="far fa-star fa-2x mr-2"></i>
                <i class="far fa-star fa-2x mr-2"></i>
                <i class="far fa-star fa-2x mr-2"></i>
            </div>
            <div class="row ml-1">
                <h4>Review :</h4>
            </div>
            <textarea class="form-control" name="" id="" cols="30" rows="5" style="resize: none;"></textarea>
            <button type="button" class="btn mt-3" style="background-color: #000000;color:#FFFFFF;padding-left:60px;padding-right:60px;">Submit</button>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/06ab807719.js" crossorigin="anonymous"></script>
@endsection
