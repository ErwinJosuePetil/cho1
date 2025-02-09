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

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Patient Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_record.php" method="POST">
                    <input type="hidden" name="id" id="patient-id">
                    <div class="form-group">
                        <label for="admission_date">Admission Date</label>
                        <input type="date" class="form-control" name="admission_date" id="admission_date" required>
                    </div>
                    <div class="form-group">
                        <label for="discharge_date">Discharge Date</label>
                        <input type="date" class="form-control" name="discharge_date" id="discharge_date">
                    </div>
                    <div class="form-group">
                        <label for="complications">Complications</label>
                        <textarea class="form-control" name="complications" id="complications"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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