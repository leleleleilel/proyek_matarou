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
            <li class="nav-item {{$navHome}}">
                <a href="{!!url('/home')!!}"><button name="btnHome" class="nav-link "style="outline: none;border:none;">HOME</button></a>
            </li>
            <li class="nav-item {{$navProduct}}">
                <a href="{!!url('/catalogue')!!}"><button name="btnProduct" class="nav-link" style="outline: none;border:none;">PRODUCTS</button></a>
            </li>
            <li class="nav-item {{$navAbout}}">
                <a href="{!!url('/aboutus')!!}"><button name="btnAbout" class="nav-link" style="outline: none;border:none;">ABOUT US</button></a>
            </li>
            <li class="nav-item {{$navCart}}">
                <button name="btnCart" class="nav-link" style="outline: none;border:none;">CART</button>
            </li>
            <li class="nav-item">
                <a href="{!!url('/login')!!}"><button name="btnLogin" class="nav-link" style="outline: none;border:none;">LOGIN</button></a>
            </li>
            </ul>
    </div>
    </div>
</nav>
