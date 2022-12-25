@extends('layout.main_admin')

@section('listReviewsContent')
<div class="container">
    <h3 style="margin-top: 30px">Customers Reviews</h3>

    {{-- table list reviews --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">RATE</th>
            <th scope="col">REVIEW DESCRIPTION</th>
            <th scope="col">HTRANS DATE</th>
            <th scope="col">PRODUCT NAME</th>
          </tr>
        </thead>
        <tbody>
            @if (isset($reviews))
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{$review->id}}</td>
                        <td>{{$review->rate}}</td>
                        <td>{{$review->deskripsi_review}}</td>
                        @if (isset($htranss))
                            @foreach ($htranss as $htrans)
                                @if ($htrans->id==$review->fk_htrans)
                                    <td>{{$htrans->tanggal_trans}}</td>
                                @endif
                            @endforeach
                        @endif
                        @if (isset($bajus))
                            @foreach ($bajus as $baju)
                                @if ($baju->id==$review->fk_baju)
                                    <td>{{$baju->nama}}</td>
                                @endif
                            @endforeach
                        @endif
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>
      <div class="h-100 d-flex align-items-center justify-content-center" style="margin-bottom:50px">
        {{$reviews->links('pagination::bootstrap-4')}}
      </div>
</div>

@endsection
