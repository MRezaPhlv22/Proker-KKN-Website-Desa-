<div class="modal fade" id="editUmkmModal" tabindex="-1" aria-labelledby="editUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUmkmModalLabel">Edit Data UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUmkmForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Input hidden ini tidak diperlukan karena ID akan ada di URL action form --}}
                    {{-- <input type="hidden" id="editUmkmId"> --}}
                    <div class="mb-3">
                        <label for="editUmkmNama" class="form-label">Nama UMKM</label>
                        <input type="text" class="form-control" id="editUmkmNama" name="nama_umkm" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUmkmPemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" id="editUmkmPemilik" name="pemilik" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUmkmKategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="editUmkmKategori" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUmkmKontak" class="form-label">Nomor Kontak</label>
                        <input type="text" class="form-control" id="editUmkmKontak" name="kontak">
                    </div>
                    <div class="mb-3">
                        <label for="editUmkmAlamat" class="form-label">Alamat UMKM</label>
                        <textarea class="form-control" id="editUmkmAlamat" name="alamat" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editUmkmGambar" class="form-label">Ganti Gambar UMKM (Opsional)</label>
                        <input type="file" class="form-control" id="editUmkmGambar" name="gambar" accept="image/*">
                        <small class="text-muted" id="currentUmkmImage"></small>
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