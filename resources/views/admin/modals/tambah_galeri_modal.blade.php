<div class="modal fade" id="tambahGaleriModal" tabindex="-1" aria-labelledby="tambahGaleriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahGaleriModalLabel">Tambah Foto Galeri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="galeriJudul" class="form-label">Judul Foto</label>
                        <input type="text" class="form-control" id="galeriJudul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="galeriDeskripsi" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="galeriDeskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="galeriFile" class="form-label">Pilih Foto</label>
                        <input type="file" class="form-control" id="galeriFile" name="file" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Unggah Foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>