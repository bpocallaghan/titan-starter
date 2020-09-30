{{-- confirm modal --}}
<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-warning">
                <h4 class="modal-title">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btn-submit">Yes</button>
            </div>
        </div>
    </div>
</div>

{{-- notifications --}}
<div class="modal fade" id="modal-notifications" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-info">
                <h4 class="modal-title">Notifications</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tbl-notifications" class="table table-striped table-bordered table-sm" width="100%">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Read</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="3" class="text-center">There are currently no notices</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>