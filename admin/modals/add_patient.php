<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientModal">
    + Add Patient
</button>

<!-- Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPatientModalLabel">Add New Patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="action.php">
                <div class="modal-body">
                    <!-- Patient Information Group -->
                    <h6 class="fw-bold mb-3">Patient Information</h6>

                    <!-- Full Name Row -->
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-md-4 mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
                        </div>

                        <!-- Middle Name -->
                        <div class="col-md-4 mb-3">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter middle name">
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-4 mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
                        </div>
                    </div>

                    <!-- Birthdate -->
                    <div class="row">
                        <!-- Birthdate -->
                        <div class="col-md-6 mb-3">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>

                        <!-- Birthplace -->
                        <div class="col-md-6 mb-3">
                            <label for="birthplace" class="form-label">Birthplace</label>
                            <input type="text" class="form-control" id="birthplace" name="birthplace" placeholder="Enter birthplace" required>
                        </div>
                    </div>

                    <!-- address -->
                    <div class="row">
                        <!-- Address -->
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                        </div>

                        <!-- Contact Number -->
                        <div class="col-md-6 mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter contact number" required>
                        </div>
                    </div>

                    <!-- Admission Date -->

                <div class="row">
                    <!-- Admission Date -->
                    <div class="col-md-6 mb-4">
                        <label for="admission_date" class="form-label">Admission Date</label>
                        <input type="date" class="form-control" id="admission_date" name="admission_date" required>
                    </div>

                    <!-- Discharge Date -->
                    <div class="col-md-6 mb-4">
                        <label for="discharge_date" class="form-label">Discharge Date (optional)</label>
                        <input type="date" class="form-control" id="discharge_date" name="discharge_date">
                    </div>
                </div>

                    <!-- Note -->
                    <div class="mb-4">
                        <label for="complications" class="form-label">Complications/Notes</label>
                        <textarea class="form-control" id="complications" name="complications" rows="3" placeholder="Enter any complications or notes"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_patient">Save Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>