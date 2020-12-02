<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }} | @yield('section')</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>
@yield('css_before')
<!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('css_after')

</head>

<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Datta Able</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                    <a href="index.html" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <!--
                <li class="nav-item pcoded-menu-caption">
                    <label>super Administrador</label>
                </li>
                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers
                 Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                    class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i>
                        </span><span class="pcoded-mtext">Gestión de Usuarios</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="" class="">Usuarios</a></li>
                        <li class=""><a href="{{route('roles.index')}}" class="">Roles & Permisos</a></li>
                    </ul>
                </li>
                -->
                <li class="nav-item pcoded-menu-caption">
                    <label>Super Administrador</label>
                </li>
                <li data-username="form elements advance componant validation masking wizard picker select"
                    class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-users"></i>
                        </span>
                        <span class="pcoded-mtext">Usuarios</span></a>
                </li>
                <li data-username="Table bootstrap datatable footable" class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-award"></i>
                        </span>
                        <span class="pcoded-mtext">Roles & Permisos</span></a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Administrador</label>
                </li>
                <li data-username="form elements advance componant validation masking wizard picker select"
                    class="nav-item">
                    <a href="form_elements.html" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-users"></i>
                        </span>
                        <span class="pcoded-mtext">Usuarios</span></a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Administración</label>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Organizaciones</span>
                    </a>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-copy"></i>
                        </span><span class="pcoded-mtext">Áreas</span>
                    </a>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-grid"></i>
                        </span>
                        <span class="pcoded-mtext">Secciones</span>
                    </a>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-monitor"></i>
                        </span>
                        <span class="pcoded-mtext">Puestos de Trabajo</span>
                    </a>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-user"></i>
                        </span>
                        <span class="pcoded-mtext">Empleados</span>
                    </a>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-heart"></i>
                        </span><span class="pcoded-mtext">Estados Civiles</span>
                    </a>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-flag"></i>
                        </span>
                        <span class="pcoded-mtext">Géneros</span>
                    </a>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-map"></i>
                        </span>
                        <span class="pcoded-mtext">Departamentos</span>
                    </a>
                </li>
                <li data-username="Sample Page" class="nav-item">
                    <a href="sample-page.html" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-map-pin"></i>
                        </span>
                        <span class="pcoded-mtext">Municipios</span>
                    </a>
                </li>

                <li data-username="Disabled Menu" class="nav-item disabled"><a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Disabled menu</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="index.html" class="b-brand">
            <div class="b-bg">
                <i class="feather icon-trending-up"></i>
            </div>
            <span class="b-title">Datta Able</span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:">Action</a></li>
                    <li><a class="dropdown-item" href="javascript:">Another action</a></li>
                    <li><a class="dropdown-item" href="javascript:">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <div class="main-search">
                    <div class="input-group">
                        <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                        <a href="javascript:" class="input-group-append search-close">
                            <i class="feather icon-x input-group-text"></i>
                        </a>
                        <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="javascript:" class="m-r-10">mark as read</a>
                                <a href="javascript:">clear all</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                        <p>New ticket Added</p>
                                    </div>
                                </div>
                            </li>
                            <li class="n-title">
                                <p class="m-b-0">EARLIER</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                        <p>Prchace New Theme and make payment</p>
                                    </div>
                                </div>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-3.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                        <p>currently login</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="noti-footer">
                            <a href="javascript:">show all</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                            <span>John Doe</span>
                            <a href="auth-signin.html" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="javascript:" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                            <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            @yield('content')
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
<h1>Warning!!</h1>
<p>You are using an outdated version of Internet Explorer, please upgrade
    <br/>to any of the following web browsers to access this website.
</p>
<div class="iew-container">
    <ul class="iew-download">
        <li>
            <a href="http://www.google.com/chrome/">
                <img src="assets/images/browser/chrome.png" alt="Chrome">
                <div>Chrome</div>
            </a>
        </li>
        <li>
            <a href="https://www.mozilla.org/en-US/firefox/new/">
                <img src="assets/images/browser/firefox.png" alt="Firefox">
                <div>Firefox</div>
            </a>
        </li>
        <li>
            <a href="http://www.opera.com">
                <img src="assets/images/browser/opera.png" alt="Opera">
                <div>Opera</div>
            </a>
        </li>
        <li>
            <a href="https://www.apple.com/safari/">
                <img src="assets/images/browser/safari.png" alt="Safari">
                <div>Safari</div>
            </a>
        </li>
        <li>
            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                <img src="assets/images/browser/ie.png" alt="">
                <div>IE (11 & above)</div>
            </a>
        </li>
    </ul>
</div>
<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->


<!-- Required Js -->
<script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
@yield('js_after')
</body>
</html>