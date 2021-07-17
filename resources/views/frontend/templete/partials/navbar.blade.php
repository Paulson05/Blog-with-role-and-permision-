<nav class="classy-navbar" id="bigshopNav">

    <!-- Nav Brand -->
    <a href="index.html" class="nav-brand"><img src="frontend/img/core-img/logo.png" alt="logo"></a>

    <!-- Toggler -->
    <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
    </div>

    <!-- Menu -->
    <div class="classy-menu">
        <!-- Close -->
        <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>

        <!-- Nav -->
        <div class="classynav">
            <ul>
                <li><a href="#"><i class="fa fa-home">Home</i></a></li>
                <li><a href="#"><i class="fa fa-book">Blog</i></a></li>
                <li><a href="#"><i class="fa fa-envelope">About</i></a></li>
                <li><a href="#"><i class="fa fa-phone-square">Contact</i></a></li>
            </ul>
        </div>
    </div>

    <!-- Hero Meta -->
    <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
        <!-- Search -->
        <div class="m-1">
            <a class="btn btn-sm btn-outline-primary" href="{{route('user.getregister')}}">Register</a></a>

        </div>



        <!-- Account -->
        <div class="m-1">
            <div class="">
                <a class="btn btn-sm btn-outline-primary" href="{{route('user.getlogin')}}">login</a>
            </div>

        </div>
    </div>
</nav>
