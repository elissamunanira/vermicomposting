{{-- @extends('Normal.layout')


@section('content')
<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
  <div class="mx-4">
                <div
                    class="bg-laravel border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Register
                        </h2>
                        <p class="mb-4">Create an account to join our system</p>
                    </header>

                    <form method="POST" action="{{url('/regis')}}">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="inline-block text-lg mb-2">
                                Name
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="name"
                            />
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Email</label
                            >
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                            />
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="password"
                                class="inline-block text-lg mb-2"
                            >
                                Password
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="password"
                            />
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6 ">
                            <label
                                for="password2"
                                class="inline-block text-lg mb-2"
                            >
                                Confirm Password
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="password_confirmation"
                            />
                            @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                type="submit"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Sign Up
                            </button>
                        </div>

                        <div class="mt-8 text-white">
                            <p>
                                Already have an account?
                                <a href="/login" class="text-black"
                                    >Login</a
                                >
                            </p>
                        </div>
                    </form>
                </div>
            </div>
@endsection --}}
<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from welly.dexignzone.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 16:39:25 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vermicomposting</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
    <link href="css/style.css" rel="stylesheet">
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
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign Up to Vermicomposting System</h4>
                                    @if (Session::get('success'))

                                    <div class="alert alert-success">
                                        {{Session::get('success')}}

                                        @php
                                            Session::forget('success')
                                        @endphp
                                    </div>

                                    @endif
                                    <form method="POST" action="{{url('/regis')}}">

                                    @csrf
                                        <div class="form-group">

                                            <label class="mb-1 text-white"><strong>Username</strong></label>

                                            <input type="text" class="form-control" name="name" placeholder="username">

                                            @if ($errors->has('name'))

                                            <span class="text-danger">


                                            {{$errors->first('name')}}
                                            </span>

                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" placeholder="hello@example.com">

                                            @if ($errors->has('email'))

                                            <span class="text-danger">


                                            {{$errors->first('email')}}
                                            </span>

                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password*</strong></label>
                                            <input type="password" name="password" class="form-control" >

                                            @if ($errors->has('password'))

                                            <span class="text-danger">


                                            {{$errors->first('password')}}
                                            </span>

                                            @endif
                                        </div>



                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>confirm YourPassword*</strong></label>
                                            <input type="password" name="password_confirmation" class="form-control" >
                                            
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="/login">Sign in</a></p>
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
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/deznav-init.js"></script>

</body>

<!-- Mirrored from welly.dexignzone.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 16:39:25 GMT -->
</html>
