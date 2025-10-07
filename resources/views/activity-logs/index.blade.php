@extends('Dashboard/DashBoard')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="card-header">
                <h4 class="card-title"> User's activity</h4>
            </div>

            @foreach($formattedLogs as $activityLog)
                <p> User {{$activityLog['user']}} as {{$activityLog['role']}}  {{ $activityLog['activity'] }}  {{$activityLog['subject']}}

                    {{$activityLog['timestamp']}}  </p>
            @endforeach

        </div>
    </div>
@endsection
