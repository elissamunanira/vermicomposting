
@extends('Dashboard.master')

@section('content')

		<!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
            <!-- row -->
		<div class="container-fluid">
            <!-- heading -->
			<div class="form-head d-flex align-items-center mb-sm-4 mb-3"> 
				<div class="mr-auto">
					<h2 class="text-black font-w600">Vermicomposting</h2>
					<p class="mb-0">{{$auth_user_role}} Dashboard</p>
				</div>
                <!-- for cooperative dashboard -->
                @if ($cooperativeInfo)

                <div class="mr-auto">
					<p class="mb-0">{{$cooperativeInfo->co_operativename}} Cooperative

                    </p>
				</div>
                @endif

			</div>
            <!-- end of -->

            <!-- admin dashboard -->
            <!-- first row -->
            @role('Admin')
			<div class="row">
                
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body mr-3">
                                        <h2 class="fs-34 text-black font-w600">{{$inactive_managers}}
                                        </h2>
                                        <span>InActive Managers </span>
                                    </div>
                                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="progress  rounded-0" style="height:4px;">
                                <div class="progress-bar rounded-0 bg-secondary progress-animated" style="width: 50%; height:4px;" role="progressbar">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body mr-3">
                                        <h2 class="fs-34 text-black font-w600">{{$active_managers}}</h2>
                                        <span>Active Managers</span>
                                    </div>
                                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                        <i class="fa fa-user"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="progress  rounded-0" style="height:4px;">
                                <div class="progress-bar rounded-0 bg-secondary progress-animated" style="width: 50%; height:4px;" role="progressbar">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
                            
                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                    <a href="/managers">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body  p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="la la-users"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Total Managers Acount</p>
                                        <h3 class="text-white">{{$managers}}</h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                       
                   
                    <div class="col-xl-3  col-sm-6">
                        <a href="/vermusers">
                
                            <div class="widget-stat card bg-primary">
                            <div class="card-body  p-4">
                                <div class="media">
                                    <span class="mr-3">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Total users Account</p>
                                        <h3 class="text-white">{{$count}}</h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
               
            </div>	
            
             <!--end of  first row -->
            <!--  second row -->
            <div class="row">
                
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body mr-3">
                                        <h2 class="fs-34 text-black font-w600">     {{$inactive_cooperatives}}
                                           
                                        </h2>
                                            <span>Inactive Cooperative Acounts</span>
                                    </div>
                                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                            <i class="fa fa-user"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="progress  rounded-0" style="height:4px;">
                                <div class="progress-bar rounded-0 bg-secondary progress-animated" style="width: 50%; height:4px;" role="progressbar">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-34 text-black font-w600">{{$inactive_cooperatives}}</h2>
                                            <span>Inactive Cooperative Acounts</span>
                                        </div>
                                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">

                                        <i class="fa fa-user"></i>
                                        </a>
                                    </div>
                            </div>
                            <div class="progress  rounded-0" style="height:4px;">
                                    <div class="progress-bar rounded-0 bg-secondary progress-animated" style="width: 50%; height:4px;" role="progressbar">
                                        <span class="sr-only">50% Complete</span>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body mr-3">
                                        <h2 class="fs-34 text-black font-w600">{{$active_cooperatives}}</h2>
                                        <span>Active Cooperative Acounts</span>
                                    </div>
                                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                        <i class="fa fa-user"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="progress  rounded-0" style="height:4px;">
                                <div class="progress-bar rounded-0 bg-secondary progress-animated" style="width: 50%; height:4px;" role="progressbar">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3  col-sm-6">
                        <a href="/cooperatives">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-34 text-black font-w600">{{ $inactive_users}}</h2>
                                            <span> Inactive users Acount</span>
                                        </div>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="progress  rounded-0" style="height:4px;">
                                    <div class="progress-bar rounded-0 bg-secondary progress-animated" style="width: 30%; height:4px;" role="progressbar">
                                        <span class="sr-only">30% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
               
            </div>
            <div class="row">
                <div class="col-xl-6  col-sm-8">
                    <canvas id="users" style="width:100%;max-width:600px"></canvas>
                </div>
                <div class="col-xl-4  col-sm-4">
                    <canvas id="cooperatives" style="width:100%;max-width:600px"></canvas>
                </div>
               
            </div>
                    <script>
                    const xValues = ["male", "Female"];
                    const yValues = [{!! json_encode($male_users) !!}, {!! json_encode($female_users) !!}, 0];
                    const barColors = ["orange","darkgreen"];

                    new Chart("users", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                        }]
                    },
                    options: {
                        legend: {display: false},
                        title: {
                        display: true,
                        text: "users"
                        }
                    }
                    });
                    </script>



                    

                    <script>
                        const xValuesDoughnut = ["North", "Sourth", "East", "West", "Kigali City"];
                        const yValuesDoughnut = [{!! json_encode($north_cooperatives) !!}, {!! json_encode($sourth_cooperatives) !!}, {!! json_encode($east_cooperatives) !!}, {!! json_encode($west_cooperatives) !!}, {!! json_encode($kigali_cooperatives) !!}];
                        const barColorsDoughnut = [
                        "#b91d47",
                        "#00aba9",
                        "#2b5797",
                        "#e8c3b9",
                        "#1e7145"
                        ];

                        new Chart("cooperatives", {
                        type: "doughnut",
                        data: {
                            labels: xValuesDoughnut,
                            datasets: [{
                            backgroundColor: barColorsDoughnut,
                            data: yValuesDoughnut
                            }]
                        },
                        options: {
                            title: {
                            display: true,
                            text: "Cooperatives"
                            }
                        }
                        });
                    </script>
            @endrole	   
            <!--end of  second row -->
                   
            <!-- dashboard for cooperative  -->
            
   

            @role('Manager')
            <!-- first row -->
                <div class="row">
                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body  p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="la la-users"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Total Members</p>
                                        <h3 class="text-white">{{$total_members}}</h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-warning">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="la la-box"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Total Bins</p>
                                        <h3 class="text-white">{{$total_bins}}</h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-secondary">
                            <div class="card-body p-4">
                                <div class="media">

                                    <span class="mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 96c0-53 43-96 96-96h38.4C439.9 0 480 40.1 480 89.6V176v16V376c0 75.1-60.9 136-136 136s-136-60.9-136-136V296c0-22.1-17.9-40-40-40s-40 17.9-40 40V464c0 26.5-21.5 48-48 48s-48-21.5-48-48V296c0-75.1 60.9-136 136-136s136 60.9 136 136v80c0 22.1 17.9 40 40 40s40-17.9 40-40V192H352c-53 0-96-43-96-96zm144-8a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/></svg>

                                    </span>

                                    <div class="media-body text-white">
                                        <p class="mb-1"> Bins that haven't started vermicomposting proccess</p>
                                        <h3 class="text-white">{{$no_verm_procces}}</h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-danger ">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 96c0-53 43-96 96-96h38.4C439.9 0 480 40.1 480 89.6V176v16V376c0 75.1-60.9 136-136 136s-136-60.9-136-136V296c0-22.1-17.9-40-40-40s-40 17.9-40 40V464c0 26.5-21.5 48-48 48s-48-21.5-48-48V296c0-75.1 60.9-136 136-136s136 60.9 136 136v80c0 22.1 17.9 40 40 40s40-17.9 40-40V192H352c-53 0-96-43-96-96zm144-8a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/></svg>

                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Bins in Vermicomposting Proccess</p>
                                        <h3 class="text-white">
                                         {{$verm_proccess}} </h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--end first row -->
            <!-- second row -->
                <div class="row">
                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <h4 class="card-title">Total worms Type</h4>
                                <h3>{{$worm}}</h3>
                                {{-- <div class="progress mb-2">
                                    @php
                                    $previousCount = 0;
                                    $monthlyIncrease = 0;

                                    foreach ($wormsByMonth as $month => $count) {
                                        if ($previousCount > 0) {
                                            $monthlyIncrease = round(($count - $previousCount) / $previousCount * 100);


                                        }
                                        $previousCount = $count;
                                    }
                                @endphp
                                    <div class="progress-bar progress-animated bg-primary" style="width:{{ $monthlyIncrease }}"></div>
                                </div> --}}


                                {{-- <small>{{ $monthlyIncrease }}% Increase per month</small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                        <div class=" widget-stat card bg-secondary">
                            <div class="card-body p-4">
                                <h4 class="card-title">Total Microcontrollars Types </h4>
                                    <h3>{{$microcontrollers}}</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                 <h4 class="card-title">Total Active Bin </h4>
                                 <h3>{{$active_bins}}</h3>



                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-danger">
                            <div class="card-body p-4">
                                <h4 class="card-title">Total In Active Bin</h4>
                                <h3>{{$inactive_bins}}</h3>
                            </div>
                        </div>
                    </div>

			    </div>
            <!-- end of the second row -->
            
            <!-- charts -->
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Gender Bar Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart1" style="width:100%;max-width:600px;height:400px">
                                        </canvas>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
                                        <script>
                                            var xValues = {!! json_encode($months) !!};
                                            var yValues = {!! json_encode($monthCount) !!};
                                            var xValuesf = {!! json_encode($monthsf) !!};
                                            var yValuesf = {!! json_encode($monthCountf) !!};

                                            var ctx = document.getElementById("myChart1").getContext("2d");
                                            var myChart1 = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: xValues,
                                                    datasets: [{
                                                        label: 'Male',
                                                        backgroundColor: '#ffa500',
                                                        data: yValues,
                                                    }, {
                                                        label: 'Female',
                                                        backgroundColor: '#e7440b',
                                                        data: yValuesf,
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    legend: {
                                                        display: true,
                                                        position: 'bottom',
                                                    },
                                                    title: {
                                                        display: true,
                                                        text: 'Cooperative Member Gender Chart'
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Members age chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart" style="width:100%;max-width:600px;height:400px"></canvas>

                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
                                        <script>
                                            var xValues = ['18-20', '21-25', '26-30', '31-35', '36-40', '41-45', '46-50', '51-55', '56-60'];
                                            var yValues = <?php echo json_encode(array_count_values($Age)); ?>;

                                            var ctx = document.getElementById("myChart").getContext("2d");
                                            var myChart = new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: xValues,
                                                    datasets: [{
                                                        label: '',
                                                        fill: false,
                                                        lineTension: 0,
                                                        backgroundColor: "rgba(0,0,255,1.0)",
                                                        borderColor: "rgba(0,0,255,0.1)",
                                                        data: Object.values(yValues)
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    title: {
                                                        display: true,
                                                        text: 'Age Chart'
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">worm population chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart3" style="width:100%;max-width:700px"></canvas>

                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


                                        <script>
                                            new Chart("myChart3", {
                                                type: "scatter",
                                                data: {
                                                    datasets: [{
                                                        pointRadius: 4,
                                                        pointBackgroundColor: "rgb(0,0,255)",
                                                        data: <?php echo json_encode($data); ?>
                                                    }]
                                                },
                                                options: {
                                                    legend: { display: false },
                                                    scales: {
                                                        xAxes: [{ ticks: { min: 40, max: 160 } }],
                                                        yAxes: [{ ticks: { min: 0 } }]
                                                    }
                                                }
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Worms conditions chart</h4>
                                    </div>
                                        <div class="card-body">
                                            <canvas id="myChart4" style="width:100%;max-width:600px"></canvas>

                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

                                                <script>
                                                    const xValues = [100,200,300,400,500,600,700,800,900,1000];

                                                    new Chart("myChart", {
                                                    type: "line",
                                                    data: {
                                                        labels: xValues,
                                                        datasets: [{
                                                        data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
                                                        borderColor: "red",
                                                        fill: false
                                                        }, {
                                                        data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
                                                        borderColor: "green",
                                                        fill: false
                                                        }, {
                                                        data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
                                                        borderColor: "blue",
                                                        fill: false
                                                        }]
                                                    },
                                                    options: {
                                                        legend: {display: false}
                                                    }
                                                    });
                                                </script>


                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            @endrole
        </div>
    </div>























 















        <!--**********************************
            Content body end
        ***********************************-->

@endsection
