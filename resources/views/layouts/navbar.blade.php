<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('cuba/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('cuba/assets/images/favicon.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/fontawesome.css') }}"> --}}
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/prism.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('cuba/assets/css/color-1.css') }}" media="screen">
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery (required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/responsive.css') }}">
    @yield('script')
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"> <span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Anything Here..." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span
                                        class="sr-only">Loading...</span></div><i class="close-search"
                                    data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                                src="{{ asset('cuba/assets/images/logo/logo.png') }}" alt=""><img
                                class="img-fluid for-dark" src="{{ asset('cuba/assets/images/logo/logo_dark.png') }}"
                                alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                            data-feather="align-center"></i></div>
                </div>
                <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
                    <h4 class="text-primary">Periode Tahun Aktif : {{ $TahunAktif->nama_tahun ?? 'Tidak ada periode aktif.' }}</h4> 
                </div>
                <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                    <ul class="nav-menus">
                        <li class="language-nav">
                            <div class="translate_wrapper">
                                <div class="current_lang">
                                    <div class="lang"><i class="flag-icon flag-icon-us"></i><span
                                            class="lang-txt">EN </span></div>
                                </div>
                                <div class="more_lang">
                                    <div class="lang selected" data-value="en"><i
                                            class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span>
                                                (US)</span></span></div>
                                    <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span
                                            class="lang-txt">Deutsch</span></div>
                                    <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span
                                            class="lang-txt">Español</span></div>
                                    <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span
                                            class="lang-txt">Français</span></div>
                                    <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span
                                            class="lang-txt">Português<span> (BR)</span></span></div>
                                    <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span
                                            class="lang-txt">简体中文</span></div>
                                    <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span
                                            class="lang-txt">لعربية <span> (ae)</span></span></div>
                                </div>
                            </div>
                        </li>
                        <li class="fullscreen-body"> <span>
                                <svg id="maximize-screen">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#full-screen') }}"></use>
                                </svg></span></li>
                        <li> <span class="header-search">
                                <svg>
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#search') }}"></use>
                                </svg></span></li>
                        <li class="onhover-dropdown">
                            <svg>
                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#star') }}"></use>
                            </svg>
                            <div class="onhover-show-div bookmark-flip">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="front">
                                            <h6 class="f-18 mb-0 dropdown-title">Bookmark</h6>
                                            <ul class="bookmark-dropdown">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4 text-center">
                                                            <div class="bookmark-content">
                                                                <div class="bookmark-icon"><i
                                                                        data-feather="file-text"></i></div>
                                                                <span>Forms</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <div class="bookmark-content">
                                                                <div class="bookmark-icon"><i data-feather="user"></i>
                                                                </div><span>Profile</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <div class="bookmark-content">
                                                                <div class="bookmark-icon"><i
                                                                        data-feather="server"></i></div>
                                                                <span>Tables</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="text-center"><a
                                                        class="flip-btn f-w-700 btn btn-primary w-100" id="flip-btn"
                                                        href="#!">Add Bookmark</a></li>
                                            </ul>
                                        </div>
                                        <div class="back">
                                            <ul>
                                                <li>
                                                    <div class="bookmark-dropdown flip-back-content">
                                                        <input type="text" placeholder="Search...">
                                                    </div>
                                                </li>
                                                <li><a class="f-w-700 d-block flip-back btn btn-primary w-100"
                                                        id="flip-back" href="#!">Back</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="mode">
                                <svg>
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#moon') }}"></use>
                                </svg>
                            </div>
                        </li>
                        <li class="cart-nav onhover-dropdown">
                            <div class="cart-box">
                                <svg>
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                                </svg><span class="badge rounded-pill badge-danger">2</span>
                            </div>
                            <div class="cart-dropdown onhover-show-div">
                                <h6 class="f-18 mb-0 dropdown-title">Cart</h6>
                                <ul>
                                    <li>
                                        <div class="d-flex"><img class="img-fluid b-r-5 me-3 img-60"
                                                src="{{ asset('cuba/assets/images/other-images/cart-img.jpg') }}"
                                                alt="">
                                            <div class="flex-grow-1"><span>Furniture Chair for Home</span>
                                                <div class="qty-box">
                                                    <div class="input-group"><span class="input-group-prepend">
                                                            <button class="btn quantity-left-minus" type="button"
                                                                data-type="minus" data-field="">-</button></span>
                                                        <input class="form-control input-number" type="text"
                                                            name="quantity" value="1"><span
                                                            class="input-group-prepend">
                                                            <button class="btn quantity-right-plus" type="button"
                                                                data-type="plus" data-field="">+</button></span>
                                                    </div>
                                                </div>
                                                <h6 class="font-primary">$12.45</h6>
                                            </div>
                                            <div class="close-circle"><a class="bg-danger" href="#"><i
                                                        data-feather="x"></i></a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex"><img class="img-fluid b-r-5 me-3 img-60"
                                                src="{{ asset('cuba/assets/images/other-images/cart-img1.jpg') }}"
                                                alt="">
                                            <div class="flex-grow-1"><span>Rest Well Chair</span>
                                                <div class="qty-box">
                                                    <div class="input-group"><span class="input-group-prepend">
                                                            <button class="btn quantity-left-minus" type="button"
                                                                data-type="minus" data-field="">-</button></span>
                                                        <input class="form-control input-number" type="text"
                                                            name="quantity" value="1"><span
                                                            class="input-group-prepend">
                                                            <button class="btn quantity-right-plus" type="button"
                                                                data-type="plus" data-field="">+</button></span>
                                                    </div>
                                                </div>
                                                <h6 class="font-primary">$49.00</h6>
                                            </div>
                                            <div class="close-circle"><a class="bg-danger" href="#"><i
                                                        data-feather="x"></i></a></div>
                                        </div>
                                    </li>
                                    <li class="total">
                                        <h6 class="mb-0">Order Total : <span class="f-right">$1000.00</span></h6>
                                    </li>
                                    <li class="text-center"><a class="d-block view-cart f-w-700 btn btn-primary w-100"
                                            href="cart.html">View Cart</a><a
                                            class="btn btn-primary view-checkout btn btn-primary w-100 f-w-700"
                                            href="checkout.html">Checkout</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box">
                                <svg>
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#notification') }}"></use>
                                </svg><span class="badge rounded-pill badge-success">4 </span>
                            </div>
                            <div class="onhover-show-div notification-dropdown">
                                <h6 class="f-18 mb-0 dropdown-title">Notifications </h6>
                                <ul>
                                    <li class="b-l-primary border-4 toast default-show-toast align-items-center text-light border-0 fade show"
                                        aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                        <div class="d-flex justify-content-between">
                                            <div class="toast-body">
                                                <p>Delivery processing</p>
                                            </div>
                                            <button class="btn-close btn-close-white me-2 m-auto" type="button"
                                                data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                    </li>
                                    <li class="b-l-success border-4 toast default-show-toast align-items-center text-light border-0 fade show"
                                        aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                        <div class="d-flex justify-content-between">
                                            <div class="toast-body">
                                                <p>Order Complete</p>
                                            </div>
                                            <button class="btn-close btn-close-white me-2 m-auto" type="button"
                                                data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                    </li>
                                    <li class="b-l-secondary border-4 toast default-show-toast align-items-center text-light border-0 fade show"
                                        aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                        <div class="d-flex justify-content-between">
                                            <div class="toast-body">
                                                <p>Tickets Generated</p>
                                            </div>
                                            <button class="btn-close btn-close-white me-2 m-auto" type="button"
                                                data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                    </li>
                                    <li class="b-l-warning border-4 toast default-show-toast align-items-center text-light border-0 fade show"
                                        aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                        <div class="d-flex justify-content-between">
                                            <div class="toast-body">
                                                <p>Delivery Complete</p>
                                            </div>
                                            <button class="btn-close btn-close-white me-2 m-auto" type="button"
                                                data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 py-0">
                            <div class="d-flex profile-media"><img class="b-r-10"
                                    src="{{ asset('cuba/assets/images/dashboard/profile.png') }}" alt="">
                                <div class="flex-grow-1"><span>Emay Walter</span>
                                    <p class="mb-0">Admin <i class="middle fa-solid fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="../template/sign-up.html"><i data-feather="user"></i><span>Account
                                        </span></a></li>
                                <li><a href="../template/mail-box.html"><i
                                            data-feather="mail"></i><span>Inbox</span></a></li>
                                <li><a href="../template/task.html"><i
                                            data-feather="file-text"></i><span>Taskboard</span></a></li>
                                <li><a href="../template/add-user.html"><i
                                            data-feather="settings"></i><span>Settings</span></a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit"
                                            style="background: none; border: none; padding: 0; cursor: pointer;">
                                            <i data-feather="log-in"></i> <span>Log out</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
                <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper horizontal-menu">
            @include('layouts.partial.sidebar')
            @yield('content');
            @include('layouts.partial.footer')
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('cuba/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('cuba/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('cuba/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('cuba/assets/js/scrollbar/simplebar.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('cuba/assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('cuba/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/sidebar-pin.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/header-slick.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('cuba/assets/js/script.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/script1.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/theme-customizer/customizer.js') }}"></script>

    <!-- DataTables CSS Online-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery (required) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @stack('scripts')
</body>

</html>
