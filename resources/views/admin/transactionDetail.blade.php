@extends('layout.main_admin')

@section('transactiondetail')
<div class="container">
    <h3 style="margin-top: 30px">Customers Reviews</h3>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">
            <table>
                <tr>
                    <td>Invoice ID</td>
                    <td>:</td>
                    <td>
                        @if(isset($htranss))
                            @foreach ($htranss as $htrans)
                                <td>{{$htrans->id}}</td>
                            @endforeach
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Transaction Date</td>
                    <td>:</td>
                    <td>
                        @if(isset($htranss))
                            @foreach ($htranss as $htrans)
                                <td>{{$htrans->tanggal_trans}}</td>
                            @endforeach
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Promo Code</td>
                    <td>:</td>
                    <td>
                        @if(isset($htranss))
                            @foreach ($htranss as $htrans)
                                @if (isset($promo))
                                    @foreach ($promo as $promoo)
                                        @if ($promoo->id==$htrans->fk_kode_promo)
                                            <td>{{$promoo->nama}}</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
          </p>
        </div>
    </div>

    {{-- table list reviews --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ITEM ID</th>
            <th scope="col">ITEM NAME</th>
            <th scope="col">ITEM PRICE</th>
            <th scope="col">SIZE</th>
            <th scope="col">QTY</th>
            <th scope="col">SUBTOTAL</th>
          </tr>
        </thead>
        <tbody>
            @if (isset($dtranss))
                @foreach ($dtranss as $dtrans)
                    <tr>
                        @if (isset($dbajuu))
                            @foreach ($dbajuu as $dbaju)
                                @if ($dbaju->id==$dtrans->fk_dbaju)
                                    @if (isset($bajuu))
                                        @foreach ($bajuu as $baju)
                                            @if ($baju->id==$dbaju->fk_baju)
                                                <td>    {{$baju->id}}</td>
                                                <td>
                                                    {{$baju->nama}}
                                                </td>
                                                <td>
                                                    {{$baju->harga}}
                                                </td>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if (isset($sizee))
                                        @foreach ($sizee as $size)
                                            @if ($size->id==$dbaju->fk_size)
                                                <td>{{$size->nama}}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        @endif
                        <td>{{$dtrans->qty}}</td>
                        <td>{{$dtrans->subtotal}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>

</div>

@endsection
