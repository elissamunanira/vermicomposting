@extends('Dashboard.master')
@section('content')


<div class="content-body">
    <div class="container-fluid">
<div class="row">
<div class="col-xl-12 col-xxl-6 col-lg-6">
    <div class="card">
        <div class="card-header  border-0 pb-0">
            <h4 class="card-title">binNotification</h4>
        </div>
        <div class="card-body">
            <div id="DZ_W_Todo1" class="widget-media dz-scroll height370">
                <ul class="timeline">




                    @foreach($notifications as $notification)
                    <div class="media-body alert alert-light">
                        <h4 class="mb-1 alert alert-primary">BinNumber {{$notification->data['bin_number']}}</h4>
                        <h5 class="mb-1">
                            @if ($notification->data['pre_temperature'] !== $notification->data['temperature'])
                                temperature changed form {{$notification->data['pre_temperature']}}  &#176;C to {{$notification->data['temperature']}} &#176;C
                                @if ($notification->data['temperature'] < $acceptable_temperatures['min'] || $notification->data['temperature'] > $acceptable_temperatures['max'])
                                    <span style="color: red;">Critical condition:</span>
                                    <span style="color: red;">{{$notification->data['temperature']}} &#176;C is outside the range of {{$acceptable_temperatures['min']}} &#176;C to {{$acceptable_temperatures['max']}} &#176;C</span>
                                @endif
                            @endif

                            @if ($notification->data['pre_acidity'] !== $notification->data['acidity'])
                                acitidy changed form {{$notification->data['pre_acidity']}} pH to {{$notification->data['acidity']}} pH
                                @if ($notification->data['acidity'] < $acceptable_acidity['min'] || $notification->data['acidity'] > $acceptable_acidity['max'])
                                    <span style="color: red;">Critical condition:</span>
                                    <span style="color: red;">{{$notification->data['acidity']}} pH is outside the range of {{$acceptable_acidity['min']}} pH to {{$acceptable_acidity['max']}} pH</span>
                                @endif
                            @endif

                            @if ($notification->data['pre_humidity'] !== $notification->data['humidity'])
                                Humidity changed form {{$notification->data['pre_humidity']}} mm to {{$notification->data['humidity']}} mm
                                @if ($notification->data['humidity'] < $acceptable_humidity['min'] || $notification->data['humidity'] > $acceptable_humidity['max'])
                                    <span style="color: red;">Critical condition:</span>
                                    <span style="color: red;">{{$notification->data['humidity']}} mm is outside the range of {{$acceptable_humidity['min']}} mm to {{$acceptable_humidity['max']}} mm</span>
                                @endif
                            @endif
                        </h5>
                        <small class="d-block">{{ $notification->created_at }}</small>
                    </div>
                @endforeach

                @if(count($out_of_range_conditions) > 0)
                    <div class="media-body alert alert-danger">
                        <h4 class="mb-1 alert alert-danger">Critical Conditions</h4>
                        <ul>
                            <div>

                                @foreach($out_of_range_conditions as $condition)
                                    <li>{{$condition}}</li>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                @endif




                </ul>
            </div>
        </div>
    </div>
</div>







@endsection

