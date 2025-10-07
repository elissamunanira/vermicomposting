@extends('Dashboard.master')


@section('content')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
          <div class="container-fluid">

              <!-- row -->
              <div class="row">

                  <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Create User</h4>
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
                                  <form class="form-valide-with-icon" method="POST" action="{{url('/users/store')}}">
                                    @csrf


                                    </div>
                                    <div class="form-group">
                                      <label class="text-label">Name</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                          </div>
                                          <input type="text" class="form-control" id="val-username1" name="name" placeholder="Enter a Name..">

                                      </div>
                                      @if($errors->has('name'))
                                      <span class="text-danger">
                                        {{$errors->first('name')}}
                                      </span>
                                      @endif
                                  </div>
                                  <div class="form-group">
                                    <label class="text-label">email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope" aria-hidden="true"></i> </span>
                                        </div>
                                        <input type="email" class="form-control" id="val-username1" name="email" placeholder="Enter Email">

                                    </div>
                                    @if($errors->has('email'))
                                    <span class="text-danger">
                                      {{$errors->first('email')}}
                                    </span>
                                    @endif
                                </div>



                                <div class="form-group">
                                  <label class="text-label">Password *</label>
                                  <div class="input-group transparent-append">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                      </div>
                                      <input type="password" class="form-control" id="val-password1" name="password" placeholder="Choose a safe one..">

                                      <div class="input-group-append show-pass">
                                          <span class="input-group-text"> <i class="fa fa-eye-slash"></i>
                                          </span>
                                      </div>
                                      @if($errors->has('password'))
                                      <span class="text-danger">
                                        {{$errors->first('password')}}
                                      </span>
                                      @endif
                                  </div>
                              </div>



                              <div class="form-group">
                                <label class="text-label">Password confirimation*</label>
                                <div class="input-group transparent-append">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input type="password" class="form-control" id="val-password1" name="password_confirmation" placeholder="Choose a safe one..">

                                    <div class="input-group-append show-pass">
                                        <span class="input-group-text"> <i class="fa fa-eye-slash"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('password_confirmation'))
                                    <span class="text-danger">
                                      {{$errors->first('password_confirmation')}}
                                    </span>
                                    @endif
                                </div>
                            </div>


                          <div class="form-group">
                              <div class="form-group">
                                <strong>Role:</strong>
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

                                {{-- <select class="form-control" style="height:46px;" name="role" required>
                                    <option disable selected>{{ __('msg.--Select role--')}}</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name}}</option>
                                    @endforeach
                          </select> --}}
                            </div>
                          </div>

                            <button type="submit" class="btn mr-2 btn-primary">Submit</button>

                                  </form>
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
