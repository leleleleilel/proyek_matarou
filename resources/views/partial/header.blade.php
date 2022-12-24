<div id="header" style="background-color:black">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <span>Fashion</span>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
    <a class="navbar-brand" href="#"><img src="{{asset('asset/images/banner/logo1.png')}}" alt="" id="logomatarou"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarresponsive" aria-controls="navbarresponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarresponsive">
        <ul class="navbar-nav ml-auto" style="margin-top: 45px;">
        <li class="nav-item {{$navAccount}}"  style="outline: none;border:none">
            @if ($navAccount=="active")
                <a href="{!!url('/customer/myAccount')!!}"><button name="btnMyAccount" class="nav-link" style="outline: none;border:none; color: grey">My Account</button></a>
            @else
                <a href="{!!url('/customer/myAccount')!!}"><button name="btnMyAccount" class="nav-link" style="outline: none;border:none">My Account</button></a>
            @endif

            </li>
        <li class="nav-item {{$navHistory}}">
            @if ($navHistory=="active")
            <a href="{!!url('/customer/history')!!}"><button name="btnHistory" class="nav-link" style="outline: none;border:none; color: grey">History</button></a>
            @else
            <a href="{!!url('/customer/history')!!}"><button name="btnHistory" class="nav-link" style="outline: none;border:none;">History</button></a>
            @endif

        </li>
            <li class="nav-item {{$navHome}}">
                @if ($navHome=="active")
                <a href="{!!url('/customer/home')!!}"><button name="btnHome" class="nav-link "style="outline: none;border:none; color:grey">HOME</button></a>
                @else
                <a href="{!!url('/customer/home')!!}"><button name="btnHome" class="nav-link "style="outline: none;border:none;">HOME</button></a>
                @endif
            </li>
            <li class="nav-item {{$navProduct}}">
                @if ($navProduct=="active")
                <a href="{!!url('/customer/catalogue')!!}"><button name="btnProduct" class="nav-link" style="outline: none;border:none; color: grey">PRODUCTS</button></a>
                @else
                <a href="{!!url('/customer/catalogue')!!}"><button name="btnProduct" class="nav-link" style="outline: none;border:none;">PRODUCTS</button></a>
                @endif
            </li>
            <li class="nav-item {{$navAbout}}">
                @if ($navAbout=="active")
                <a href="{!!url('/customer/aboutus')!!}"><button name="btnAbout" class="nav-link" style="outline: none;border:none; color: grey">ABOUT US</button></a>
                @else
                <a href="{!!url('/customer/aboutus')!!}"><button name="btnAbout" class="nav-link" style="outline: none;border:none;">ABOUT US</button></a>
                @endif

            </li>
            <li class="nav-item {{$navCart}}">

                @if ($navCart=="active")
                <a href="{!!url('/customer/cart')!!}"><button name="btnCart" class="nav-link" style="outline: none;border:none; color: grey">CART</button></a>
                @else
                <a href="{!!url('/customer/cart')!!}"><button name="btnCart" class="nav-link" style="outline: none;border:none;">CART</button></a>
                @endif

            </li>
            <li class="nav-item">
                <a href="{!!url('/logout')!!}"><button name="btnLogin" class="nav-link" style="outline: none;border:none;">LOGOUT</button></a>
            </li>
            </ul>
    </div>
    </div>
</nav>
