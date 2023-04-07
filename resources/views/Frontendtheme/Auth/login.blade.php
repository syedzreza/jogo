
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

<div class="container">
    <div class="breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">login</li>

            </ol>
        </nav>
    </div>
</div>

<!-- login-signup page -->
<section class="log-sign">
    <div class="container">
        <div class="row login-inner">
            <div class="col-md-12" style="margin-top: -54px;">
                <div class="left-side">
                    <img src="{{url('/')}}/Frontend/assets/images/login.jpg" alt="">
                </div>
                <div class="right-side log-sign-in">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Log In</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link link-1" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form action="{{route('loginsave')}}" method="post" id="login_form">
                                {{@csrf_field()}}
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email address">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <button type="submit" id="login" class="btn1">LOG IN</button>
                                <div class="f-password">
                                    <a href="{{route('forgetpassword')}}">Forgot Password?</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                            <form action="{{route('saveregister')}}" method="post" id="register_form">
                                {{@csrf_field()}}
                                <div class="form-group">
                                    <input type="text" placeholder="First Name" name="f_name" onkeypress="validate(event)" class="form-control" id="f_name">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Last Name" name="l_name" onkeypress="validate(event)" class="form-control" id="l_name">
                                </div>
                                <div class="form-group">
                                    <input type="number" placeholder="Phone Number" name="phone" class="form-control" id="phone">
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Email" name="email" class="form-control" id="registeremail">
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" name="password" class="form-control" id="registerpassword">
                                </div>
                                <button type="submit" id="sign_up" class="btn1">SIGN UP</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- login-signup page end-->
<script>
    function validate(evt) {
        var theEvent = evt || window.event;
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {

            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /(^([a-zA-Z]+)(\d+)?$)/u;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
    if ($("#register_form").length > 0) {
        $("#register_form").validate({
            rules: {
                f_name: {
                    required: true,
                    maxlength: 20
                },
                l_name: {
                    required: true,
                    maxlength: 20
                },
                phone: {
                    required: true,
                    maxlength: 10
                },
                email: {
                    required: true
                },
                password : {
                    minlength : 6,
                    maxlength : 18,
                    required : true
                }
            },
            messages: {
                f_name: {
                    required: "Please Enter Your First Name"
                },
                l_name: {
                    required: "Please Enter Your Last Name"
                },
                phone: {
                    required: "Please Enter Your Phone Number"
                },
                email : {
                    required : 'Please Enter Your Email Detail',
                    email : 'Enter Valid Email Detail',
                    maxlength : 'Email should not be more than 20 character'
                },
                password : {
                    required : 'Password must be required',
                    maxlength : 'Password should not be more than 18 character',
                    minlength : 'Password should not be less than 6 character',
                }
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#sign_up').html('Please Wait....');
                $.ajax({
                    url: "{{route('saveregister')}}",
                    type: "POST",
                    data: $('#register_form').serialize(),
                    success: function( data ) {
                        $('#sign_up').html('Submit');
                        if (data.status == 'success') {
                            console.log(data.msg);
                            swal.fire({
                                title: data.msg,
                                icon: "success",
                                button: "OK"
                            });
                            document.getElementById("register_form").reset();
                        }
                    }

                });
            }
        });
    }
</script>

<script>
    if ($("#login_form").length > 0) {
        $("#login_form").validate({
            rules: {
                email: {
                    required: true
                },
                password : {
                    required : true
                }
            },
            messages: {
                email : {
                    required : 'Please Enter Your Email Detail',
                    email : 'Enter Valid Email Detail',
                    maxlength : 'Email should not be more than 20 character'
                },
                password : {
                    required : 'Password must be required',
                }
            },
        });
    }

    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};

</script>

<script src="{{url('/')}}/Frontend/library/js/app-min.js"></script>
</body>
</html>



