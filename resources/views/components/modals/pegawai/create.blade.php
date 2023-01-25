<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Pegawai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="createName">Nama Pegawai</label>
                <input type="text" class="form-control" id="createName" name="name">
            </div>
            <div class="form-group">
                <label for="createNip">NIP</label>
                <input type="text" class="form-control" id="createNip" name="nip">
            </div>

            <div class="form-group">
                <label for="createPhone">No. Telepon</label>
                <input type="text" class="form-control phone" id="createPhone phone" name="phone">
            </div>
            <div class="form-group">
                <label for="createAddress">Alamat</label>
                <textarea class="form-control" id="createAddress" name="address"></textarea>
            </div>
            <div class="form-group">
                <label for="createJabatan">Jabatan</label>
                <textarea class="form-control" id="createJabatan" name="jabatan"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="createSubmit">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</form>
