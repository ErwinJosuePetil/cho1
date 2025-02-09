<?php
// Include the database connection
require_once 'db.php';
require_once 'functions.php';
include 'modals/update-patient.php';

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
                        <button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#updateModal' data-id='{$mother['id']}' data-admission_date='$admissionDate' data-discharge_date='$dischargeDate' data-complications='$complications'>Update</button>
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




<script>
    $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var admissionDate = button.data('admission_date');
        var dischargeDate = button.data('discharge_date');
        var complications = button.data('complications');

        var modal = $(this);
        modal.find('#patient-id').val(id);
        modal.find('#admission_date').val(admissionDate);
        modal.find('#discharge_date').val(dischargeDate);
        modal.find('#complications').val(complications);
    });
</script>