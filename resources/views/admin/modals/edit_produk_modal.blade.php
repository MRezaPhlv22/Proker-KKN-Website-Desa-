<div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProdukModalLabel">Edit Produk UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProdukForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Input hidden ini tidak diperlukan karena ID akan ada di URL action form --}}
                    {{-- <input type="hidden" id="editProdukId"> --}}
                    <div class="mb-3">
                        <label for="editProdukNama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="editProdukNama" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProdukUmkm" class="form-label">UMKM Asal</label>
                        <select class="form-select" id="editProdukUmkm" name="umkm_id" required>
                            <option value="">Pilih UMKM</option>
                            {{-- $umkms ini dilewatkan dari dashboard.blade.php --}}
                            @foreach($umkms as $umkm)
                                <option value="{{ $umkm->id }}">{{ $umkm->nama_umkm }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editProdukDeskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="editProdukDeskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editProdukFoto" class="form-label">Ganti Foto Produk (Opsional)</label>
                        <input type="file" class="form-control" id="editProdukFoto" name="gambar" accept="image/*">
                        <small class="text-muted" id="currentProdukGambar"></small>
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