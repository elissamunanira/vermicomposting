@extends('Dashboard.master')
@section('content')

        <div class="content-body">
            <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <div class="page-titles">
                        <h4>Manage User</h4>
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Roles</a></li>

                        </ol>
                    </div>
                      <div class="mt-4">

                                <a href="{{ route('roles.create') }}" class="btn btn-primary mb-1">Create  Role</a>
                            </div>
                </div>

            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered" id="bins">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <div class="dropdown text-sans-serif">
                            <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-{{ $key }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                            <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-{{ $key }}">
                                <div class="py-2">
                                    <a class="dropdown-item" href="{{ route('roles.show', $role->id) }}">View</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn text-danger']) !!}
                                        {!! Form::close() !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Include the necessary DataTables files -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

        <script>
            // Initialize DataTables
            $(document).ready(function() {
                $('#bins').DataTable();
            });
        </script>





        {!! $roles->render() !!}


            </div>
        </div>


        <!--**********************************
            Content body end
        ***********************************-->
@endsection
