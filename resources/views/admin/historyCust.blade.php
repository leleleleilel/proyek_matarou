@extends('layout.main_admin')

@section('listhistory')
<div class="container">
    <h3 style="margin-top: 30px">History Customers</h3>

    {{-- table history customers --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">TRANSACTION DATE</th>
            <th scope="col">USER NAME</th>
            <th scope="col">PROMO NAME</th>
            <th scope="col">STATUS</th>
          </tr>
        </thead>
        <tbody>
            @if (isset($history))
                @foreach ($history as $hist)
                    <tr>
                        <td>{{$hist->id}}</td>
                        <td>{{$hist->tanggal_trans}}</td>
                        @if (isset($users))
                            @foreach ($users as $user)
                                @if ($user->id==$hist->id_user)
                                    <td>{{$user->nama}}</td>
                                @endif
                            @endforeach
                        @endif
                        <td>
                        @if (isset($promos))
                            @foreach ($promos as $promo)
                                @if ($promo->id==$hist->fk_kode_promo)
                                    {{$promo->kode}}
                                @endif
                            @endforeach
                        @endif
                    </td>
                        <td>{{$hist->payment_status}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>
</div>

@endsection
