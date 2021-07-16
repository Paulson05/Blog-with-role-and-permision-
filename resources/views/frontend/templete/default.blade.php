<!doctype html>
<html lang="en">


<!-- Mirrored from demo.designing-world.com/bigshop-2.3.0/blog-with-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Jun 2021 11:40:39 GMT -->
<head>
@include('frontend.templete.partials.head')
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="spinner-grow" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<!-- Header Area -->
<header class="header_area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-6">
                    <div class="welcome-note">
                        <span class="popover--text" data-toggle="popover" data-content="Welcome to Bigshop ecommerce template."><i class="icofont-info-square"></i></span>
                        <span class="text">Welcome to Bigshop ecommerce template.</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                        <!-- Language Dropdown -->
                        <div class="language-dropdown">
                            <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    English
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Bangla</a>
                                    <a class="dropdown-item" href="#">Arabic</a>
                                </div>
                            </div>
                        </div>

                        <!-- Currency Dropdown -->
                        <div class="currency-dropdown">
                            <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    $ USD
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="#">৳ BDT</a>
                                    <a class="dropdown-item" href="#">€ Euro</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="bigshop-main-menu">
        <div class="container">
            <div class="classy-nav-container breakpoint-off">
               @include('frontend.templete.partials.navbar')
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->

<!-- Breadcumb Area -->

<!-- Blog Area -->
@yield('content')
<!-- Blog Area End -->

<!-- Footer Area -->
@include('frontend.templete.partials.footer')
<!-- Footer Area -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
@include('frontend.templete.partials.script')
</body>


<!-- Mirrored from demo.designing-world.com/bigshop-2.3.0/blog-with-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Jun 2021 11:40:39 GMT -->
</html>
