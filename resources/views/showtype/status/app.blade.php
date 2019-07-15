<!-- Modal -->
<div class="modal fade" id="setting_modal" tabindex="-1" role="dialog" aria-labelledby="setting_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="setting_modal">ตั้งค่าโครงการ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="{{ action('ChangeStatusProjectController@update', $show->project_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                <label for="project_status">เปลี่ยนสถานะของโครงการ/กิจกรรม</label>
                <select class="form-control" id="project_status" name="project_status">
                    <option disabled selected>เลือกสถานะของโครงการ</option>
                    <option value="private" @if($show->project_status == 'private') selected="selected" @endif>Private</option>
                    <option value="public" @if($show->project_status == 'public') selected="selected" @endif>Public</option>
                </select>
                <small id="project_status" class="form-text" style="color:red;">คำเตือน : สถานะ Public คือสถานะ ที่แชร์โครงการให้ผู้ใช้ทุกคนเห็น และผู้ใช้ทุกคนจะสามารถเพิ่มรายการสินค้าได้*</small>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>

        </div>
    </div>
</div>