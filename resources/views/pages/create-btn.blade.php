<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
    Create New Record
</button>
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="c" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModal">Create Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-update-frm">
                    <div class="form-group">
                        <label for="sapid">Sapid:</label>
                        <input type="text" class="form-control" id="sapid" name="sapid" />
                    </div>
                    <div class="form-group">
                        <select name="type">
                            <option>Please Select</option>
                            <option value="ag1">AG1</option>
                            <option value="css">CSS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hostname">Hostname:</label>
                        <input type="text" class="form-control" id="hostname" name="hostname" />
                    </div>
                    <div class="form-group">
                        <label for="loopback">Loopback:</label>
                        <input type="text" class="form-control" id="loopback" name="loopback" />
                    </div>
                    <div class="form-group">
                        <label for="mac_address">Mac Address:</label>
                        <input type="text" class="form-control" id="mac_address" name="mac_address" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closecreaterecord">Close</button>
                <button type="button" class="btn btn-primary" id="createrecord">Create</button>
            </div>
        </div>
    </div>
</div>
