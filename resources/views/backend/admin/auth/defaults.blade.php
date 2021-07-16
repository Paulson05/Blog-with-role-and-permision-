
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/now-ui-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 17:59:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    @include('backend.admin.auth.partials.head')
</head>

<body class="login-page sidebar-mini ">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




<!-- Navbar -->
@include('backend.admin.auth.partials.navbar')

<!-- End Navbar -->



@yield('content')

@include('backend.admin.auth.partials.sidenavbar')

@include('backend.admin.auth.partials.script')

</body>


<!-- Mirrored from demos.creative-tim.com/now-ui-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 17:59:47 GMT -->
</html>
