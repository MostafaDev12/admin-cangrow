@extends('layouts.master')
@section('title')
    @lang('translation.analytics')
@endsection
@section('css')

    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet">

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
            Analytics
        @endslot
    @endcomponent

    <div class="row">
         

        <div class="col-xxl-12">
            <div class="row h-100">
                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Live Users By Country</h4>
                             
                        </div><!-- end card header -->

                        <!-- card body -->
                        <div class="card-body">

                            <div id="users-by-countryy" data-colors='["--vz-light"]' class="text-center"
                                style="height: 252px"></div>

                            {{-- <div class="table-responsive table-card mt-3">
                                <table
                                    class="table table-borderless table-sm table-centered align-middle table-nowrap mb-1">
                                    <thead
                                        class="text-muted border-dashed border border-start-0 border-end-0 bg-light-subtle">
                                        <tr>
                                            <th>Duration (Secs)</th>
                                            <th style="width: 30%;">Sessions</th>
                                            <th style="width: 30%;">Views</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                         
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                        <!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Sessions by Countries</h4>
                            
                        </div>
                        <div class="card-body p-0">
                            <div>
                                <div id="countries_chartss"
                                    data-colors='["--vz-info", "--vz-info", "--vz-info", "--vz-info", "--vz-danger", "--vz-info", "--vz-info", "--vz-info", "--vz-info", "--vz-info"]'
                                    class="apex-charts" dir="ltr"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div> <!-- end col-->

            </div> <!-- end row-->
        </div><!-- end col -->
    </div> <!-- end row-->

   
    <div class="row">
        <div class="col-xl-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Users by Device</h4>
                    
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="user_device_pie_chartss" data-colors='["--vz-primary", "--vz-warning", "--vz-info"]'
                        class="apex-charts" dir="ltr"></div>
                
                    <div class="table-responsive mt-3">
                        <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                            <tbody class="border-0">
                                @foreach ($deviceData as $index => $device)
                                    <tr>
                                        <td>
                                            <h4 class="text-truncate fs-14 fs-medium mb-0">
                                                <i class="ri-stop-fill align-middle fs-18 me-2"
                                                   style="color: {{ ['#0d6efd', '#ffc107', '#0dcaf0'][$index] ?? '#adb5bd' }}"></i>
                                                {{ $device['name'] }}
                                            </h4>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>
                                                {{ number_format($device['count']) }}
                                            </p>
                                        </td>
                                        <td class="text-end">
                                            <p class="text-success fw-medium fs-13 mb-0">
                                                {{ $device['percentage'] }}%
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-6 col-md-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Top Referrals Pages</h4>
                     
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h6 class="text-muted text-uppercase fw-semibold text-truncate fs-13 mb-3">
                                Total Referrals Page</h6>
                            <h4 class="mb-0">{{ number_format($totalReferrals) }}</h4>
                        </div>
                        <div class="col-6">
                            <div class="text-center">
                                <img src="{{ URL::asset('build/images/illustrator-1.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                
                    <div class="mt-3 pt-2">
                        <div class="progress progress-lg rounded-pill">
                            @foreach($referralData as $index => $data)
                                <div class="progress-bar bg-{{ ['primary', 'info', 'success', 'warning', 'danger'][$index % 5] }}" 
                                     role="progressbar" 
                                     style="width: {{ $data['percentage'] }}%;" 
                                     aria-valuenow="{{ $data['percentage'] }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100"></div>
                            @endforeach
                        </div>
                    </div>
                
                    @php
                    $colors = ['#0d6efd', '#0dcaf0', '#198754', '#ffc107', '#dc3545', '#adb5bd'];
                @endphp
                
                <div class="mt-3 pt-2">
                    @foreach ($referralData as $data)
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <p class="text-truncate text-muted fs-15 mb-0">
                                    <i class="mdi mdi-circle align-middle me-2" style="color: {{ $colors[$loop->index] ?? '#adb5bd' }}"></i>
                                    {{ $data['referral'] }}
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <p class="mb-0">{{ $data['percentage'] }}%</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
                
            </div><!-- end card -->
        </div><!-- end col -->

        
    </div><!-- end row -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard-analytics.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>


   
<script>
    var countries = @json($countries);
    var sessions = @json($sessions);
    var barchartCountriesColors = getChartColorsArray("countries_chartss");

    if (barchartCountriesColors) {
        var options = {
            series: [{
                data: sessions,
                name: 'Sessions',
            }],
            chart: {
                type: 'bar',
                height: 436,
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    distributed: true,
                    dataLabels: { position: 'top' }
                }
            },
            colors: barchartCountriesColors,
            dataLabels: {
                enabled: true,
                offsetX: 32,
                style: {
                    fontSize: '12px',
                    fontWeight: 400,
                    colors: ['#adb5bd']
                }
            },
            legend: { show: false },
            grid: { show: false },
            xaxis: { categories: countries },
        };
        var chart = new ApexCharts(document.querySelector("#countries_chartss"), options);
        chart.render();
    }
</script> 


<script>
   
  
        var vectorMapWorldLineColors = getChartColorsArray("users-by-countryy");
        if (vectorMapWorldLineColors) {
            document.getElementById("users-by-countryy").innerHTML = "";
            var worldlinemap = new jsVectorMap({
                map: "world_merc",
                selector: "#users-by-countryy",
                zoomOnScroll: false,
                zoomButtons: false,
                markers: countries.map((country, index) => ({
                    name: country,
                    coords: getCountryCoords(country) // Function to retrieve country coordinates
                })),
                regionStyle: {
                    initial: {
                        stroke: "#9599ad",
                        strokeWidth: 0.25,
                        fill: vectorMapWorldLineColors,
                        fillOpacity: 1,
                    },
                },
                lineStyle: {
                    animation: true,
                    strokeDasharray: "6 3 6",
                },
            });
        }
     

    function getCountryCoords(country) {
        const coords = @json($coords);

    if (coords[country]) {
        return [parseFloat(coords[country].lat), parseFloat(coords[country].lon)];
    }

    return [0, 0]; // Fallback if no coordinates found
    }

   
</script>


<script>
    var dountchartUserDeviceColors = getChartColorsArray("user_device_pie_chartss");
    if (dountchartUserDeviceColors) {
        var options = {
            series: @json($deviceData->pluck('count')),
            labels: @json($deviceData->pluck('name')),
            chart: {
                type: "donut",
                height: 219,
            },
            plotOptions: {
                pie: {
                    size: 100,
                    donut: {
                        size: "76%",
                    },
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
                position: 'bottom',
                horizontalAlign: 'center',
                offsetX: 0,
                offsetY: 0,
                markers: {
                    width: 20,
                    height: 6,
                    radius: 2,
                },
                itemMargin: {
                    horizontal: 12,
                    vertical: 0
                },
            },
            stroke: {
                width: 0
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return value + " Users";
                    }
                },
                tickAmount: 4,
                min: 0
            },
            colors: dountchartUserDeviceColors,
        };
        var chart = new ApexCharts(document.querySelector("#user_device_pie_chartss"), options);
        chart.render();
    }
</script>

@endsection
