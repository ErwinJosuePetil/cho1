<?php
// Include the database connection and functions
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
        <?php foreach ($mothers as $mother): ?>
            <?php 
                $fullName = htmlspecialchars($mother['firstname'] . ' ' . $mother['middlename'] . ' ' . $mother['lastname']);
                $age = date_diff(date_create($mother['birthdate']), date_create('today'))->y;
                $admissionDate = $mother['admission_date'] ? date("Y-m-d", strtotime($mother['admission_date'])) : 'N/A';
                $dischargeDate = $mother['discharge_date'] ? date("Y-m-d", strtotime($mother['discharge_date'])) : 'N/A';
                $complications = !empty($mother['complications']) ? htmlspecialchars($mother['complications']) : 'None';
                $sex = isset($mother['sex']) && !empty($mother['sex']) ? htmlspecialchars($mother['sex']) : 'Female';
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
                    <button class="btn btn-primary btn-sm edit-btn" data-id="<?= $mother['id']; ?>">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $mother['id']; ?>">Delete</button>
                    <button class="btn btn-info btn-sm view-btn" data-id="<?= $mother['id']; ?>" data-toggle="modal" data-target="#viewModal-<?= $mother['id']; ?>">View</button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="viewModal-<?= $mother['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel-<?= $mother['id']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel-<?= $mother['id']; ?>">Mother Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
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

<!-- JavaScript for Edit & Delete Actions -->
<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            alert('Edit functionality for ID: ' + id);
            // Implement edit functionality here
        });
    });

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            if (confirm('Are you sure you want to delete ID: ' + id + '?')) {
                alert('Deleted ID: ' + id);
                // Implement delete functionality here
            }
        });
    });
</script>
