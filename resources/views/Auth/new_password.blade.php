<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from welly.dexignzone.com/xhtml/page-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 16:39:45 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Vermicomposting</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="/dashboard_themes/css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">

                                    @if($errors->any())
                                        <div class="col-12">
                                            @foreach ($errors->all() as $error )
                                                <div class="alert alert-danger"> {{$error}}</div>
                                            @endforeach

                                        </div>
                                    @endif

                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">{{session('error')}}</div>
                                    @endif

                                    @if (session()->has('success'))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                @endif

                                    <h4 class="text-center mb-4 text-white">Forgot Password</h4>
                                    <form action="{{route('reset_password_post')}}"  method="POST">
                                        @csrf
                                        <input type="text" name="token" hidden value="{{$token}}">

                                        <div class="form-group">
                                            <label class="text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" >
                                        </div>

                                        <div class="form-group">
                                            <label class="text-white"><strong>Enter New Password</strong></label>
                                            <input type="password" class="form-control" name="password" >
                                        </div>



                                        <div class="form-group">
                                            <label class="text-white"><strong>Confirm New Password</strong></label>
                                            <input type="password" class="form-control" name="password_confirmation" >
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/dashboard_themes/vendor/global/global.min.js"></script>
	<script src="/dashboard_themes/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/dashboard_themes/js/custom.min.js"></script>
    <script src="/dashboard_themes/js/deznav-init.js"></script>

</body>


<!-- Mirrored from welly.dexignzone.com/xhtml/page-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 16:39:45 GMT -->
</html>
