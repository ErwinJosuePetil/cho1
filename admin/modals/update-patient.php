<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Patient Record for <span id="patient-name"></span></h5>
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