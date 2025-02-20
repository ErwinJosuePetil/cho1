<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientModal">
    + Add Patient
</button>

<!-- Modal -->
<!-- Edit Patient Modal -->
<div class="modal fade" id="editPatientModal" tabindex="-1" aria-labelledby="editPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPatientModalLabel">Edit Patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="update_patient.php">
                <div class="modal-body">
                    <!-- Patient ID (Hidden) -->
                    <input type="hidden" id="edit-id" name="id">

                    <!-- Patient Information Group -->
                    <h6 class="fw-bold mb-3">Patient Information</h6>

                    <!-- Full Name Row -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" id="edit-firstname" name="firstname" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="edit-middlename" name="middlename">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="edit-lastname" name="lastname" required>
                        </div>
                    </div>

                    <!-- Birthdate & Birthplace -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Birthdate</label>
                            <input type="date" class="form-control" id="edit-birthdate" name="birthdate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Birthplace</label>
                            <input type="text" class="form-control" id="edit-birthplace" name="birthplace" required>
                        </div>
                    </div>

                    <!-- Address & Contact -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" id="edit-address" name="address" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="edit-contact_number" name="contact_number" required>
                        </div>
                    </div>

                    <!-- Admission & Discharge Date -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Admission Date</label>
                            <input type="date" class="form-control" id="edit-admission_date" name="admission_date" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Discharge Date (optional)</label>
                            <input type="date" class="form-control" id="edit-discharge_date" name="discharge_date">
                        </div>
                    </div>

                    <!-- Complications -->
                    <div class="mb-4">
                        <label class="form-label">Complications/Notes</label>
                        <textarea class="form-control" id="edit-complications" name="complications" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="update_patient">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
