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
            <th scope="col">DESCRIPTION</th>
            <th scope="col">PRODUCT CODE</th>
            <th scope="col">PRODUCT NAME</th>
            <th scope="col">TRANS NUM</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>

</div>

@endsection
