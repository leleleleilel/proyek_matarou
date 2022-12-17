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
            <th scope="col">HTRANS ID</th>
            <th scope="col">PRODUCT ID</th>
            <th scope="col">STATUS</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>

</div>

@endsection
