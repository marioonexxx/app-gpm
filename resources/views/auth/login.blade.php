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
    <title>Login</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet"><!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/themify.css') }}"><!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start--><!-- Plugins css Ends--><!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/bootstrap.css') }}"><!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('cuba/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/responsive.css') }}">
    <script defer src="{{ asset('cuba/assets/css/color-1.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-2.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-3.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-4.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-5.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-6.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/responsive.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/style.js') }}"></script>
    <link href="{{ asset('cuba/assets/css/color-1.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-2.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-3.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-4.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-5.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-6.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center"
                    src="{{ asset('cuba/assets/images/gereja/gereja-3.png') }}" alt="looginpage">
            </div>
            <div class="col-xl-5 p-0">

                <div class="login-card login-dark">
                    <div>
                        <a class="logo text-start" href="index.html">
                            
                        </a>
                    </div>

                    <div class="login-main">
                        <img class="img-fluid d-block mx-auto for-light" src="{{ asset('cuba/assets/images/logo/logo-gpm.jpg') }}" alt="logo GPM" style="height: 30%; width: 30%;">
                        <br>
                        <h4 style="text-align: center">Sistem Informasi Manajemen Gereja</h4>
                        <h5  style="text-align: center">Jemaat GPM Halong Anugerah</h5>
                        <br>
                        <form class="theme-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <p style="text-align: center">Masukan username dan password anda untuk login.</p>
                            <div class="form-group">
                                <label class="col-form-label">Email Address</label>
                                <input class="form-control" name="email" type="email" required="" placeholder="username@mail.com">
                            </div>
                            <div class="form-group"><label class="col-form-label">Password</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                    <div class="show-hide"><span class="show"> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="form-check">
                                    <input class="checkbox-primary form-check-input" id="checkbox1" type="checkbox">
                                    <label class="text-muted form-check-label" for="checkbox1">Remember
                                        password</label>
                                </div>
                                <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Sign
                                    in</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- latest jquery-->
    <script src="{{ asset('cuba/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('cuba/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('cuba/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js--><!-- Sidebar jquery-->
    <script src="{{ asset('cuba/assets/js/config.js') }}"></script>
    <!-- Plugins JS start--><!-- Plugins JS Ends--><!-- Theme js-->
    <script src="{{ asset('cuba/assets/js/script.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/script1.js') }}"></script>
    </div>
</body>

</html>
