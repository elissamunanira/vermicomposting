@extends('Dashboard.master')


@section('content')

        <!--**********************************
            Content body start
        ***********************************-->







                <div class="content-body">
                    <!-- row -->
                    <div class="container-fluid">
                        <div class="page-titles">
                            <h4>Profile</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">   {{$user->name}}</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                            </ol>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="profile card card-body px-3 pt-3 pb-0">
                                    <div class="profile-head">

                                        <div class="profile-info">
                                            <div class="profile-photo">
                                                <img src="{{$user_profile->profilePic ? asset('storage/'.$user_profile->profilePic) : asset('images/no-image.jpg')}}" class="img-fluid rounded-circle" alt="hh">
                                            </div>
                                            <div class="profile-details">
                                                <div class="profile-name px-3 pt-2">
                                                    <h4 class="text-primary mb-6">




                                                        {{$user->name}}

                                                    </h4>
                                                    <p>UserName</p>
                                                </div>
                                                <div class="profile-email px-2 pt-2">
                                                    <h4 class="text-muted mb-6">{{$user->email}}</h4>
                                                    <p>user Email</p>
                                                </div>

                                                {{-- <div class="profile-email px-2 pt-2">
                                                    <h4 class="text-muted mb-6"></h4>
                                                    <p>Role</p>
                                                </div> --}}


                                                <div class="profile-email px-2 pt-2">
                                                    <h4 class="text-muted mb-6">Active</h4>
                                                    <p>Account status</p>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li class="dropdown-item"><i class="fa fa-pencil text-primary mr-2"></i>Edit</li>

                                                        {{-- <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                                                        <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-9 col-xxl-12">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card details-card">
                                            <img src="images/bg.jpg" alt="" class="bg-img">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-7 mb-sm-0 mb-3">
                                                        <div class="d-flex">
                                                            <i class="las la-map-marker text-primary fs-34 mr-3"></i>
                                                            <div>
                                                                <span class="d-block mb-1">{{$user_profile->cell}}</span>
                                                                <p class="fs-18 mb-0 text-black">{{$user_profile->sector}}, {{$user_profile->district}}, <strong class="d-block">{{$user_profile->province}}</strong></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="media align-items-center">
                                                            <i class="las la-phone fs-30 text-primary mr-3"></i>
                                                            <div class="media-body">
                                                                <span class="d-block mb-1">Phone</span>
                                                                <p class="fs-18 mb-0 text-black">{{$user_profile->phonenumber}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="media align-items-center">
                                                            <i class="las la-envelope-open fs-30 text-primary mr-3"></i>
                                                            <div class="media-body">
                                                                <span class="d-block mb-1">Email</span>
                                                                <p class="fs-18 mb-0 text-black">{{$user->email}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-xxl-12">
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-4 col-lg-5">
                                        <div class="card">
                                            <div class="card-header border-0 pb-0">
                                                <h4 class="fs-20 text-black mb-0">User fullName</h4>

                                            </div>
                                            <div class="card-body">
                                                <div class="media mb-4 align-items-center">
                                                    <img src="{{$user_profile->profilePic ? asset('storage/'.$user_profile->profilePic) : asset('images/no-image.jpg')}}"  alt="hh" width="85" class="mr-3" >

                                                    <div class="media-body">
                                                        <h3 class="fs-18 font-w600 mb-1"><a href="javascript:void(0)" class="text-black">{{$user_profile->firstname}}  {{$user_profile->secondname}}</a></h3>
                                                        <span class="fs-14">{{$user->Roles}}</span>
                                                       <p><span class="fs-14">{{$user_profile->gender}}</span></p>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header border-0 pb-0">
                                                <h4 class="fs-20 text-black mb-0">Account Description</h4>
                                                <a href="javascript:void(0)">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8684 8.09625C20.9527 8.25375 21 8.43375 21 8.625V18.75C21 21.2351 18.9862 23.25 16.5 23.25H4.125C3.504 23.25 3 22.746 3 22.125V1.875C3 1.254 3.504 0.75 4.125 0.75H13.125C13.3162 0.75 13.4963 0.797251 13.6538 0.881626L13.6571 0.883874C13.7449 0.929999 13.827 0.989626 13.9013 1.0605L13.9204 1.07962L20.6704 7.82962L20.6895 7.84875C20.7615 7.92413 20.82 8.00625 20.8673 8.09287L20.8684 8.09625ZM12 3H5.25V21H16.5C17.7431 21 18.75 19.9931 18.75 18.75V9.75H13.125C12.504 9.75 12 9.246 12 8.625V3ZM9.75 18.75H14.25C14.871 18.75 15.375 18.246 15.375 17.625C15.375 17.004 14.871 16.5 14.25 16.5H9.75C9.129 16.5 8.625 17.004 8.625 17.625C8.625 18.246 9.129 18.75 9.75 18.75ZM8.625 14.25H15.375C15.996 14.25 16.5 13.746 16.5 13.125C16.5 12.504 15.996 12 15.375 12H8.625C8.004 12 7.5 12.504 7.5 13.125C7.5 13.746 8.004 14.25 8.625 14.25ZM17.1592 7.5L14.25 4.59075V7.5H17.1592Z" fill="black"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="card-body pt-3">
                                                <p class="mb-0"> {{$user_profile->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    





      <!--**********************************
          Content body end
      ***********************************-->
@endsection
