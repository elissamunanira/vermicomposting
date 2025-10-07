@extends('Dashboard.master')


@section('content')

        <!--**********************************
            Content body start
        ***********************************-->







                <div class="content-body">
                    <!-- row -->
                    <div class="container-fluid">
                        <div class="page-titles">
                            <h4>worms</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">   {{$worm->name}}</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">worm</a></li>
                            </ol>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="profile card card-body px-3 pt-3 pb-0">
                                    <div class="profile-head">

                                        <div class="profile-info">

                                            <div class="profile-details">
                                                <div class="profile-name px-3 pt-2">
                                                    <h4 class="text-primary mb-6">




                                                        {{$worm->name}}

                                                    </h4>
                                                    <p>wormname</p>
                                                </div>


                                                {{-- <div class="profile-email px-2 pt-2">
                                                    <h4 class="text-muted mb-6"></h4>
                                                    <p>Role</p>
                                                </div> --}}



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-9 col-xxl-12">
                                <div class="row">

                                    <div class="col-lg-7">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-7 mb-sm-0 mb-3">
                                                        <div class="d-flex">

                                                            <div>
                                                                <span class="d-block mb-1">{{$worm->population}}  population</span>

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

                                                            <div class="media-body">
                                                                <span class="d-block mb-1">Description</span>
                                                                <p class="fs-18 mb-0 text-black">{{$worm->description}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">price</h4>
                                        <h3>{{$worm->price}} $</h3>


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
