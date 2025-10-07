@extends('Dashboard.master')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <h4>BinNumber</h4>
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$bin->number}}</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create condition</h4>
                </div>
                <div class="card-body">


                    {{-- @if(auth()->bin()->id == $bin->id) --}}
                    <form method="POST" action="{{url('/create_cond')}}">
                        @csrf

                        <div class="row mb-3">


                            <div class="col-md-6">
                                <input id="bin_id" type="hidden" class="form-control @error('bin_id') is-invalid @enderror" name="bin_id" value="{{$bin->id}}" required autocomplete="bin_id" autofocus>

                        </div>

                    </div>
                    <div class="card-body">
                       
                              <div class="form-group">
                                <label class="text-label">Temperature</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa-solid fa-temperature-half"></i><i class="fa-solid fa-temperature-half"></i> </span>
                                    </div>
                                    <input type="number" class="form-control" id="val-username1" name="temperature" placeholder="Enter temperature..">

                                </div>
                                @if($errors->has('temperature'))
                                <span class="text-danger">
                                  {{$errors->first('temperature')}}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                              <label class="text-label">Humidity</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">  </span>
                                  </div>
                                  <input type="text" class="form-control" id="val-username1" name="humidity" placeholder="Enter Hummidity">

                              </div>
                              @if($errors->has('humidity'))
                              <span class="text-danger">
                                {{$errors->first('humidity')}}
                              </span>
                              @endif
                          </div>




                          <div class="form-group">
                            <label for="acidity" class="col-md-4 col-form-label text-md-end">{{ __('Acidity-PH') }}</label>

                            <div class="col-md-6">
                                <input id="acidity" type="number" class="form-control @error('acidity') is-invalid @enderror" name="acidity" required autocomplete="new-acidity">


                                @error('acidity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-6">
                                <input id="acidity" type="hidden" class="form-control @error('acidity') is-invalid @enderror" name="bin_id"   value={{$bin->id}} autocomplete="new-acidity">



                            </div>
                        </div>

                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn  mr-2 btn-primary" >
                                    {{ __('Add Conditions') }}
                                </button>
                            </div>
                        </div>



                            </form>







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
