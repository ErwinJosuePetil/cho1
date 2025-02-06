<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientModal">
    + Add Patient
</button>

<!-- Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addPatientModalLabel">Add Patient</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="action.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter your first name" id="firstname" name="firstname" required>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <!-- Middle Name -->
                            <div class="mb-3">
                                <label for="middlename" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter your middle name" id="middlename" name="middlename">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Last Name -->
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Enter your last name" name="lastname" required>
                            </div>
                        </div>
                    </div>

                    <!-- Birthdate -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <!-- Birthplace -->
                            <div class="mb-3">
                                <label for="birthplace" class="form-label">Birthplace</label>
                                <input type="text" class="form-control" placeholder="Enter your birthplace" id="birthplace" name="birthplace" required>
                            </div>
                        </div>
                    </div>

                    <!-- Admission Date -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="admission_date" class="form-label">Admission Date</label>
                                <input type="date" class="form-control" id="admission_date" name="admission_date" required>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <!-- Discharge Date -->
                            <div class="mb-3">
                                <label for="discharge_date" class="form-label">Discharge Date</label>
                                <input type="date" class="form-control" id="discharge_date" name="discharge_date">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="discharge_date" class="form-label">Barangay</label>
                        <select class="form-control" id="barangay" name="barangay">
                            <option value="">Select Barangay</option>
                        </select>
                    </div>

                    <!-- Complications -->
                    <div class="mb-3">
                        <label for="complications" class="form-label">Note</label>
                        <textarea class="form-control" placeholder="Enter diagnosis here..." id="complications" name="complications" rows="3"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_patient">Save changes</button>
                </div>

            </form>
        </div>
    </div>
</div>