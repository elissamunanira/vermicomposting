

@extends('Dashboard.master')
@section('content')

             <!--**********************************
            Content body start
        ***********************************-->
         <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>Cooperative</h4>
					<ol class="breadcrumb">

						<li class="breadcrumb-item active"><a href="javascript:void(0)">Managers</a></li>
					</ol>

                    <div class="mt-4">

                        <a href="/dashboard" class="btn btn-primary mb-1">Back</a>
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
                                               
                                            

                                            </tr>
                                        </thead>

                                        <tbody id="orders">
                                            @foreach ($managers as $manager)

                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">

                                                {{++$i}}
                                                </td>
                                                <td class="py-2">
                                                    <a href="#">
                                                    {{$manager->name}}

                                                </td>
                                                <td class="py-2">{{$manager->email}}</td>

                                              



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
