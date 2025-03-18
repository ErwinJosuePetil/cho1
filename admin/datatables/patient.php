<?php
// Include the database connection and functions
require_once 'db.php';
require_once 'functions.php';

// Fetch the mothers' data
$mothers = get_mothers();
?>

<!-- Table Wrapper -->
<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered">
        <thead class="thead-dark">
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
                    $admissionDate = !empty($mother['admission_date']) && $mother['admission_date'] !== '0000-00-00' 
                        ? date("Y-m-d", strtotime($mother['admission_date'])) 
                        : 'N/A';
                    $dischargeDate = !empty($mother['discharge_date']) && $mother['discharge_date'] !== '0000-00-00' 
                        ? date("Y-m-d", strtotime($mother['discharge_date'])) 
                        : 'N/A';
                    $complications = !empty($mother['complications']) ? htmlspecialchars($mother['complications']) : 'None';
                    $sex = isset($mother['sex']) && !empty($mother['sex']) ? htmlspecialchars($mother['sex']) : 'Female';
                    $ageStyle = ($age < 21) ? 'class="text-danger"' : '';
                ?>
                <tr>
                    <td><?= $fullName; ?></td>
                    <td><?= $sex; ?></td>
                    <td><?= htmlspecialchars($mother['birthplace']); ?></td>
                    <td <?= $ageStyle; ?>><?= $age; ?></td>
                    <td><?= htmlspecialchars($admissionDate); ?></td>
                    <td><?= htmlspecialchars($dischargeDate); ?></td>
                    <td><?= htmlspecialchars($complications); ?></td>
                    <td>
                        <div class="btn-group" role="group">
                            <button class="btn btn-primary btn-sm edit-btn" data-id="<?= $mother['id']; ?>">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $mother['id']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button class="btn btn-info btn-sm view-btn" data-toggle="modal" data-target="#viewModal-<?= $mother['id']; ?>">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Bootstrap Modal for Viewing Details -->
                <div class="modal fade" id="viewModal-<?= htmlspecialchars($mother['id']); ?>" tabindex="-1" aria-labelledby="viewModalLabel-<?= htmlspecialchars($mother['id']); ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">Mother Details</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Name:</strong> <?= $fullName; ?></p>
                                <p><strong>Sex:</strong> <?= $sex; ?></p>
                                <p><strong>Birthplace:</strong> <?= htmlspecialchars($mother['birthplace']); ?></p>
                                <p><strong>Age:</strong> <?= $age; ?></p>
                                <p><strong>Admission Date:</strong> <?= htmlspecialchars($admissionDate); ?></p>
                                <p><strong>Discharge Date:</strong> <?= htmlspecialchars($dischargeDate); ?></p>
                                <p><strong>Complications:</strong> <?= htmlspecialchars($complications); ?></p>
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
</div>

<!-- JavaScript for Edit & Delete Actions -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
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
    });
</script>
