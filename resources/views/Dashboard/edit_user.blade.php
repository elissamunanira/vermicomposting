
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
                                <h4 class="card-title">Edit User</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if (Session::get('success'))

                                    <div class="alert alert-success">
                                        {{Session::get('success')}}

                                        @php
                                            Session::forget('success')
                                        @endphp
                                    </div>

                                    @endif
                 <form class="form-valide-with-icon" method="POST" action="/users/{{$user->id}}/update">
                                      @csrf
                                      @method('PUT')
                                      </div>
                                      <div class="form-group">
                                        <label class="text-label">Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="val-username1" name="name" value="{{$user->name}}">
                                        </div>
                                        @if ($errors->has('name'))

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
                                          <input type="email" class="form-control" id="val-username1" name="email" value="{{$user->email}}">
                                      </div>

                                      @if ($errors->has('email'))

                                      <span class="text-danger">


                                      {{$errors->first('email')}}
                                      </span>

                                      @endif
                                  </div>

                                  <div class="form-group">
                                    <strong>Role:</strong>

                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

                                    @if ($errors->has('Roles'))

                                    <span class="text-danger">


                                    {{$errors->first('Roles')}}
                                    </span>

                                    @endif
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
