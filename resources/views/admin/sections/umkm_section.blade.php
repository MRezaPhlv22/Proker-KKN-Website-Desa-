<div id="umkm" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-shop me-2"></i>Data UMKM</h2>
        <div class="d-flex" style="gap: 10px;">
            <input type="text" id="searchInputUmkm" class="form-control" placeholder="Cari UMKM..." style="width: 200px;">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUmkmModal">
                <i class="bi bi-plus me-2"></i>Tambah UMKM
            </button>
            <button class="btn btn-info" onclick="printTable('umkmTable', 'Data UMKM Desa Lembang')"> {{-- Ubah panggilan fungsi --}}
                <i class="bi bi-printer me-2"></i>Cetak Data
            </button>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-striped" id="umkmTable">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th class="no-print">Gambar</th>
                    <th>Nama UMKM</th>
                    <th>Pemilik</th>
                    <th>Kategori</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th class="action-column no-print">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop data UMKM dari controller --}}
                @forelse($umkms as $umkm)
                <tr>
                    {{-- Nomor urut dinamis sesuai pagination --}}
                    <td>{{ ($umkms->currentPage() - 1) * $umkms->perPage() + $loop->iteration }}</td>
                    <td class="no-print">
                        @if($umkm->gambar)
                            <img src="{{ asset('storage/' . $umkm->gambar) }}" class="rounded" width="50" height="50" alt="{{ $umkm->nama_umkm }}">
                        @else
                            <img src="https://via.placeholder.com/50x50?text=No+Image" class="rounded" width="50" height="50" alt="No Image">
                        @endif
                    </td>
                    <td>{{ $umkm->nama_umkm }}</td>
                    <td>{{ $umkm->pemilik }}</td>
                    <td>{{ $umkm->kategori }}</td>
                    <td>{{ $umkm->kontak }}</td>
                    <td>{{ $umkm->alamat }}</td>
                    <td class="action-buttons no-print">
                        <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#editUmkmModal"
                            data-id="{{ $umkm->id }}"
                            data-nama="{{ $umkm->nama_umkm }}"
                            data-pemilik="{{ $umkm->pemilik }}"
                            data-kategori="{{ $umkm->kategori }}"
                            data-alamat="{{ $umkm->alamat }}"
                            data-kontak="{{ $umkm->kontak }}"
                            data-gambar="{{ $umkm->gambar ? asset('storage/' . $umkm->gambar) : '' }}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data UMKM.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Link Pagination --}}
    <div class="d-flex justify-content-center mt-4 pagination-links">
        {{ $umkms->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Search functionality for UMKM
        const searchInputUmkm = document.getElementById('searchInputUmkm');
        if (searchInputUmkm) {
            searchInputUmkm.addEventListener('keyup', function () {
                const filter = searchInputUmkm.value.toLowerCase();
                const table = document.getElementById('umkmTable');
                const tr = table.getElementsByTagName('tr');

                for (let i = 1; i < tr.length; i++) {
                    let rowContainsFilter = false;
                    const td = tr[i].getElementsByTagName('td');
                    for (let j = 2; j <= 6; j++) {
                        if (td[j]) {
                            const cellText = td[j].textContent || td[j].innerText;
                            if (cellText.toLowerCase().indexOf(filter) > -1) {
                                rowContainsFilter = true;
                                break;
                            }
                        }
                    }
                    tr[i].style.display = rowContainsFilter ? '' : 'none';
                }
            });
        }
    });

    // Fungsi printTable diubah menjadi fungsi global di dashboard.blade.php
    // Sehingga tidak perlu mendefinisikan printTableUmkm lagi di sini.
    // Jika Anda ingin fungsi terpisah per section, Anda bisa tetap menggunakan ini
    // dan copy paste seluruh fungsi printTable dari dashboard.blade.php ke sini,
    // lalu ubah namanya menjadi printTableUmkm.
    // Namun, disarankan satu fungsi printTable saja di dashboard.blade.php
    // yang dipanggil dari masing-masing section.

    // Untuk memastikan fungsi printTable yang ada di dashboard.blade.php dapat diakses,
    // kita asumsikan sudah ada di scope global.
    // Jika tidak, Anda bisa memindahkan fungsi printTable ke luar DOMContentLoaded
    // atau ke file JS terpisah yang dimuat sebelum file ini.
</script>