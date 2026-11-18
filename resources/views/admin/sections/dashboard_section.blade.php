<div id="dashboard" class="content-section active">
    <h2 class="mb-4"><i class="bi bi-speedometer2 me-2"></i>Dashboard</h2>

    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-primary me-3">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ count($pemerintahan) ?? 0 }}</h4> {{-- Contoh hitungan dari data --}}
                        <small class="text-muted">Jumlah Pejabat</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-success me-3">
                        <i class="bi bi-shop"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ count($umkms) ?? 0 }}</h4>
                        <small class="text-muted">UMKM Aktif</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-warning me-3">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ count($produks) ?? 0 }}</h4>
                        <small class="text-muted">Total Produk UMKM</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-info me-3">
                        <i class="bi bi-image"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ count($galeri) ?? 0 }}</h4>
                        <small class="text-muted">Foto Galeri</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Ringkasan Cepat</h5>
                </div>
                <div class="card-body">
                    <p>Selamat datang kembali di Dashboard Admin Desa Lembang. Di sini Anda dapat mengelola seluruh informasi desa, mulai dari profil, data pemerintahan, UMKM, hingga galeri foto.</p>
                    <p>Gunakan menu navigasi di samping untuk mengakses fitur-fitur yang tersedia.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Aktivitas Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        {{-- Loop melalui aktivitas terbaru yang diambil dari controller --}}
                        @forelse($latestActivities as $activity)
                            <div class="list-group-item d-flex align-items-center">
                                <i class="bi {{ $activity['icon'] }} {{ $activity['color'] }} me-3"></i>
                                <div>
                                    <h6 class="mb-1">{{ $activity['description'] }}</h6>
                                    {{-- Menggunakan Carbon untuk menampilkan waktu relatif (misal: "2 jam yang lalu") --}}
                                    <small class="text-muted">{{ $activity['timestamp']->diffForHumans() }}</small>
                                </div>
                            </div>
                        @empty
                            {{-- Pesan jika tidak ada aktivitas yang ditemukan --}}
                            <div class="list-group-item">
                                <p class="text-muted text-center mb-0">Belum ada aktivitas terbaru yang terekam.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>