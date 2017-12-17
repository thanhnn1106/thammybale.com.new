<!-- Modal -->
<div class="modal fade" id="deleteNewsModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this news?
            </div>
            <div class="modal-footer">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a id="btnDelete" class="btn btn-warning">Delete</a>
            </div>
            </form>
        </div>
    </div>
</div>
