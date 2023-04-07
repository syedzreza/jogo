<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error{
            color: #cf657c;
        }
    </style>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>


<!-- login-signup page -->
<section class="log-sign">
    <div class="container">
        <div class="row login-inner">
            <div class="col-md-12">
                <div class="left-side">
                    <img src="{{url('/')}}/Frontend/assets/images/login.jpg" alt="">
                </div>
                <div class="right-side log-sign-in">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @if(is_array(session('success')))
                                <ul>
                                    @foreach (session('success') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {{ session('success') }}
                            @endif
                        </div>
                    @endif
                    @if (session()->has('fails'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <ul>
                                <li>{{ session('fails') }}</li>
                            </ul>
                        </div>
                    @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Forget Password</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form action="{{route('resetforgetpassword')}}" method="post" id="forget_form">
                                {{@csrf_field()}}
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email address">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <button type="submit" id="reset" class="btn1">RESET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
