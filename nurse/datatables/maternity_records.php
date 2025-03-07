<?php
require_once 'db.php';
require_once 'functions.php';

// Fetch maternity reco rds
$medicalRecords = getMedicalRecords();
$mothers = getMotherRecords();
?>

<!-- DataTable -->
<table id="maternityTable" class="table table-striped table-bordered">
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
        <?php foreach ($mothers as $mother): ?>
            <?php
            $fullName = htmlspecialchars($mother['firstname'] . ' ' . $mother['middlename'] . ' ' . $mother['lastname']);
            $age = date_diff(date_create($mother['birthdate']), date_create('today'))->y;
            $admissionDate = !empty($mother['admission_date']) ? date("Y-m-d", strtotime($mother['admission_date'])) : 'N/A';
            $dischargeDate = !empty($mother['discharge_date']) ? date("Y-m-d", strtotime($mother['discharge_date'])) : 'N/A';
            $complications = !empty($mother['complications']) ? htmlspecialchars($mother['complications']) : 'None';
            $sex = !empty($mother['sex']) ? htmlspecialchars($mother['sex']) : 'Female';
            $ageStyle = ($age < 21) ? 'style="color: red;"' : '';
            ?>
            <tr>
                <td><?= $fullName; ?></td>
                <td><?= $sex; ?></td>
                <td><?= htmlspecialchars($mother['birthplace']); ?></td>
                <td <?= $ageStyle; ?>><?= $age; ?></td>
                <td><?= $admissionDate; ?></td>
                <td><?= $dischargeDate; ?></td>
                <td><?= $complications; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm edit-btn" data-id="<?= $mother['id']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $mother['id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-info btn-sm view-btn" data-toggle="modal" data-target="#viewModal-<?= $mother['id']; ?>">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>

            <!-- Modal for Viewing Details -->
            <div class="modal fade" id="viewModal-<?= $mother['id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Mother Details</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Name:</strong> <?= $fullName; ?></p>
                            <p><strong>Sex:</strong> <?= $sex; ?></p>
                            <p><strong>Birthplace:</strong> <?= htmlspecialchars($mother['birthplace']); ?></p>
                            <p><strong>Age:</strong> <?= $age; ?></p>
                            <p><strong>Admission Date:</strong> <?= $admissionDate; ?></p>
                            <p><strong>Discharge Date:</strong> <?= $dischargeDate; ?></p>
                            <p><strong>Complications:</strong> <?= $complications; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- JavaScript for DataTables & AJAX Actions -->
<script>
    $(document).ready(function() {
        $('#maternityTable').DataTable();

        // Edit button click event
        $('.edit-btn').on('click', function() {
            const id = $(this).data('id');
            alert('Edit functionality for ID: ' + id);
            // Redirect to edit page or open edit modal
        });

        // Delete button click event
        $('.delete-btn').on('click', function() {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                    url: 'delete_record.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                    error: function() {
                        alert('Error deleting record.');
                    }
                });
            }
        });
    });
</script>