@extends('layout.masteradmin')
@section('content')
    <div class="about-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-6">
            <form action="" method="POST" enctype="multipart/form-data">
             <h1>Tambah Barang</h1>
              <div class="mb-6">
                <label for="exampleInputEmail1" class="form-label" style="margin-top:50px">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" style="width: 70%;" placeholder="Nama Barang">
              </div>
              <div class="mb-6">
                <label for="exampleInputPassword1" class="form-label">Harga</label>
                <input type="text" class="form-control" id="rupiah" name="harga" style="width: 70%;" placeholder="Harga Barang">
              </div>
              <div class="mb-6">
                <label for="exampleInputAlamat" class="form-label">Foto</label> <br>
                <input type="file" name="my_image" id="" placeholder="Upload Foto">
              </div>
              <div class="mb-6">
                <label for="exampleInputAlamat" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" style="width: 70%;">
              </div>
              <div class="mb-6">
                <label for="exampleInputAlamat" class="form-label">Deskripsi</label> <br>
                <textarea id="" cols="30" rows="10" name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
              </div>
              <div class="mb-6">
                <label for="exampleInputAlamat" class="form-label">Kategori</label>
                <select name="kategori" id="" class="form-control">
                    <option value="shirt">Shirt</option>
                    <option value="t-shirt">T-Shirt</option>
                    <option value="jacket">Jacket</option>
                    <option value="trousers">Trousers</option>
                    <option value="short">Short</option>
                </select>
              </div>
              <br>
              <button name="btnSubmit" class="btn btn-dark">Tambah Barang</button>
              <br>
              <br>
            </form>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
@endsection
