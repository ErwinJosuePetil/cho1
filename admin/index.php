<?php
include('includes/header.php');
include('includes/navbar.php');
include('db.php');
?>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

            
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                        <img class="img-profile rounded-circle"
                            src="img/undraw_profile.svg">
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar

        <!-- Begin Page Content -->
        <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="generate_report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-file-alt fa-sm text-white-50"></i> Generate Report
</a>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Patient Records Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="patient.php" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Patient (Records)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalPatients">Loading...</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Annual Patient Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Patient (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="annualPatients">Loading...</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Patient Care Progress Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Patient Care Progress</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="taskPercentage">Loading...</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" id="taskProgress" style="width: 0%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Appointments Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Appointments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="pendingRequests">Loading...</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Patient Trends Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Patient Trends</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Health Service Distribution Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Health Service Distribution</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Consultations
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Immunizations
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Lab Tests
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow">
            <div class="card-header bg-white text-dark">
                <h5 class="mb-0">Patients per Barangay (Dasmariñas)</h5>
            </div>
            <div class="card-body">

                <h6 class="small font-weight-bold">Barangay Adlas <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-danger" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay Alulod <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-warning" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay Burol I <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-primary" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay Burol II <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-info" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay Bulihan <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay Langkaan I <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-secondary" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay Langkaan II <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-danger" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay Longos <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-warning" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay Luma <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-primary" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay San Agustin <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-info" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay San Antonio <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay San Isidro <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-secondary" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay San Juan <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-danger" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay San Manuel <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-warning" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay San Nicolas <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-primary" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay San Rafael <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-info" style="width: 2.44%"></div>
                </div>

                <h6 class="small font-weight-bold">Barangay San Vicente <span class="float-end">2.44%</span></h6>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width: 2.44%"></div>
                </div>


                <!-- Repeat for all barangays in Dasmariñas -->

            </div>
        </div>
    </div>
</div>








</div>



        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <?php

    include('includes/footer.php');
    include('includes/scripts.php');

    ?>


    </body>

    </html>