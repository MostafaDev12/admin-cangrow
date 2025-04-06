
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.analytics'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboards
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Analytics
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

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
                                <?php $__currentLoopData = $deviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <h4 class="text-truncate fs-14 fs-medium mb-0">
                                                <i class="ri-stop-fill align-middle fs-18 me-2"
                                                   style="color: <?php echo e(['#0d6efd', '#ffc107', '#0dcaf0'][$index] ?? '#adb5bd'); ?>"></i>
                                                <?php echo e($device['name']); ?>

                                            </h4>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>
                                                <?php echo e(number_format($device['count'])); ?>

                                            </p>
                                        </td>
                                        <td class="text-end">
                                            <p class="text-success fw-medium fs-13 mb-0">
                                                <?php echo e($device['percentage']); ?>%
                                            </p>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <h4 class="mb-0"><?php echo e(number_format($totalReferrals)); ?></h4>
                        </div>
                        <div class="col-6">
                            <div class="text-center">
                                <img src="<?php echo e(URL::asset('build/images/illustrator-1.png')); ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                
                    <div class="mt-3 pt-2">
                        <div class="progress progress-lg rounded-pill">
                            <?php $__currentLoopData = $referralData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="progress-bar bg-<?php echo e(['primary', 'info', 'success', 'warning', 'danger'][$index % 5]); ?>" 
                                     role="progressbar" 
                                     style="width: <?php echo e($data['percentage']); ?>%;" 
                                     aria-valuenow="<?php echo e($data['percentage']); ?>" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                
                    <?php
                    $colors = ['#0d6efd', '#0dcaf0', '#198754', '#ffc107', '#dc3545', '#adb5bd'];
                ?>
                
                <div class="mt-3 pt-2">
                    <?php $__currentLoopData = $referralData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <p class="text-truncate text-muted fs-15 mb-0">
                                    <i class="mdi mdi-circle align-middle me-2" style="color: <?php echo e($colors[$loop->index] ?? '#adb5bd'); ?>"></i>
                                    <?php echo e($data['referral']); ?>

                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <p class="mb-0"><?php echo e($data['percentage']); ?>%</p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                </div>
                
            </div><!-- end card -->
        </div><!-- end col -->

        
    </div><!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jsvectormap/maps/world-merc.js')); ?>"></script>

    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard-analytics.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>


   
<script>
    var countries = <?php echo json_encode($countries, 15, 512) ?>;
    var sessions = <?php echo json_encode($sessions, 15, 512) ?>;
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
        const coords = <?php echo json_encode($coords, 15, 512) ?>;

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
            series: <?php echo json_encode($deviceData->pluck('count'), 15, 512) ?>,
            labels: <?php echo json_encode($deviceData->pluck('name'), 15, 512) ?>,
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>