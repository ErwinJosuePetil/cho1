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
        // Loop through the mothers data and display each mother's information
        foreach ($mothers as $mother) {
            // Construct the full name
            $fullName = $mother['firstname'] . ' ' . $mother['middlename'] . ' ' . $mother['lastname'];

            // Calculate the age based on birthdate
            $age = date_diff(date_create($mother['birthdate']), date_create('today'))->y;

            // Handle the date formatting for admission and discharge dates
            $admissionDate = $mother['admission_date'] ? date("Y-m-d", strtotime($mother['admission_date'])) : 'N/A';
            $dischargeDate = $mother['discharge_date'] ? date("Y-m-d", strtotime($mother['discharge_date'])) : 'N/A';

            // Get complications or set as 'None' if empty
            $complications = $mother['complications'] ? $mother['complications'] : 'None';

            // Generate the row with dynamic data and ellipsis button
            echo "<tr>
                    <td>$fullName</td>
                    <td>{$mother['sex']}</td>
                    <td>{$mother['birthplace']}</td>
                    <td>$age</td>
                    <td>$admissionDate</td>
                    <td>$dischargeDate</td>
                    <td>$complications</td>
                    <td>
                        <button class='ellipsis-btn' data-id='{$mother['id']}'>...</button>
                        <div class='submenu' id='submenu-{$mother['id']}'>
                            <ul>
                                <li><a href='#' class='edit-action'>Edit</a></li>
                                <li><a href='#' class='delete-action'>Delete</a></li>
                                <li><a href='profile.php?id={$mother['id']}' class='view-action'>View</a></li>
                            </ul>
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
    .submenu {
        display: none;
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
</script>
