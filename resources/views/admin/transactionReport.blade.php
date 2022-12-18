@extends('layout.main_admin')

@section('listtransactionreport')
<div class="container">
    <h3 style="margin-top: 30px">Transaction Report</h3>
    <form action="" method="get">
        <table>
            <tr>
                <td style="width: 350px"><h4>Start Date</h4></td>
                <td></td>
                <td style="width: 350px"><h4>End Date</h4></td>
            </tr>
            <tr>
                <td><input type="date" name="keydatestart" id="" class="form-control"></td>
                <td><h4 style="margin-left: 30px;margin-right:30px">To</h4></td>
                <td><input type="date" class="form-control" name="keydateend" id=""></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="btnfilt" class="btn btn-dark" id="btnfilt" value="" style="padding-left:100px;padding-right:100px">
           Filter
       </button>
    </form>
   <br>
   <br>
    {{-- table list transaction report --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">TRANS NUM</th>
            <th scope="col">DATE</th>
            <th scope="col">PROMO CODE</th>
            <th scope="col">CUSTOMER</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
            @if (isset($htranss))
                @foreach ($htranss as $htrans)
                    <tr>
                        <td>{{$htrans->id}}</td>
                        <td>{{$htrans->tanggal_trans}}</td>
                        @if (isset($promo))
                            @foreach ($promo as $promoo)
                                @if ($htrans->fk_kode_promo==$promoo->id)
                                    <td>{{$promoo->nama}}</td>
                                @endif
                            @endforeach
                        @endif
                        @if (isset($users))
                            @foreach ($users as $user)
                                @if ($htrans->id_user==$user->id)
                                    <td>{{$user->nama}}</td>
                                @endif
                            @endforeach
                        @endif
                        <td><button type="submit" name="btnsubmit" class="btn btn-danger" id="btnsubmit" value="" >
                            <a href="{{url('/admin/transactiondetail/'.$htrans->id)}}" style="text-decoration: none; color: white">Detail</a>
                       </button></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>

</div>

@endsection
