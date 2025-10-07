

@extends('Dashboard.master')
@section('content')

             <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">



                <div class="page-titles">
					<h4>Manage</h4>
					<ol class="breadcrumb">

						<li class="breadcrumb-item active"><a href="javascript:void(0)">CO-Operative</a></li>
					</ol>


                </div>


                 <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">

                            <a class="btn btn-primary" href="/dashboard"> Back</a>

                        </div>

                    </div>

                </div>



                <div class="card-body">
                    @if(Session::get('success'))
                                    <div class="alert alert-seccess">
                                      {{Session::get('success')}}
                                      @php
                                          Session::forget('success')
                                      @endphp


                                    </div>
                                    @endif
                    <div class="basic-form">
                        <form method="post" action="/cooperatives/post">
                            @csrf

                            <div class="card-body">
                                <div class="form-group   col-sm-12">


                                <label class="col-lg-4 col-form-label"          for="val-suggestions">Co-operativename<span
                                    class="text-danger">*</span>
                                </label>


                                <input type="text" class="form-control input-default" name="co_operativename" placeholder="Cooperative-name">


                                @if($errors->has('co_operativename'))
                                <span class="text-danger">
                                  {{$errors->first('co_operativename')}}
                                </span>
                                @endif

                            </div>

                            <div class="form-group   col-sm-12">


                                <label class="col-lg-4 col-form-label"          for="val-suggestions">Co-operativeEmail<span
                                    class="text-danger">*</span>
                                </label>


                                <input type="text" class="form-control input-default" name="co_operative_email" placeholder="example@gmail.com">


                                @if($errors->has('co_operative_email'))
                                <span class="text-danger">
                                  {{$errors->first('co_operative_email')}}
                                </span>
                                @endif

                            </div>

                            <div class="form-group   col-sm-12">


                                <label class="col-lg-4 col-form-label"          for="val-suggestions">Co-operativePhoneNumber<span
                                    class="text-danger">*</span>
                                </label>


                                <input type="text" class="form-control input-default" name="co_operative_telephone" placeholder="078...">


                                @if($errors->has('co_operative_telephone'))
                                <span class="text-danger">
                                  {{$errors->first('co_operative_telephone')}}
                                </span>
                                @endif

                            </div>

                            <div class="form-group   col-sm-12">


                                <label class="col-lg-4 col-form-label"          for="val-suggestions">Co-operativeStartingDate<span
                                    class="text-danger">*</span>
                                </label>


                                <input type="date" class="form-control input-default" name="starting_date" placeholder="dd/mm/yy">


                                @if($errors->has('starting_date'))
                                <span class="text-danger">
                                  {{$errors->first('starting_date')}}
                                </span>
                                @endif

                            </div>












                            <div class="form-group col-sm-12">


                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Co-operative Manager <span
                                        class="text-danger">*</span>
                                    </label>


                                    <select  class="form-control input-default" name="co_operativemanager">
                                        <option disable selected>Choose Manager</option>
                                        @foreach($managers as $manager)
                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>


                                    @if($errors->has('co_operativemanager'))
                                <span class="text-danger">
                                  {{$errors->first('co_operativemanager')}}
                                </span>
                                @endif

                            </div>

                            </div>
                            @include('livewire.dependent_dropdown')



                        <button type="submit" class="btn mr-2 btn-primary">Submit</button>

                        </form>
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
@livewireScripts()
@endsection
