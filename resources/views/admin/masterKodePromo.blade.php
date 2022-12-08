<?php
function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}
?>

@extends('layout.main_admin')

@section('masterPromoCode')

<div class="container">
    <h3 style="margin-top: 30px">Master Promo Code</h3>

     {{-- sesssion error message --}}
     @if (Session::has("message"))
        <h3 style="color: red">
        {{Session::get("message.isi")}}
        </h3>
    @endif

      {{-- forms --}}
      <form action="{{url('/admin/doAddPromoCode')}}" id="formKodePromo" method="POST">
        @csrf

        @if ($mode==2)
        <input type="hidden" name="id_edit" value="{{$promo->id}}">
        @else
            <input type="hidden" name="id_edit" value="-1">
        @endif

        <div class="mb-6">
          <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Promo Code Name</label>

            @if (isset($promo))
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" style="width: 70%;" placeholder="Promo Code Name" value="{{$promo->nama}}">
            @else
             <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" style="width: 70%;" placeholder="Promo Code Name">
            @endif

          @error('name')
          <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
         @enderror
        </div>
        <div class="mb-6">
            <label for="exampleInputEmail1" class="form-label" style="">Discount</label>
                @if (isset($promo))
                    <input type="text" class="form-control" id="discount" name="discount" aria-describedby="emailHelp" style="width: 70%;" placeholder="Discount" value="{{$promo->besar_potongan}}">
                @else
                    <input type="text" class="form-control" id="discount" name="discount" aria-describedby="emailHelp" style="width: 70%;" placeholder="Discount" >
                @endif
            @error('discount')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputAlamat" class="form-label">Discount Type</label> <br>

            @if (isset($promo))
                @if ($promo->jenis_potongan=="Diskon")
                    <select class="form-select" aria-label="Default select example" name="discount_type" style="width: 70%;" >
                        <option value="Potongan">Subtotal Cut</option>
                        <option value="Diskon" selected>Discount</option>
                    </select>
                @else
                    <select class="form-select" aria-label="Default select example" name="discount_type" style="width: 70%;" >
                        <option value="Potongan" selected>Subtotal Cut</option>
                        <option value="Diskon">Discount</option>
                    </select>
                @endif
            @else
                <select class="form-select" aria-label="Default select example" name="discount_type" style="width: 70%;" >
                    <option value="Potongan">Subtotal Cut</option>
                    <option value="Diskon">Discount</option>
                </select>
            @endif
            @error('discount_type')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputEmail1" class="form-label" style="">Valid From</label>
                @if (isset($promo))
                    <input type="date" class="form-control" id="validfrom" name="validfrom" aria-describedby="emailHelp" style="width: 70%;" placeholder="Valid From" value="{{$promo->valid_from}}">
                @else
                    <input type="date" class="form-control" id="validfrom" name="validfrom" aria-describedby="emailHelp" style="width: 70%;" placeholder="Valid From">
                @endif
            @error('validfrom')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputEmail1" class="form-label" style="">Valid Until</label>
                @if (isset($promo))
                    <input type="date" class="form-control" id="validuntil" name="validuntil" aria-describedby="emailHelp" style="width: 70%;" placeholder="Valid Until" value="{{$promo->valid_until}}">
                @else
                    <input type="date" class="form-control" id="validuntil" name="validuntil" aria-describedby="emailHelp" style="width: 70%;" placeholder="Valid Until" >
                @endif
            @error('validuntil')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
          <div class="mb-6">
            <label for="exampleInputEmail1" class="form-label" style="">Minimum Spent</label>
                @if (isset($promo))
                    <input type="text" class="form-control" id="minimum" name="minimum" aria-describedby="emailHelp" style="width: 70%;" placeholder="Minimum Spent" value="{{$promo->minimum_total}}">
                @else
                    <input type="text" class="form-control" id="minimum" name="minimum" aria-describedby="emailHelp" style="width: 70%;" placeholder="Minimum Spent" >
                @endif
            @error('minimum')
            <div class="error" style="color: red;font-weight: bold"> {{$message}} </div>
           @enderror
          </div>
        <br>
        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 30%;" value="" >
        @if ($mode==1)
            Insert
        @else
            Edit
        @endif
        </button>
      </form>

      {{-- table list promo code --}}
      <h3 style="margin-top: 30px">Promo Codes List</h3>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Discount</th>
            <th scope="col">Discount Type</th>
            <th scope="col">Valid From</th>
            <th scope="col">Valid Until</th>
            <th scope="col">Minimum Spent</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (
               isset($promos)
            )
            @foreach ($promos as $promo)
            <tr>
                <td>{{$promo->id}}</td>
                <td>{{$promo->nama}}</td>
                @if ($promo->jenis_potongan=="Potongan")
                    <td>{{rupiah($promo->besar_potongan)}}</td>
                @else
                    <td>{{$promo->besar_potongan}}% </td>
                @endif
                <td>{{$promo->jenis_potongan}}</td>
                <td>{{$promo->valid_from}}</td>
                <td>{{$promo->valid_until}}</td>
                <td>{{rupiah($promo->minimum_total)}}</td>
                <td>

                    @if ($promo->deleted_at==null)
                         <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 35%;" value="">
                            <a href="{{url('/admin/edit/promo/'.$promo->id)}}" style="text-decoration: none; color: white">Edit</a>
                        </button>
                    @else
                        <button type="submit" name="btnsubmit" class="btn btn-dark" id="btnsubmit" style="width: 35%;" value="" disabled>
                             <a href="{{url('/admin/edit/promo/'.$promo->id)}}" style="text-decoration: none; color: white">Edit</a>
                         </button>
                    @endif



                    @if ($promo->deleted_at==null)
                        <button type="submit" name="btnsubmit" class="btn btn-danger" id="btnsubmit" style="width: 40%;" value="" >
                             <a href="{{url('/admin/doDeletePromo/'.$promo->id)}}" style="text-decoration: none; color: white">Delete</a>
                        </button>
                    @else
                        <button type="submit" name="btnsubmit" class="btn btn-info" id="btnsubmit" style="width: 40%;" value="" >
                            <a href="{{url('/admin/doDeletePromo/'.$promo->id)}}" style="text-decoration: none; color: white">Restore</a>
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
      </table>

</div>
@endsection
