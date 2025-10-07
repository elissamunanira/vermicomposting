
<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from welly.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 16:38:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>verlmicomposting</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
    <link href="/dashboard_themes/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>

<body class="h-100">

    <div class="authincation h-100">
        <div class="container h-100">
            <div class="page-titles">
                <h4>Login To Be</h4>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Authenticated</a></li>

                </ol>
                <h5>
                    @if (session('error'))
                        <span class="text-danger">{{session('error')}}</span>

                    @endif

                </h5>
            </div>
            <div class="row justify-content-center h-100 align-items-center">

                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<p>verlmicomposting</p>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    @if (Session::get('success'))

                                    <div class="alert alert-success">
                                        {{Session::get('success')}}

                                        @php
                                            Session::forget('success')
                                        @endphp
                                    </div>

                                    @endif
                                    <form method="POST" action="{{url('/log')}}">

                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control">

                                            @if ($errors->has('email'))

                                            <span class="text-danger">


                                            {{$errors->first('email')}}
                                            </span>

                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control">
                                            @if ($errors->has('password'))

                                            <span class="text-danger">


                                            {{$errors->first('password')}}
                                            </span>

                                            @endif
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1 text-white">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                         <a class="text-white" href="{{route('forget_password')}}">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="/register">Sign up</a></p>
                                    </div>
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


<!-- Mirrored from welly.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 16:38:49 GMT -->
</html>
