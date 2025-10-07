@extends('Dashboard.master')
@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>Bin</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Number</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">{{$bin->code}}</a></li>
					</ol>

                </div>
                <!-- row -->



              <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">About Bin</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Bin Conditions</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link"> Vermicomposting Process</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">



                                        <div class="profile-uoloaded-post pb-3">


                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary">About Bin  {{$bin->code}} </h4>
                                                    <p class="mb-2">
                                                     {{$bin->description}}

                                                    </p>

                                                </div>
                                            </div>

                                            <div class="profile-skills mb-5">
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">BinNumber<span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{$bin->code}}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">BinMicrocontrollerType<span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{$bin->microcontroller_type}}</span>
                                                    </div>
                                                </div>


                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">BinWormType<span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{$bin->worm_type}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                                <h1>Bin Chat</h1>
                                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                                <script type="text/javascript">
                                                  google.charts.load('current', {'packages':['corechart']});
                                                  google.charts.setOnLoadCallback(drawChart);
                                            
                                                  function drawChart() {
                                                    var data = google.visualization.arrayToDataTable([
                                                      ['Year', 'Sales', 'Expenses'],
                                                      ['2004',  1000,      400],
                                                      ['2005',  1170,      460],
                                                      ['2006',  660,       1120],
                                                      ['2007',  1030,      540]
                                                    ]);
                                            
                                                    var options = {
                                                      title: 'Company Performance',
                                                      curveType: 'function',
                                                      legend: { position: 'bottom' }
                                                    };
                                            
                                                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                                            
                                                    chart.draw(data, options);
                                                  }
                                                </script>
                                              </head>
                                              <body>
                                                <div id="curve_chart" style="width: 900px; height: 500px"></div>
                                              </body>
                                        </div>
                                    </div>
                                </div>
                                <div id="about-me" class="tab-pane fade">

                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4">binConditions</h4>
                                           <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-sm mb-0 table-responsive-lg text-black" id="bins">
                                                            <thead>
                                                                <tr>
                            
                                                                    <th class="align-middle pr-7"> No
                                                                    </th>
        
                                                                    <th class="align-middle pr-7"> Time
                                                                    </th>
                            
                                                                    <th class="align-middle pr-7"> Temperature
                                                                    </th>
                                                                    <th class="align-middle pr-7"> Humidity</th>
                                                                    <th class="align-middle minw200">Soil Moisture</th>
                            
                                                                    <th class="align-middle minw200">pH value/acidity</th>
                            
                                                                </tr>
                                                            </thead>
                                                            <tbody id="orders">
                                                                

                                                                 @if(!empty($conditions))
                                                                 @foreach ($conditions as $condition) 
                                                                     
                                                                                                                                                        <tr class="btn-reveal-trigger">
                                                                                                        
                                                                                                                                                            <td class="py-2">
                                                                                                                                                                <div> {{$i++}}</div>
                                                                                                                                                            </td>

                                                                                                                                                            <td class="py-2">
                                                                                                                                                                <div> {{$condition->created_at}}</div>
                                                                                                                                                            </td>
                                                                                                                                                            <td class="py-2">
                                                                                                                                                                <div>
                                                                                                                                                        {{$condition->temperature}} ℃</div>
                                                                                                                                                            </td>
                                                                                                                                                            <td class="py-2">
                                                                                                                                                                {{$condition->humidity}} %
                                                                                                                                                            </td>
                                                                                                        
                                                                                                                                                            <td class="py-2">
                                                                                                            
                                                                                                            
                                                                                                                                                                <div> {{$condition->soil_moisture}} %</div>
                                                                                                                                                            </td>
                                                                                                                                                            <td class="py-2">
                                                                                                            
                                                                                                            
                                                                                                                                                                <div> {{$condition->acidity}}</div>
                                                                                                                                                            </td>
                                                                                                                                                            @endforeach
                                                                                                                                                        @endif
                                                                                                            
                                                                                                                                                        </tr>
                                                            </tbody>
                                                        </table>
                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="profile-personal-info">
                                            <h4 class="text-primary mb-4">Compost</h4>



                                                @if($plantingstatus==1)

                                                <div class="mt-4">

                                                    <a href="/planting/{{$bin->id}}" class="btn btn-primary mb-1">start Composting</a>
                                                </div>

                                                {{-- @elseif(empty($plantingstatus)) --}}


                                                @else

                                                    <h3>This Bin Number {{$bin->number}}  is in vermicomposting prossess</h3>

                                                    <div class="mt-4">

                                                        <a href="/harvesting/{{$bin->id}}/create" class="btn btn-primary mb-1">Harvest Compost</a>
                                                    </div>

                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            

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
