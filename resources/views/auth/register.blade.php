<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('assets/images/pri.png')}}" type="image/png" />
    <!-- loader-->
    <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
    <title>Primedata| Epins | Website</title>
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-reset-password d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-5 border-end">
                            <div class="card-body">
                                <div class="">
                                    <div class="text-start">
                                        <img src="{{asset('assets/images/pri.png')}}" width="50" alt="">
                                    </div>
                                    <h4 class="mt-5 font-weight-bold">Kindly Signup here</h4>
                                    <x-jet-validation-errors class="alert alert-danger" />

                                    <form class="row g-3" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="col-sm-6">
                <label class="form-label">Full Name</label>
                <input id="name" class="form-control" type="text" name="name"  required autofocus autocomplete="name" />
            </div>

            <div class="col-sm-6">
                <label class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email"  required />
            </div>

            <div class="col-sm-6">
                <label class="form-label">Username</label>
                <input id="username" class="form-control" type="text" name="username" required autocomplete="username" />
            </div>
            <div class="col-sm-6">
                <label class="form-label">Phone-No</label>
                <input id="number" class="form-control" type="number" name="phone" required autocomplete="Phone-no" />
            </div>
            <div class="col-sm-6">
                <label class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                <input  class="form-control" type="password" name="password" id="inputChoosePassword"  required><a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                </div>
            </div>

            <div class="col-sm-6">
                <label class="form-label">Password-Confirmation</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" style="background-color: #ff0066;"><i class="bx bxs-user"></i>Sign-Up</button> <a href="{{route('login')}}" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
            </div>
                                </div>
                            </div>
                        </div>
                <div class="col-lg-7">
                    <img src="{{asset('assets/images/epins.jpg')}}" class="card-img login-img h-100" alt="...">
                </div>
            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end wrapper -->

<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>

</body>


<!-- Mirrored from creatantech.com/demos/codervent/rocker/vertical/authentication-reset-password by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Apr 2022 11:09:52 GMT -->
</html>
