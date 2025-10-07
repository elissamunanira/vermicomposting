

@extends('Dashboard.master')
@section('content')

             <!--**********************************
            Content body start
        ***********************************-->
         <div class="content-body">
            <div class="container-fluid">



                <div class="page-titles">
					<h4>Manage</h4>
                    @include('Auth.message')



                </div>

                <!--**********************************
            Content body start
        ***********************************-->

				<div class="form-head align-items-center d-flex mb-sm-4 mb-3">
					<div>
                        <a class="btn btn-primary mr-3" href="/cooperatives_membe/create"> +New member</a>

					</div>

				</div>
				<!-- Add Order -->




                <div class="row  mr-auto" >
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">


                                    <table class="table table-sm mb-0 table-responsive-lg text-black" id="bins">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">#</th>
                                                <th class="align-middle pr-7">FirstName</th>
                                                <th class="align-middle pr-7">SecondName</th>
                                                <th class="align-middle minw200">Email</th>
                                                <th class="align-middle">PhoneNumber</th>
                                                <th class="align-middle">BinsNumber</th>
                                                <th class="align-middle text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="orders">
                                            @foreach ($Members as $member)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">{{++$i}}</td>
                                                <td class="py-2"><a href="#">{{$member->firstname}}</a></td>
                                                <td class="py-2">{{$member->secondname}}</td>
                                                <td class="py-2">{{$member->email}}</td>
                                                <td class="py-2">{{$member->phonenumber}}</td>
                                                <td class="py-2">
                                                     <?php
                                                    $bins = \App\Models\Bin::where('member_id', $member->id)->count();
                                                    echo $bins;
                                                    ?>
                                                </td>
                                                <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif">
                                                        <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                            <div class="py-2">
                                                                <a class="dropdown-item" href="
                                                                /cooperatives_member/{{$member->id}}/show
                                                                ">View</a>
                                                                <div class="dropdown-divider"></div>




                                                                <a class="dropdown-item" href="
                                                               /cooperatives_member_update/{{$member->id}}/create">Edit</a>



                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="/create_bin/{{$member->id}}/create">+ Bin</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger" href=
                                                                "/cooperatives_member_update/{{$member->id}}/delete
                                                                ">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


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
