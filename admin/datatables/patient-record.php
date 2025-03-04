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
                        <button type='button' class='btn btn-warning btn-sm edit-btn' data-id='{$mother['id']}' data-toggle='modal' data-target='#updateModal'>
                            <i class='fas fa-edit'></i>
                        </button>
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





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.edit-btn').click(function() {
        var patientId = $(this).data('id');

        $.ajax({
            url: 'get_mother.php',  
            type: 'POST',
            data: { id: patientId },
            success: function(response) {
                var data = JSON.parse(response);

                if (data.id) {  // If data exists, populate the form
                    $('#patient-id').val(data.id);
                    $('#firstname').val(data.firstname || '');
                    $('#middlename').val(data.middlename || '');
                    $('#lastname').val(data.lastname || '');
                    $('#birthdate').val(data.birthdate || '');
                    $('#birthplace').val(data.birthplace || '');
                    $('#sex').val(data.sex || '');
                    $('#gestational_age').val(data.gestational_age || '');
                    $('#due_date').val(data.due_date || '');
                    $('#prenatal_visit').val(data.prenatal_visit || '');
                    $('#last_menstrual_period').val(data.last_menstrual_period || '');
                    $('#pregnancy_status').val(data.pregnancy_status || '');
                    $('#admission_date').val(data.admission_date || '');
                    $('#discharge_date').val(data.discharge_date || '');
                    $('#complications').val(data.complications || '');

                    $('#updateModal').modal('show');  // Show modal after filling
                } else {
                    alert('No record found for this patient.');
                }
            }
        });
    });
});

</script>


