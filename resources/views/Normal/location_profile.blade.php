
<!DOCTYPE html>

<html lang="en">


<!-- Mirrored from welly.dexignzone.com/xhtml/form-validation-jquery.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 16:39:22 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vermicomposting</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
	<link href="/dashboard_themes/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/dashboard_themes/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


     <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

                <!-- row -->
                <div class="row">

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fill in requred information Please.</h4>
                                @if(Session::get('success'))
                                <div class="alert alert-seccess">
                                  {{Session::get('success')}}
                                  @php
                                      Session::forget('success')
                                  @endphp


                                </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="form-valide-with-icon" method="POST" action="/location/store" enctype="multipart/form-data">
                                      @csrf



                                      <div class="form-group">
                                        <label class="text-label">FirstName</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="val-username1" name="firstname" placeholder="Enter Your FirstName..">

                                        </div>
                                        @if($errors->has('firstname'))
                                        <span class="text-danger">
                                          {{$errors->first('firstname')}}
                                        </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label class="text-label">SecondName</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="val-username1" name="secondname" placeholder="Enter Your SecondName..">

                                        </div>
                                        @if($errors->has('secondname'))
                                        <span class="text-danger">
                                          {{$errors->first('secondname')}}
                                        </span>
                                        @endif
                                    </div>

                                     <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload ProfilePic</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="profilePic" class="custom-file-input">
                                            <label class="custom-file-label">Choose Photo</label>
                                        </div>
                                    </div>


                                  <div class="form-group">
                                    <label class="text-label">phonenumber</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-phone" aria-hidden="true"></i> </span>
                                        </div>
                                        <input type="number" class="form-control" id="val-username1" name="phonenumber" placeholder="Enter PhoneNumber">

                                    </div>
                                    @if($errors->has('phonenumber'))
                                    <span class="text-danger">
                                      {{$errors->first('phonenumber')}}
                                    </span>
                                    @endif
                                </div>






                                <div class="form-group mb-0">
                                    <label for="Gender">Gender  :</label>
                                    <label class="radio-inline mr-3">

                                        <input type="radio" name="gender" value="Male">Male</label>

                                    <label class="radio-inline mr-3"><input type="radio" name="gender"  value="Female">Female</label>

                                    <label class="radio-inline mr-3"><input type="radio" name="gender" value="other">other</label>


                                    @if($errors->has('gender'))
                                        <span class="text-danger">
                                        {{$errors->first('gender')}}
                                        </span>
                                    @endif

                                </div>



                                @include('livewire.dependent_dropdown')































                                                    <div class="form-group">

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">

                                                            </div>
                                                            <input type="hidden" class="form-control" id="val-username1" name="user_id"

                                                            value="{{auth()->user()->id}}">

                                                        </div>

                                                    </div>


                                            <button type="submit" class="btn mr-2 btn-primary">Submit</button>

                                            <a  class="btn mr-2 btn-primary" href="/logout"> Cancel</a>



                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!--**********************************
            Content body end
        ***********************************-->


 <!-- Required vendors -->
 <script src="/dashboard_themes/vendor/global/global.min.js"></script>
 <script src="/dashboard_themes/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
 <script src="/dashboard_themes/js/custom.min.js"></script>
 <script src="/dashboard_themes/js/deznav-init.js"></script>





 <!-- Jquery Validation -->
 <script src="/dashboard_themes/vendor/jquery-validation/jquery.validate.min.js"></script>
 <!-- Form validate init -->
 <script src="/dashboard_themes/js/plugins-init/jquery.validate-init.js"></script>



</body>
@livewireScripts
</html>
