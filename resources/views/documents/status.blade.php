  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เปลี่ยนสถานะของโครงการ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ action('ChangeStatusProjectController@update', $item->project_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <select class="form-control" id="project_status" name="project_status">
                            <option disabled selected>เลือกสถานะของโครงการ</option>
                            <option value="private" >Private</option>
                            <option value="public">Public</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
          
            </div>
        </div>
    </div>