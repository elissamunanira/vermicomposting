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
                                <h4 class="card-title">Update worm </h4>
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
                                    <form class="form-valide-with-icon" method="POST" action="/worms/{{$worm->id}}/update">
                                      @csrf
                                      @method('PUT')

                                            <div class="form-group">
                                                <label class="text-label"> WormName</label>
                                                <div class="input-group">

                                                    <input type="text" class="form-control" id="val-username1" name="name"  value="{{$worm->name}}" >

                                                </div>
                                                @if($errors->has('name'))
                                                <span class="text-danger">
                                                {{$errors->first('name')}}
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="text-label">Price</label>
                                                <div class="input-group">

                                                    <input type="text" class="form-control" id="val-username1" step="0.01" name="price" value="{{$worm->price}}">

                                                </div>
                                                @if($errors->has('price'))
                                                <span class="text-danger">
                                                {{$errors->first('price')}}
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group">

                                                <div class="input-group">

                                                    <input type="hidden" class="form-control" id="val-username1" name="cooperative_id" value="{{$cooperative_id}}">

                                                </div>
                                                @if($errors->has('cooperative_id'))
                                                <span class="text-danger">
                                                {{$errors->first('cooperative_id')}}
                                                </span>
                                                @endif
                                            </div>




                                            <div class="form-group">
                                                <label class="text-label">WormPopulation
                                                </label>
                                                <div class="input-group">

                                                    <input type="number" class="form-control" id="val-username1" name="population" value="{{$worm->population
                                                    }}">

                                                </div>
                                                @if($errors->has('population'))
                                                <span class="text-danger">
                                                    {{$errors->first('population')}}
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label class="text-label">Description of this Worm..*</label>
                                                <textarea name ="description" class="form-control" rows="4" id="comment"  >{{$worm->description}} </textarea>

                                                @if($errors->has('description'))
                                                <span class="text-danger">
                                                  {{$errors->first('description')}}
                                                </span>
                                                @endif
                                            </div>















                                        <button type="submit" class="btn  mr-2  btn-primary"> Submit </button>

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
