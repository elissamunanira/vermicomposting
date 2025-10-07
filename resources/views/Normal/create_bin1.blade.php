@extends('Dashboard.master')


@section('content')





        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>bin</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">bin</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Bin</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">

                                    @if(Session::get('success'))
                                    <div class="alert alert-success">
                                      {{Session::get('success')}}
                                      @php
                                          Session::forget('success')
                                      @endphp


                                    </div>
                                    @endif
                                    <form class="form-valide" action="/create_bin/post" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">

                                                <div class="form-group">
                                                    <label class="text-label">Microcontrolar Type </label>
                                                    <div class="input-group transparent-append">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">  <i class="fa fa-microchip"></i></span>
                                                        </div>
                                                        <select   name="microcontroller_type"  class="form-control"  >
                                                            <option> select Microcontrollers</option>
                                                            @foreach($microcontrollers as $microcontroller)
                                                            <option value="{{ $microcontroller->id }}">{{ $microcontroller->name }}</option>
                                                            @endforeach

                                                        </select>

                                                    </div>

                                                    @if($errors->has('microcontroller_type'))
                                                        <span class="text-danger">
                                                        {{$errors->first('microcontroller_type')}}
                                                        </span>
                                                    @endif
                                                </div>


                                                <div class="form-group">
                                                    <label class="text-label">Worm Type </label>
                                                    <div class="input-group transparent-append">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">  <i class="fa fa-venus"></i></span>
                                                        </div>
                                                        <select   name="worm_type"  class="form-control"  >
                                                            @foreach($worms as $worm)
                                                            <option value="{{ $worm->id }}">{{ $worm->name }}</option>
                                                            @endforeach

                                                        </select>

                                                    </div>

                                                    @if($errors->has('worm_type'))
                                                        <span class="text-danger">
                                                        {{$errors->first('worm_type')}}
                                                        </span>
                                                    @endif
                                                </div>
                            </div>

                        </div>


                                                @include('livewire.dependent_dropdown')


                                                <div class="form-group row">

                                                    <div class="col-lg-8">
                                                        <input type="hidden" class="form-control" id="val-digits" name="member_id" value="{{$member}}" >
                                                    </div>



                                                </div>


                                                <div class="form-group row">

                                                    <div class="col-lg-8">
                                                        <input type="hidden" class="form-control" id="val-digits" name="cooperative_id" value="{{$cooperative_id}}" >
                                                    </div>



                                                </div>



                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Submit</button>

                                                        <a class="btn btn-primary" href="/bins">Cancel</a>
                                                    </div>
                                                </div>



                                            </div>



                                        </div>
                                    </form>
                                </div>


                    </div>

                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


@endsection
