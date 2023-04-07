<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WebCreate</title>
    <link rel="shortcut icon" href="{{url('/')}}/Frontend/assets/default/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{url('/')}}/Frontend/assets/default/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{url('/')}}/Frontend/library/style/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{url('/')}}/admintheme/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/css/animate.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

@include('Frontendtheme.layouts.header')

@yield('content')

<footer class="footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="imgArea">
                        <img src="{{url('/')}}/Frontend/assets/images/footerImg1.jpg" alt="Logo" loading="lazy" height="143" width="128">
                        <img src="{{url('/')}}/Frontend/assets/images/footerImg2.jpg" alt="Logo" loading="lazy" height="132" width="130">

                    </div>
                </div>
                <div class="col-md-2">
                    <h3>Quick Link</h3>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h3>Quick Link</h3>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Subscribe to get offer</h3>
                    <form>
                        <input type="email" placeholder="Enter E-mail Address">
                        <button>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <p>
                © 2021 JOOF Computer Centre AGSI. All Rights Reserved
            </p>
        </div>
    </div>
</footer>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="{{url('/')}}/Frontend/library/js/app-min.js"></script>
</body>
</html>
