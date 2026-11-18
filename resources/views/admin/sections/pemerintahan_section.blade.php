<div id="pemerintahan" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-people me-2"></i>Struktur Pemerintahan</h2>
        <div class="d-flex" style="gap: 10px;">
            <input type="text" id="searchInputPemerintahan" class="form-control" placeholder="Cari pejabat..." style="width: 200px;">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPemerintahanModal">
                <i class="bi bi-plus me-2"></i>Tambah Pejabat
            </button>
            <button class="btn btn-info" onclick="printTable('pemerintahanTable', 'Data Struktur Pemerintahan Desa Lembang')"> {{-- Ubah panggilan fungsi --}}
                <i class="bi bi-printer me-2"></i>Cetak Data
            </button>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-striped" id="pemerintahanTable">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Deskripsi</th>
                    <th class="action-column no-print">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop data pemerintahan dari controller --}}
                @forelse($pemerintahan as $pejabat)
                <tr>
                    <td>{{ ($pemerintahan->currentPage() - 1) * $pemerintahan->perPage() + $loop->iteration }}</td>
                    <td>
                        @if($pejabat->foto)
                            <img src="{{ asset('storage/' . $pejabat->foto) }}" class="rounded-circle" width="50" height="50" alt="{{ $pejabat->nama }}">
                        @else
                            <img src="https://via.placeholder.com/50x50?text=No+Foto" class="rounded-circle" width="50" height="50" alt="No Photo">
                        @endif
                    </td>
                    <td>{{ $pejabat->nama }}</td>
                    <td>{{ $pejabat->jabatan }}</td>
                    <td>{{ Str::limit($pejabat->deskripsi, 50, '...') }}</td>
                    <td class="action-buttons no-print">
                        <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#editPemerintahanModal"
                            data-id="{{ $pejabat->id }}"
                            data-nama="{{ $pejabat->nama }}"
                            data-jabatan="{{ $pejabat->jabatan }}"
                            data-deskripsi="{{ $pejabat->deskripsi }}"
                            data-foto="{{ $pejabat->foto ? asset('storage/' . $pejabat->foto) : '' }}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <form action="{{ route('admin.pemerintahan.destroy', $pejabat->id) }}" method="POST" class="d-inline">
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
                    <td colspan="6" class="text-center">Belum ada data pejabat pemerintahan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Link Pagination --}}
    <div class="d-flex justify-content-center mt-4 pagination-links">
        {{ $pemerintahan->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Search functionality
        const searchInput = document.getElementById('searchInputPemerintahan');
        if (searchInput) {
            searchInput.addEventListener('keyup', function () {
                const filter = searchInput.value.toLowerCase();
                const table = document.getElementById('pemerintahanTable');
                const tr = table.getElementsByTagName('tr');

                for (let i = 1; i < tr.length; i++) {
                    let rowContainsFilter = false;
                    const td = tr[i].getElementsByTagName('td');
                    for (let j = 2; j <= 4; j++) {
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

    // Print functionality (Diubah agar menerima parameter judul)
    function printTable(tableId, title) {
        const printContent = document.getElementById(tableId).outerHTML;
        const printWindow = window.open('', '', 'height=600,width=800');

        const date = new Date();
        const dateTimeString = date.toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }) + ' ' +
                               date.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

        printWindow.document.write('<html><head><title>' + title + '</title>');
        printWindow.document.write('<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">');
        // Sertakan CSS dari dashboard.blade.php yang ada di @media print
        printWindow.document.write('<style>');
        printWindow.document.write(document.querySelector('style').textContent); // Mengambil semua style dari halaman utama
        printWindow.document.write(`
            /* Override atau tambahkan gaya khusus untuk judul di sini jika perlu */
            .print-header {
                text-align: center;
                margin-bottom: 20px;
            }
            .print-header h2 {
                margin-bottom: 5px;
                font-size: 24px;
            }
            .print-header p {
                font-size: 12px;
                color: #555;
            }
            body { padding: 20px; } /* Tambahkan padding ke body cetak */
        `);
        printWindow.document.write('</style></head><body>');
        printWindow.document.write('<div class="print-header">');
        printWindow.document.write('<h2>' + title + '</h2>');
        printWindow.document.write('<p>Dicetak pada: ' + dateTimeString + '</p>');
        printWindow.document.write('</div>');
        printWindow.document.write(printContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    }
</script>