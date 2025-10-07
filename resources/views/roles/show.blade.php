
@extends('Dashboard.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
    



            <div class="page-titles">
                <h4>Show Role</h4>
                <ol class="breadcrumb">
                    <div class="pull-right">
                        <li class="breadcrumb-item active btn"><a  href="{{ route('roles.index') }}">back</a></li>
                        
                    </div>
                    
                   
                </ol>
            </div>




        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label ">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

        </div>

</div>
</div>
@endsection
