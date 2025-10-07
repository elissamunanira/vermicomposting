

@extends('Dashboard.master')
@section('content')

             <!--**********************************
            Content body start
        ***********************************-->
         <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>Manage</h4>
					<ol class="breadcrumb">

						<li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
					</ol>

                    <div class="mt-4">

                        <a href="/users/create/" class="btn btn-primary mb-1">Create  New User</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-responsive-lg text-black" id="bins">
                                        <thead>
                                            <tr>

                                                <th class="align-middle">#</th>
                                                <th class="align-middle pr-7">Name</th>
                                                <th class="align-middle minw200">Email</th>
                                                <th class="align-middle">Role</th>
                                                <th class="align-middle">Status</th>
                                                <th class="align-middle text-right">Action</th>

                                            </tr>
                                        </thead>


                                        <tbody id="orders">
                                            @foreach ($users as $user)

                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">

                                                {{++$i}}
                                                </td>
                                                <td class="py-2">
                                                    <a href="#">
                                                    {{$user->name}}

                                                </td>
                                                <td class="py-2">{{$user->email}}</td>

                                                <td class="py-2">
                                                    @if(!empty($user->getRoleNames()))
                                                        @foreach($user->getRoleNames() as $v)
                                                            {{ $v }}
                                                        @endforeach
                                                    @endif
                                                    <p class="mb-0 text-500"></p>
                                                </td>

                                                <td class="py-2">



                                                    @if($user->status == 1)
                                                    <a href="{{route('users.update.status',['user_id'=>$user->id,'status_code'=> 0])}}" class="btn btn-success m-2">
                                                        <i class="fa fa-check"></i>

                                                    </a>
                                                    @else

                                                    <a href="{{route('users.update.status',['user_id'=>$user->id,'status_code'=> 1])}}" class="btn btn-danger m-2">
                                                        <i class="fa fa-ban"></i>
                                                   </a>

                                                   @endif


                                                </td>


                                                <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                            <div class="py-2"><a class="dropdown-item" href="/Profile/show/{{$user->id}}">View</a>


                                                                <div class="dropdown-divider"></div>

                                                                <a class="dropdown-item" href="/users/{{$user->id}}/edit">Edit</a>

                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger" href="{{"/delete_vermuser/".$user->id}}">Delete</a>
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

@endsection('content')
