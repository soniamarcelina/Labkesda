<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-align: center text-valign:center ">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                                Active Magang/KPTA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">107</div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase text-center">
                                Upcoming Magang/KPTA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">15</div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

           <!-- Earnings (Annual) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                                Inactive Magang/KPTA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">15</div>
                        </div>
                        <hr>
                    </div>
                        <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                                Cancel</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">1</div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                                Undefined</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">4</div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                                Done</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">317</div>
                        </div>
                        </div>
                        
                </div>
            </div>
        </div>

       <!-- Earnings (Annual) Card Example -->
       

        <!-- Tasks Card Example -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1 text-center">Total Data Magang
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-center">444</div>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">
                                Total Uang Saku Tahun 2023</div>
                            <div class="h5 mb-0 font-weight-bold text-danger text-center">Rp. 629.802.338</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Charts</h1>
    <p class="mb-4"></p>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expenses</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manpower Demography</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Filled Position</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>


        <!-- Donut Chart -->
        
         <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My Team</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <a class="dropdown-item align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Emily Fowler</div>
                                <div class="small text-gray-500">Assoc. Analyst HCBP - Contract Until 31 Feb 2023</div>
                            </div>
                        </a>
                        <a class="dropdown-item align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate font-weight-bold">Jae Chun</div>
                                <div class="small text-gray-500">Assoc Analyst TPM - Contract Until 1 Dec 2023</div>
                            </div>
                        </a>
                    <hr>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url()?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url()?>assets/js/demo/chart-pie-demo.js"></script>
<script src="<?php echo base_url()?>assets/js/demo/chart-bar-demo.js"></script>