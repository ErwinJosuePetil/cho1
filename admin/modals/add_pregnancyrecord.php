<!-- Button to Open Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPregnancyModal">
    Add Pregnancy Record
</button>

<!-- Add Pregnancy Modal -->
<div class="modal fade" id="addPregnancyModal" tabindex="-1" role="dialog" aria-labelledby="addPregnancyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPregnancyModalLabel">Add New Pregnancy Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Mother's Name</label>
                        <input type="text" class="form-control" placeholder="Enter mother's name">
                    </div>
                    <div class="form-group">
                        <label>Expected Delivery Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Last Menstrual Period</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gestational Age (Weeks)</label>
                        <input type="number" class="form-control" placeholder="Enter gestational age">
                    </div>
                    <div class="form-group">
                        <label>Pregnancy Status</label>
                        <select class="form-control">
                            <option>Active</option>
                            <option>Completed</option>
                            <option>High-Risk</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</div>
