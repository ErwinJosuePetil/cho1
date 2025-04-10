<?php
include('includes/header.php');
include('includes/navbar.php');
include('db.php');
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
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

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Pregnancy Records</h1>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addPregnancyModal">Add Record</button>
            </div>

            <!-- Pregnancy Records Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pregnancy Records List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mother's Name</th>
                                    <th>EDD</th>
                                    <th>LMP</th>
                                    <th>Gestational Age</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Maria Santos</td>
                                    <td>2025-07-15</td>
                                    <td>2024-10-08</td>
                                    <td>24 Weeks</td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPregnancyModal">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Pregnancy Record Modal -->
<div class="modal fade" id="addPregnancyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Pregnancy Record</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Mother's Name</label>
                        <input type="text" class="form-control" placeholder="Enter mother's name">
                    </div>
                    <div class="form-group">
                        <label>Expected Delivery Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Last Menstrual Period</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gestational Age (Weeks)</label>
                        <input type="number" class="form-control" placeholder="Enter gestational age">
                    </div>
                    <div class="form-group">
                        <label>Pregnancy Status</label>
                        <select class="form-control">
                            <option>Active</option>
                            <option>Completed</option>
                            <option>High-Risk</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Pregnancy Record Modal -->
<div class="modal fade" id="editPregnancyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pregnancy Record</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Mother's Name</label>
                        <input type="text" class="form-control" value="Maria Santos">
                    </div>
                    <div class="form-group">
                        <label>Expected Delivery Date</label>
                        <input type="date" class="form-control" value="2025-07-15">
                    </div>
                    <div class="form-group">
                        <label>Last Menstrual Period</label>
                        <input type="date" class="form-control" value="2024-10-08">
                    </div>
                    <div class="form-group">
                        <label>Gestational Age (Weeks)</label>
                        <input type="number" class="form-control" value="24">
                    </div>
                    <div class="form-group">
                        <label>Pregnancy Status</label>
                        <select class="form-control">
                            <option selected>Active</option>
                            <option>Completed</option>
                            <option>High-Risk</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Record</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/scripts.php'); ?>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
</body>
</html>