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
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Medical History Records</h1>
            </div>

            <!-- Add Medical History Button -->
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMedicalHistoryModal">Add Medical History</button>

            <!-- Medical History Records Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Medical History Records List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Diagnosis</th>
                                    <th>Treatment</th>
                                    <th>Date of Diagnosis</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Hypertension</td>
                                    <td>Medication & Lifestyle Change</td>
                                    <td>2025-03-10</td>
                                    <td>
                                        <button class="btn btn-info btn-sm viewHistoryBtn" data-patient-id="1" data-toggle="modal" data-target="#viewMedicalHistoryModal">View History</button>
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>Diabetes</td>
                                    <td>Insulin Therapy</td>
                                    <td>2025-02-18</td>
                                    <td>
                                        <button class="btn btn-info btn-sm viewHistoryBtn" data-patient-id="2" data-toggle="modal" data-target="#viewMedicalHistoryModal">View History</button>
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Content Wrapper -->
</div>

<!-- Add Medical History Modal -->
<div class="modal fade" id="addMedicalHistoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Medical History</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addMedicalHistoryForm">
                    <div class="form-group">
                        <label>Patient Name</label>
                        <input type="text" class="form-control" placeholder="Enter patient name">
                    </div>
                    <div class="form-group">
                        <label>Diagnosis</label>
                        <input type="text" class="form-control" placeholder="Enter diagnosis">
                    </div>
                    <div class="form-group">
                        <label>Treatment</label>
                        <input type="text" class="form-control" placeholder="Enter treatment details">
                    </div>
                    <div class="form-group">
                        <label>Date of Diagnosis</label>
                        <input type="date" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Medical History Modal -->
<div class="modal fade" id="viewMedicalHistoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Medical History Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h5 id="historyPatientName"></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Diagnosis</th>
                            <th>Treatment</th>
                        </tr>
                    </thead>
                    <tbody id="historyTableBody">
                        <!-- History data will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
?>
<script>
    $(document).ready(function () {
        new DataTable('#dataTable');

        // Handle View History button click
        $(".viewHistoryBtn").click(function () {
            var patientId = $(this).data("patient-id");

            // Set patient name in modal (replace with backend data)
            var patientName = $(this).closest("tr").find("td:first").text();
            $("#historyPatientName").text(patientName + "'s Medical History");

            // Clear previous data
            $("#historyTableBody").html("");

            // Fetch data from backend (replace this part with an AJAX request)
            var dummyData = [
                { date: "2025-01-10", diagnosis: "Flu", treatment: "Rest & Fluids" },
                { date: "2025-02-14", diagnosis: "Migraine", treatment: "Pain Relievers" }
            ];

            // Populate modal with history records
            dummyData.forEach(function (record) {
                $("#historyTableBody").append(
                    "<tr><td>" + record.date + "</td><td>" + record.diagnosis + "</td><td>" + record.treatment + "</td></tr>"
                );
            });

            // Show modal (not needed since data-toggle is already set)
            $("#viewMedicalHistoryModal").modal("show");
        });
    });
</script>
</body>
</html>
