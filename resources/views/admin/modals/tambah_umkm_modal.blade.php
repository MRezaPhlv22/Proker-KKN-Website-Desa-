<div class="modal fade" id="tambahUmkmModal" tabindex="-1" aria-labelledby="tambahUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUmkmModalLabel">Tambah Data UMKM Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="umkmNama" class="form-label">Nama UMKM</label>
                        <input type="text" class="form-control" id="umkmNama" name="nama_umkm" required>
                    </div>
                    <div class="mb-3">
                        <label for="umkmPemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" id="umkmPemilik" name="pemilik" required>
                    </div>
                    <div class="mb-3">
                        <label for="umkmKategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="umkmKategori" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="umkmKontak" class="form-label">Nomor Kontak</label>
                        <input type="text" class="form-control" id="umkmKontak" name="kontak">
                    </div>
                    <div class="mb-3">
                        <label for="umkmAlamat" class="form-label">Alamat UMKM</label>
                        <textarea class="form-control" id="umkmAlamat" name="alamat" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="umkmGambar" class="form-label">Gambar UMKM</label>
                        <input type="file" class="form-control" id="umkmGambar" name="gambar" accept="image/*">
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