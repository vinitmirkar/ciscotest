<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="c" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModal">Create Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-frm">
                    <input type="hidden" class="form-control" id="update_id" name="id" />
                    <div class="form-group">
                        <label for="update_sapid">Sapid:</label>
                        <input type="text" class="form-control" id="update_sapid" name="sapid" />
                    </div>
                    <div class="form-group">
                        <select name="type" id="update_type">
                            <option>Please Select</option>
                            <option value="ag1">AG1</option>
                            <option value="css">CSS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="update_hostname">Hostname:</label>
                        <input type="text" class="form-control" id="update_hostname" name="hostname" />
                    </div>
                    <div class="form-group">
                        <label for="update_loopback">Loopback:</label>
                        <input type="text" class="form-control" id="update_loopback" name="loopback" />
                    </div>
                    <div class="form-group">
                        <label for="update_mac_address">Mac Address:</label>
                        <input type="text" class="form-control" id="update_mac_address" name="mac_address" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeupdaterecord">Close</button>
                <button type="button" class="btn btn-primary" id="updaterecord">Update</button>
            </div>
        </div>
    </div>
</div>
