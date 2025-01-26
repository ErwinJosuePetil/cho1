<?php
// Include the database connection
require_once 'db.php';
require_once 'functions.php';

// Fetch the mothers' data
$mothers = get_mothers();
?>

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Sex</th>
            <th>Birthplace</th>
            <th>Age</th>
            <th>Admission Date</th>
            <th>Discharge Date</th>
            <th>Complications</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($mothers as $mother) {
            $fullName = $mother['firstname'] . ' ' . $mother['middlename'] . ' ' . $mother['lastname'];
            $age = date_diff(date_create($mother['birthdate']), date_create('today'))->y;
            $admissionDate = $mother['admission_date'] ? date("Y-m-d", strtotime($mother['admission_date'])) : 'N/A';
            $dischargeDate = $mother['discharge_date'] ? date("Y-m-d", strtotime($mother['discharge_date'])) : 'N/A';
            $complications = $mother['complications'] ? $mother['complications'] : 'None';

            echo "<tr>
                    <td>$fullName</td>
                    <td>{$mother['sex']}</td>
                    <td>{$mother['birthplace']}</td>
                    <td>$age</td>
                    <td>$admissionDate</td>
                    <td>$dischargeDate</td>
                    <td>$complications</td>
                    <td>
                        <button class='btn btn-primary btn-sm edit-btn' data-id='{$mother['id']}'>Edit</button>
                        <button class='btn btn-danger btn-sm delete-btn' data-id='{$mother['id']}'>Delete</button>
                        <button class='btn btn-info btn-sm view-btn' data-id='{$mother['id']}' data-toggle='modal' data-target='#viewModal-{$mother['id']}'>View</button>

                    <!-- Modal -->
                    <div class='modal fade' id='viewModal-{$mother['id']}' tabindex='-1' role='dialog' aria-labelledby='viewModalLabel-{$mother['id']}' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='viewModalLabel-{$mother['id']}'>Mother Details</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body'>
                                    <p><strong>Name:</strong> $fullName</p>
                                    <p><strong>Sex:</strong> {$mother['sex']}</p>
                                    <p><strong>Birthplace:</strong> {$mother['birthplace']}</p>
                                    <p><strong>Age:</strong> $age</p>
                                    <p><strong>Admission Date:</strong> $admissionDate</p>
                                    <p><strong>Discharge Date:</strong> $dischargeDate</p>
                                    <p><strong>Complications:</strong> $complications</p>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
                </tr>";
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Sex</th>
            <th>Birthplace</th>
            <th>Age</th>
            <th>Admission Date</th>
            <th>Discharge Date</th>
            <th>Complications</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>

<!-- Add the following CSS for submenu positioning -->
<style>
    .btn {
        padding: 5px 10px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-sm {
        font-size: 12px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #a71d2a;
    }

    .submenu {
        display: none;
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 999;
        width: 120px;
    }

    .submenu ul {
        padding: 0;
        margin: 0;
        list-style-type: none;
    }

    .submenu ul li {
        padding: 8px;
    }

    .submenu ul li a {
        text-decoration: none;
        color: black;
        display: block;
    }

    .submenu ul li a:hover {
        background-color: #f0f0f0;
    }

    .ellipsis-btn {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }
</style>

<!-- Add the following JavaScript to handle submenu toggle -->
<script>
    // Toggle submenu visibility when the ellipsis button is clicked
    document.querySelectorAll('.ellipsis-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const submenuId = 'submenu-' + this.dataset.id;
            const submenu = document.getElementById(submenuId);

            // Close any open submenus first
            document.querySelectorAll('.submenu').forEach(submenu => {
                if (submenu !== document.getElementById(submenuId)) {
                    submenu.style.display = 'none';
                }
            });

            // Toggle the clicked submenu visibility
            submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Close the submenu if clicking outside of it
    document.addEventListener('click', function(e) {
        if (!e.target.classList.contains('ellipsis-btn')) {
            document.querySelectorAll('.submenu').forEach(submenu => {
                submenu.style.display = 'none';
            });
        }
    });
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            alert('Edit functionality for ID: ' + id);
            // Add your edit functionality here
        });
    });

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete ID: ' + id + '?')) {
                // Add your delete functionality here
                alert('Deleted ID: ' + id);
            }
        });
    });
</script>