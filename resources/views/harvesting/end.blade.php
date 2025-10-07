@extends('Dashboard.master')

@section('content')


<div class="content-body">
    <div class="container-fluid">
<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Enter Harvested Compost Data</h4>
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
                <form action="/harvesting/{{$bin->id}}/post" method="POST">

                    @csrf

                    <div class="form-row">
                        <div class="col-sm-12">
                            <input type="text" name="wormQuantity" class="form-control" placeholder="wormQuantity(kg) after Harvesting">

                            @if ($errors->has('wormQuantity'))

                            <span class="text-danger">


                            {{$errors->first('wormQuantity')}}
                            </span>

                            @endif
                        </div>

                        <div class="col-sm-12">
                            <input type="text" name="harvestCompostQuantity" class="form-control" placeholder="HarvestedCompostQuantity(kg)">
                            @if ($errors->has('harvestCompostQuantity'))

                            <span class="text-danger">


                            {{$errors->first('harvestCompostQuantity')}}
                            </span>

                            @endif
                        </div>

                    </div>
                    <button type="submit" class="btn mr-6 btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
