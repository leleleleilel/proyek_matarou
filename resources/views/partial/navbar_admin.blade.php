<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">M A T A R O U</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px; float: right;">
          <li class="nav-item dropdown">
            <a class="nav-link {{$activeMaster}} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Masters
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{url('/admin/masters/users')}}">Users</a></li>
              <li><a class="dropdown-item" href="{{url('/admin/masters/categories')}}">Categories</a></li>
              <li><a class="dropdown-item" href="{{url('/admin/masters/products')}}">Products</a></li>
              <li><a class="dropdown-item" href="{{url('/admin/masters/promos')}}">Promo Codes</a></li>
              <li><a class="dropdown-item" href=""></a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link {{$activeReports}} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Transactions
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="">Transactions</a></li>
              <li><a class="dropdown-item" href="">Reports</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link {{$activeReviews}}" aria-current="page" href="{{url('/admin/reviews')}}">Reviews</a>
          </li>

          <li class="nav-item dropdown" style="margin-left: 2px">
            @if (Session::has("current_user"))
                @php
                    $nama = Session::get("current_user")->nama;
                @endphp
                @endif
            <a class="nav-link {{$activeProfile}} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              @if ($activeProfile=="")
                <img src="{{asset('profile_notactive.png')}}" alt="" style="width:25px;height: 25px; margin-top: -6px">
              @else
              <img src="{{asset('profile.png')}}" alt="" style="width:25px;height: 25px; margin-top: -6px">
              @endif
              {{$nama}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{url('/admin/profile')}}">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{url('admin/doLogout')}}">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="garis"></div>
