<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center py-4" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="DASMA.png" alt="City Health Logo" style="width: 40
            px; height: 40px; display: block;">
        </div>
        <div class="sidebar-brand-text mt-2 font-weight-bold text-uppercase">City Health Office I</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Patient Management - Dropdown -->
    <div class="sidebar-heading">Patient Management</div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patientManagement"
            aria-expanded="false" aria-controls="patientManagement">
            <i class="fas fa-fw fa-users"></i>
            <span>Patient Management</span>
        </a>
        <div id="patientManagement" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="patient.php">All Patients</a>
                <a class="collapse-item" href="records.php">Patient Records</a>
                <a class="collapse-item" href="pregnancy.php">Pregnancy Records</a>
                <a class="collapse-item" href="medical.php">Medical History</a>
                <a class="collapse-item" href="labaratory.php">Lab & Diagnostic Tests</a>
            </div>
        </div>
    </li>

    <!-- Appointments & Services - Dropdown -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Appointments & Services</div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#appointments"
            aria-expanded="false" aria-controls="appointments">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Appointments & Services</span>
        </a>
        <div id="appointments" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="appointments.php">Appointments</a>
                <a class="collapse-item" href="immunization.php">Immunization Records</a>
            </div>
        </div>
    </li>

    <!-- System Management - Dropdown -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">System Management</div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#systemManagement"
            aria-expanded="false" aria-controls="systemManagement">
            <i class="fas fa-fw fa-cogs"></i>
            <span>System Management</span>
        </a>
        <div id="systemManagement" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="staff.php">Staff Management</a>
                <a class="collapse-item" href="reports.php">Reports & Analytics</a>
                <a class="collapse-item" href="users.php">User & Role Management</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
