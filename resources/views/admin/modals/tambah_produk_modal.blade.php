<div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk UMKM Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="produkNama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="produkNama" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="produkUmkm" class="form-label">UMKM Asal</label>
                        <select class="form-select" id="produkUmkm" name="umkm_id" required>
                            <option value="">Pilih UMKM</option>
                            {{-- $umkms ini dilewatkan dari dashboard.blade.php --}}
                            @foreach($umkms as $umkm)
                                <option value="{{ $umkm->id }}">{{ $umkm->nama_umkm }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="produkDeskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="produkDeskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="produkFoto" class="form-label">Foto Produk</label>
                        <input type="file" class="form-control" id="produkFoto" name="gambar" accept="image/*">
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