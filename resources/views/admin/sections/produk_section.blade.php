<div id="produk" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-box me-2"></i>Produk UMKM</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
            <i class="bi bi-plus me-2"></i>Tambah Produk
        </button>
    </div>

    <div class="row">
        {{-- Loop data produk dari controller --}}
        @forelse($produks as $produk)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                @if($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                    <p class="card-text">{{ Str::limit($produk->deskripsi, 70, '...') }}</p>
                    {{-- <p class="text-success fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p> --}}
                    <small class="text-muted">
                        @if($produk->umkm)
                            UMKM: {{ $produk->umkm->nama_umkm }}
                        @else
                            UMKM tidak diketahui
                        @endif
                    </small>
                </div>
                <div class="card-footer bg-transparent">
                    <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editProdukModal"
                        data-id="{{ $produk->id }}"
                        data-nama-produk="{{ $produk->nama_produk }}"
                        data-umkm-id="{{ $produk->umkm_id }}"
                        data-harga="{{ $produk->harga }}"
                        data-deskripsi="{{ $produk->deskripsi }}"
                        data-gambar="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : '' }}">
                        <i class="bi bi-pencil"></i> Edit
                    </button>
                    <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Belum ada produk UMKM.</p>
        </div>
        @endforelse
    </div>
</div>