<?php
require 'db.php';

// Fetch total patient records
$query = $conn->query("SELECT COUNT(*) as total_patients FROM mothers");
$total_patients = $query->fetch(PDO::FETCH_ASSOC)['total_patients'];

// Fetch annual patient count (admitted this year)
$current_year = date('Y');
$query = $conn->query("SELECT COUNT(*) as annual_patients FROM mothers WHERE YEAR(admission_date) = $current_year");
$annual_patients = $query->fetch(PDO::FETCH_ASSOC)['annual_patients'];

// Fetch tasks percentage (example: completed medical records vs total)
$query = $conn->query("SELECT COUNT(*) as total_records FROM medical_records");
$total_records = $query->fetch(PDO::FETCH_ASSOC)['total_records'];

$query = $conn->query("SELECT COUNT(*) as completed_tasks FROM medical_records WHERE notes IS NOT NULL AND notes != ''");
$completed_tasks = $query->fetch(PDO::FETCH_ASSOC)['completed_tasks'];

$task_percentage = ($total_records > 0) ? round(($completed_tasks / $total_records) * 100) : 0;

// Fetch pending requests (example: unreviewed medical records)
$query = $conn->query("SELECT COUNT(*) as pending_requests FROM medical_records WHERE notes IS NULL OR notes = ''");
$pending_requests = $query->fetch(PDO::FETCH_ASSOC)['pending_requests'];
?>

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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($total_patients); ?></div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($annual_patients); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks Progress Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $task_percentage; ?>%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $task_percentage; ?>%"
                                        aria-valuenow="<?php echo $task_percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

    <!-- Pending Requests Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($pending_requests); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
