<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
      <a class="navbar-brand" href="#"><img src="{{asset('asset/images/banner/logo1.png')}}" alt="" id="logomatarou"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <form action="admin.php" method="POST">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <button name="btnHome" class="nav-link" style="background-color:transparent;border:none;black:white;outline: none;border:none;">List User</button>
            </li>
            <li class="nav-item ml-0 ml-lg-4">
            <button name="btnList" class="nav-link" style="background-color:transparent;border:none;color:gray;outline: none;border:none;">List Product</button>
            </li>
            <li class="nav-item ml-0 ml-lg-4">
            <button name="btnAdd" class="nav-link" style="background-color:transparent;border:none;color:gray;outline: none;border:none;">Add Product</button>
            </li>
            <li class="nav-item ml-0 ml-lg-4">
            <button name="btnReport" class="nav-link" style="background-color:transparent;border:none;color:gray;outline: none;border:none;">Orders Report</button>
             </li>
            <li class="nav-item ml-0 ml-lg-4">
            <button name="btnLogout" class="nav-link" style="background-color:transparent;border:none;color:gray;outline: none;border:none;">Logout</button>
            </li>
          </ul>
      </form>
      </div>
  </div>
</nav>
