<div class="modal fade" id="tambahPemerintahanModal" tabindex="-1" aria-labelledby="tambahPemerintahanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPemerintahanModalLabel">Tambah Pejabat Pemerintahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.pemerintahan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="pemerintahanNama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="pemerintahanNama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="pemerintahanJabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="pemerintahanJabatan" name="jabatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="pemerintahanDeskripsi" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="pemerintahanDeskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pemerintahanFoto" class="form-label">Foto Pejabat</label>
                        <input type="file" class="form-control" id="pemerintahanFoto" name="foto" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>