

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
                              <h4 class="card-title text-label">Create Co-operativeMember</h4>
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


                        <form action="/cooperatives_membe/post" method="POST">
                            @csrf
                            <div class="form-group">

                                <div class="col-sm-12">
                                            <label class="text-label"> First Name</label>
                                    <div class="col-lg-12">
                                            <input type="text" name="firstname" class="form-control">

                                    </div>
                                            @if($errors->has('firstname'))
                                            <span class="text-danger">
                                            {{$errors->first('firstname')}}
                                            </span>
                                            @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="text-label"> Second Name</label>
                                    <div class="col-lg-12">
                                    <input type="text" name="secondname" class="form-control">
                                    @if($errors->has('secondname'))
                                    <span class="text-danger">
                                    {{$errors->first('secondname')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="text-label"> Email</label>
                                    <div class="col-lg-12">
                                    <input type="email" name="email" class="form-control">
                                    </div>
                                    </div>
                                    @if($errors->has('email'))
                                    <span class="text-danger">
                                    {{$errors->first('email')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="col-sm-12">
                                    <label class="text-label">PhoneNumber</label>
                                    <div class="input-group col-lg-12">
                                        <input type="number" name="phonenumber" class="form-control">
                                    </div>
                                        @if($errors->has('phonenumber'))
                                        <span class="text-danger">
                                        {{$errors->first('phonenumber')}}
                                        </span>
                                        @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="text-label">date-of-birth</label>
                                    <div class="input-group col-lg-12">

                                        <input type="date" class="form-control" id="val-username1" name="age">

                                    </div>
                                    @if($errors->has('age'))
                                    <span class="text-danger">
                                    {{$errors->first('age')}}
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group mb-0">
                                <div class="col-sm-12">
                                        <label for="Gender">Gender  :</label>
                                        <label class="radio-inline mr-3">

                                            <input type="radio" name="gender" value="Male">Male</label>

                                        <label class="radio-inline mr-3"><input type="radio" name="gender"  value="Female">Female</label>

                                        <label class="radio-inline mr-3"><input type="radio" name="gender" value="other">other</label>


                                        @if($errors->has('gender'))
                                            <span class="text-danger">
                                            {{$errors->first('gender')}}
                                            </span>
                                        @endif
                                </div>

                            </div>



                            @include('livewire.dependent_dropdown')
                            <div class="form-group">
                                <button type="submit" class="btn mr-2 btn-primary">Submit</button>
                            </div>
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






