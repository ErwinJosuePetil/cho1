<!-- Modal for updating patient data -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit <span id="patient-name"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload();">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form action="update_record.php" method="POST">
                    <input type="hidden" name="id" id="patient-id">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" name="middlename" id="middlename" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" class="form-control" name="birthdate" id="birthdate" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="birthplace">Birthplace</label>
                            <input type="text" class="form-control" name="birthplace" id="birthplace" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sex">Sex</label>
                            <select class="form-control" name="sex" id="sex" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="gestational_age">Gestational Age</label>
                            <input type="number" class="form-control" name="gestational_age" id="gestational_age" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="due_date">Due Date</label>
                            <input type="date" class="form-control" name="due_date" id="due_date" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prenatal_visit">Prenatal Visit</label>
                            <input type="date" class="form-control" name="prenatal_visit" id="prenatal_visit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_menstrual_period">Last Menstrual Period</label>
                            <input type="date" class="form-control" name="last_menstrual_period" id="last_menstrual_period">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pregnancy_status">Pregnancy Status</label>
                            <input type="text" class="form-control" name="pregnancy_status" id="pregnancy_status">
                        </div>
                    </div>
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