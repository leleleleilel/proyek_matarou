@extends('layout.masteradmin')

{{-- partial.footeradmin bermasalah. Posisi belum fix --}}

@section('content')
      <!-- navbar -->
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/images/logo1.png" alt="" id="logomatarou"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <form action="admin.php" method="POST">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                    <button name="btnHome" class="nav-link" style="background-color:transparent;border:none;color:gray;outline: none;border:none;">List User</button>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4">
                    <button name="btnList" class="nav-link" style="background-color:transparent;border:none;color:gray;outline: none;border:none;">List Product</button>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4">
                    <button name="btnAdd" class="nav-link" style="background-color:transparent;border:none;color:gray;outline: none;border:none;">Add Product</button>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4 active">
                    <button name="btnReport" class="nav-link" style="background-color:transparent;border:none;color:black;outline: none;border:none;">Orders Report</button>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4">
                    <button name="btnLogout" class="nav-link" style="background-color:transparent;border:none;color:gray;outline: none;border:none;">Logout</button>
                    </li>
                </ul>
            </form>
            </div>
        </div>
        </nav>

    <div class="contact-page">
      <div class="container">
      <div class="col-md-12">
            <div class="headsection">
              <div class="line-dec" style="background-color: black"></div>
              <br>
              <h1>Orders Detail</h1><br>
            </div>
            <div class="row">
            <div class="col-12 col-lg-6 ">

                <div class="about-page">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <form class="d-flex" action="#" method="POST" style="width:100%;">
                            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword" value="" >
                            <button class="btn btn-outline-secondary"name="btnSearch">Search</button>
                            <button class="btn btn-outline-secondary"name="btnviewall" >All</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                <br>
                  <div class="col-md-12">
                    <div class="card mb-3" style="max-width: 800px;background-color:#f1f3f5;">
                      <div class="row g-0">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                          <div class="card-body">
                            <h5 class="card-title" style="margin-top: 0">Full Name</h5>
                            <p class="card-text" style="font-size: 13px;font-weight:500;color:#000A4E;">Order ID : IDOrder000</p>
                            <p class="card-text" style="font-size: 13px;">Address : Jl Mangga</p>
                            <p class="card-text" style="font-size: 13px;">Subtotal : Rp. 567.890</p>
                            <p class="card-text" style="font-size: 13px;">Qty : 111</p>
                            <p class="card-text" style="font-size: 13px;color:black;">Date : 25-11-2029</p>
                            <form action="" method="post">
                              <button type="submit" value='Button' name="btnhtrans" class="btn btn-dark" style="margin-top: 10px; width: 120px;">Detail Item</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                <div class="col-md-12">

                        </div>
                        <div class="col-md-12">
                        <table class="table" style="max-width: 25rem;margin-top:65px;">
                        <thead>
                          <tr>
                            <th scope="col">Month</th>
                            <th scope="col">Incomes</th>
                            <th scope="col">Items</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">January</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">February</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">Maret</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">April</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">May</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">June</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">July</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">August</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">September</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">October</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">November</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row">December</th>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                          </tr>
                          <tr>
                            <th scope="row" style="font-weight:bold;">Total :</th>
                            <td style="font-weight:bold;color:green;">Rp 0</td>
                            <td style="font-weight:bold;color:green;">Rp 0</td>
                          </tr>
                        </tbody>
                      </table>
                        </div>
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
