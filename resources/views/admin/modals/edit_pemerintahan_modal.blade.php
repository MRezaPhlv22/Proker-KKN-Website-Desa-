<div class="modal fade" id="editPemerintahanModal" tabindex="-1" aria-labelledby="editPemerintahanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPemerintahanModalLabel">Edit Pejabat Pemerintahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPemerintahanForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Input hidden ini tidak diperlukan karena ID akan ada di URL action form --}}
                    {{-- <input type="hidden" id="editPemerintahanId"> --}}
                    <div class="mb-3">
                        <label for="editPemerintahanNama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="editPemerintahanNama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPemerintahanJabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="editPemerintahanJabatan" name="jabatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPemerintahanDeskripsi" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="editPemerintahanDeskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editPemerintahanFoto" class="form-label">Ganti Foto Pejabat (Opsional)</label>
                        <input type="file" class="form-control" id="editPemerintahanFoto" name="foto" accept="image/*">
                        <small class="text-muted" id="currentPemerintahanFoto"></small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>