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
                                <h4 class="card-title">+ Microcontroller </h4>
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
                                    <form class="form-valide-with-icon" method="POST" action="{{url('/microcontrollers/storecontroller')}}">
                                      @csrf

                                            <div class="form-group">
                                                <label class="text-label">Name/model number</label>
                                                <div class="input-group">

                                                    <input type="text" class="form-control" id="val-username1" name="name" >

                                                </div>
                                                @if($errors->has('name'))
                                                <span class="text-danger">
                                                {{$errors->first('name')}}
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label class="text-label">Manufacture</label>
                                                <div class="input-group">

                                                    <input type="text" class="form-control" id="val-username1" name="manufacturer" >

                                                </div>
                                                @if($errors->has('manufacturer'))
                                                <span class="text-danger">
                                                {{$errors->first('manufacturer')}}
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
                                                <label class="text-label">Architecture</label>
                                                <div class="input-group">

                                                    <input type="text" class="form-control"  name="architecture" >

                                                </div>
                                                @if($errors->has('architecture'))
                                                <span class="text-danger">
                                                {{$errors->first('architecture')}}
                                                </span>
                                                @endif
                                            </div>






                                        <div class="form-group">
                                            <label class="text-label">ClockSpeed</label>
                                            <div class="input-group">

                                                <input type="number" class="form-control" id="val-username1" name="clock_speed" >

                                            </div>
                                            @if($errors->has('clock_speed'))
                                            <span class="text-danger">
                                            {{$errors->first('clock_speed')}}
                                            </span>
                                            @endif
                                            </div>



                                        <div class="form-group">
                                            <label class="text-label">FlashMemorySize</label>
                                            <div class="input-group">

                                                <input type="number" class="form-control" id="val-username1" name="flash_memory_size" >

                                            </div>
                                            @if($errors->has('flash_memory_size'))
                                            <span class="text-danger">
                                            {{$errors->first('flash_memory_size')}}
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="text-label">RamSize</label>
                                            <div class="input-group">

                                                <input type="number" class="form-control" id="val-username1" name="ram_size" >

                                            </div>
                                            @if($errors->has('ram_size'))
                                            <span class="text-danger">
                                                {{$errors->first('ram_size')}}
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="text-label">PinCount</label>
                                            <div class="input-group">

                                                <input type="number" class="form-control" id="val-username1" name="pin_count" >

                                            </div>
                                            @if($errors->has('pin_count'))
                                            <span class="text-danger">
                                            {{$errors->first('pin_count')}}
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="text-label">Price</label>
                                            <div class="input-group">

                                                <input type="number" class="form-control" id="val-username1" name="price" >

                                            </div>
                                            @if($errors->has('price'))
                                            <span class="text-danger">
                                            {{$errors->first('price')}}
                                            </span>
                                            @endif
                                        </div>



                                        <div class="form-group">
                                            <label class="text-label">stockNumber</label>
                                            <div class="input-group">

                                                <input type="number" class="form-control" id="val-username1" name="stock" >

                                            </div>
                                            @if($errors->has('stock'))
                                            <span class="text-danger">
                                            {{$errors->first('stock')}}
                                            </span>
                                            @endif
                                        </div>














                                        <button type="submit" class="btn btn-primary"> Submit </button>
                                    {{-- <button type="submit" class="btn mr-2 btn-primary">Submit</button> --}}

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
