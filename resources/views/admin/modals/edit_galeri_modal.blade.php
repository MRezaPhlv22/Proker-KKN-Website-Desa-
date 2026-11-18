<div class="modal fade" id="editGaleriModal" tabindex="-1" aria-labelledby="editGaleriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGaleriModalLabel">Edit Foto Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editGaleriForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Input hidden ini tidak diperlukan karena ID akan ada di URL action form --}}
                    {{-- <input type="hidden" id="editGaleriId"> --}}
                    <div class="mb-3">
                        <label for="editGaleriJudul" class="form-label">Judul Foto</label>
                        <input type="text" class="form-control" id="editGaleriJudul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="editGaleriDeskripsi" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="editGaleriDeskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editGaleriFile" class="form-label">Ganti Foto (Opsional)</label>
                        <input type="file" class="form-control" id="editGaleriFile" name="file" accept="image/*">
                        <small class="text-muted" id="currentGaleriFile"></small>
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