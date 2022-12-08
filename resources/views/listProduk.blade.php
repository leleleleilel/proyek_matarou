@extends('layout.masteradmin')

{{-- partial.footeradmin bermasalah. Posisi belum fix --}}

@section('content')
    <div class="about-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-6">
            <form class="d-flex" action="#" method="POST" style="width:70%;">
                <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword" value="">
                <button class="btn btn-outline-secondary" style="margin-left:10px;" name="btnSearch" >Search</button>
            </form>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="about-page">
      <div class="container">
        <div class="row">
          <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Baju Uniqlo</td>
                    <td>Rp 567.890</td>
                    <td>11132</td>
                    <td>Baju</td>
                    <td>Baju Murah</td>
                    <td>
                        <img src="{{asset('asset/images/baju1.jpg')}}" alt="" style="width:100px; height:100px;">
                    </td>
                    <td>
                        <a href="">
                            <button class="btn btn-dark">Edit</button>
                        </a>
                        <form method="POST" action="edit.php">
                            <input type="hidden" name="action" value="hapus">
                            <button name='btnDelete' class="btn btn-danger" value="">Delete</button>
                        </form>
                    </td>
                </tr>
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

                <li>
                    {{-- Ini << --}}
                    <a href=""  style="color:white;background-color:#000000;font-size:28px;font-weight:bold">
                        &laquo
                    </a>
                </li>
                <li>
                    {{-- Ini Halaman Aktif --}}
                    <a href="" style="color:white;background-color:gray;font-size:28px;font-weight:bold">
                        3
                    </a>
                </li>
                <li>
                    {{-- Ini Halaman Lain --}}
                    <a href=""style="color:white;background-color:#000000;font-size:28px;font-weight:bold">
                        4
                    </a>
                </li>
                <li>
                    {{-- Ini >> --}}
                    <a href=""style="color:white;background-color:#000000;font-size:28px;font-weight:bold">
                         &raquo
                     </a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection
