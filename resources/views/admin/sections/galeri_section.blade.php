<div id="galeri" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-images me-2"></i>Galeri Desa</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGaleriModal">
            <i class="bi bi-plus me-2"></i>Tambah Foto
        </button>
    </div>

    <div class="row">
        {{-- Loop data galeri dari controller --}}
        @forelse($galeri as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                @if($item->file)
                    <img src="{{ asset('storage/' . $item->file) }}" class="card-img-top" alt="{{ $item->judul }}">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                @endif
                <div class="card-body p-2">
                    <h6 class="card-title mb-1">{{ $item->judul }}</h6>
                    <small class="text-muted">{{ Str::limit($item->deskripsi, 50, '...') }}</small>
                    <div class="mt-2">
                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editGaleriModal"
                            data-id="{{ $item->id }}"
                            data-judul="{{ $item->judul }}"
                            data-deskripsi="{{ $item->deskripsi }}"
                            data-file="{{ $item->file ? asset('storage/' . $item->file) : '' }}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>Tidak ada foto galeri yang tersedia.</p>
        </div>
        @endforelse
    </div>

    {{-- Tautan Paginasi --}}
    <div class="d-flex justify-content-center mt-4 pagination-links">
        {{ $galeri->links('pagination::bootstrap-5') }} {{-- Pastikan Anda menggunakan tema paginasi Bootstrap 5 --}}
    </div>
</div>