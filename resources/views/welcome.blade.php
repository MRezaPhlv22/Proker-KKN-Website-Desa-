<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Desa Lembang - Garut</title>
    <link rel="icon" href="{{ asset('images/logo-garut.png') }}" type="image/png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
<style>
    
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="" style="margin-left: -5px;">
                <img src="{{ asset('images/logo-garut.png ') }}" alt="Logo Kabupaten Garut" style="height: 40px;">
                <div class="d-flex flex-column">
                    <span class="fs-4 fw-bold">Desa Lembang</span>
                    <span class="fs-6">Kabupaten Garut</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#beranda"><i class="bi bi-house-door me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil"><i class="bi bi-file-text me-1"></i> Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pemerintahan"><i class="bi bi-people me-1"></i> Pemerintahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#umkm"><i class="bi bi-shop me-1"></i> UMKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri"><i class="bi bi-images me-1"></i> Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak"><i class="bi bi-envelope me-1"></i> Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-2 py-1" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Halaman Atas Yang Ada Foto Latar Belakang --}}
    <section class="hero-section" id="beranda">
        <div class="hero-content">
            <h1 class="display-3 fw-bold mb-4 text-white">Selamat Datang di Website Desa Lembang</h1>
            <p class="lead mb-4">Kecamatan Leles, Kabupaten Garut</p>
            <a href="#profil" class="btn btn-success btn-lg me-2"><i class="bi bi-info-circle me-2"></i>Tentang Kami</a>
            <a href="#kontak" class="btn btn-outline-light btn-lg"><i class="bi bi-telephone me-2"></i>Hubungi Kami</a>
        </div>
    </section>
    {{-- Halaman Atas Yang Ada Latar Belakang --}}

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card" data-aos="zoom-in">
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-number">{{ isset($profilDesa->statistik_desa['populasi']) ? number_format($profilDesa->statistik_desa['populasi'], 0, ',', '.') : 'N/A' }} </div>
                        <div class="stat-title">Populasi</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card" data-aos="zoom-in">
                        <div class="stat-icon">
                            <i class="bi bi-house-fill"></i>
                        </div>
                        <div class="stat-number">{{ isset($profilDesa->statistik_desa['rumah_tangga']) ? number_format($profilDesa->statistik_desa['rumah_tangga'], 0, ',', '.') : 'N/A' }}</div>
                        <div class="stat-title">Rumah Tangga</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card" data-aos="zoom-in">
                        <div class="stat-icon">
                            <i class="bi bi-map-fill"></i>
                        </div>
                        <div class="stat-number">{{ $profilDesa->statistik_desa['luas_wilayah'] ?? 'N/A' }}</div>
                        <div class="stat-title">Luas (km²)</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card" data-aos="zoom-in">
                        <div class="stat-icon">
                            <i class="bi bi-pin-map-fill"></i>
                        </div>
                        <div class="stat-number">{{ $profilDesa->statistik_desa['jumlah_dusun'] ?? 'N/A' }}</div>
                        <div class="stat-title">Dusun</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="profil">
        <div class="container">
            <h2 class="section-title">Profil Desa Lembang</h2>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="{{ asset('images/desa-lembang.png') }}" alt="Desa Lembang" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">Tentang Desa Kami</h3>
                    <p class="lead">Desa Lembang adalah salah satu desa wisata yang terletak di kaki Gunung Guntur, Kabupaten Garut, Jawa Barat.</p>
                    <p>Dengan pemandangan alam yang indah dan udara yang sejuk, Desa Lembang menjadi destinasi wisata yang populer bagi wisatawan. Desa ini juga dikenal dengan kekayaan budaya dan tradisi yang masih terjaga dengan baik hingga saat ini.</p>
                    <p>Masyarakat Desa Lembang sebagian besar bermata pencarian sebagai petani dan pengrajin.</p>
                    <div class="mt-4">
                        <a href="{{ route('profildesa') }}" class="btn btn-success me-2"><i class="bi bi-file-earmark-text me-2"></i>Profil Lengkap</a>
                        <a href="#galeri" class="btn btn-outline-success"><i class="bi bi-images me-2"></i>Lihat Galeri</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <section class="section bg-light-green" id="pemerintahan">
    <div class="container">
        <h2 class="section-title">Pemerintahan Desa</h2>
        <div class="row justify-content-center mb-5">
            {{-- Tampilkan Kepala Desa jika ada --}}
            @if($kepalaDesa)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member" data-aos="fade-up">
                        @if($kepalaDesa->foto)
                            <img src="{{ asset('storage/' . $kepalaDesa->foto) }}" alt="{{ $kepalaDesa->jabatan }}" class="shadow img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <img src="{{ asset('Icon/placeholder.png') }}" alt="Placeholder" class="shadow img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                        <h4 class="mt-3">{{ $kepalaDesa->nama }}</h4>
                        <p class="text-success">{{ $kepalaDesa->jabatan }}</p>
                        @if($kepalaDesa->deskripsi)
                            <p class="small">{{ $kepalaDesa->deskripsi }}</p>
                        @endif
                        <div class="social-links">
                            {{-- Tambahkan link sosial media jika ada di database Pemerintahan --}}
                            {{-- Contoh:
                            @if($kepalaDesa->link_facebook)
                                <a href="{{ $kepalaDesa->link_facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
                            @endif
                            --}}
                        </div>
                    </div>
                </div>
            @endif

            {{-- Tampilkan Sekretaris Desa jika ada --}}
            @if($sekretarisDesa)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member" data-aos="fade-up" data-aos-delay="100">
                        @if($sekretarisDesa->foto)
                            <img src="{{ asset('storage/' . $sekretarisDesa->foto) }}" alt="{{ $sekretarisDesa->jabatan }}" class="shadow img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <img src="{{ asset('Icon/placeholder.png') }}" alt="Placeholder" class="shadow img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                        <h4 class="mt-3">{{ $sekretarisDesa->nama }}</h4>
                        <p class="text-success">{{ $sekretarisDesa->jabatan }}</p>
                        @if($sekretarisDesa->deskripsi)
                            <p class="small">{{ $sekretarisDesa->deskripsi }}</p>
                        @endif
                        <div class="social-links">
                            {{-- Tambahkan link sosial media jika ada --}}
                        </div>
                    </div>
                </div>
            @endif

            {{-- Loop untuk Pejabat Lainnya (selain Kades & Sekdes) --}}
            @forelse($otherPemerintahan as $pejabat)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member" data-aos="fade-up" data-aos-delay="200">
                        @if($pejabat->foto)
                            <img src="{{ asset('storage/' . $pejabat->foto) }}" alt="{{ $pejabat->jabatan }}" class="shadow img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <img src="{{ asset('Icon/placeholder.png') }}" alt="Placeholder" class="shadow img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                        <h4 class="mt-3">{{ $pejabat->nama }}</h4>
                        <p class="text-success">{{ $pejabat->jabatan }}</p>
                        @if($pejabat->deskripsi)
                            <p class="small">{{ $pejabat->deskripsi }}</p>
                        @endif
                        <div class="social-links">
                            {{-- Tambahkan link sosial media jika ada --}}
                        </div>
                    </div>
                </div>
            @empty
                @if(!$kepalaDesa && !$sekretarisDesa)
                    <div class="col-12 text-center">
                        <p class="lead text-muted">Data pemerintahan desa belum tersedia atau belum diisi.</p>
                    </div>
                @endif
            @endforelse
        </div>

        <div class="text-center">
                <a href="{{ route('strukturdesa') }}" class="btn btn-success"><i class="bi bi-people me-2"></i>Lihat Struktur Organisasi Lengkap</a>
            </div>
</section>

    <section class="section" id="umkm">
        <div class="container">
            <h2 class="section-title">UMKM Desa Lembang</h2>

            <div class="row mb-5">
                <div class="col-lg-6">
                    <h3 class="mb-3">Pemberdayaan Ekonomi Lokal</h3>
                    <p class="lead">Desa Lembang memiliki berbagai Usaha Mikro, Kecil, dan Menengah (UMKM) yang menjadi penggerak ekonomi lokal.</p>
                    <p>UMKM di Desa Lembang terdiri dari berbagai sektor, mulai dari pertanian organik, kerajinan tangan , kuliner khas, home industri, hingga produk olahan hasil pertanian. Semua produk UMKM kami dibuat dengan memperhatikan kualitas dan kearifan lokal.</p>
                    <p>Desa Lembang berkomitmen untuk mendukung pengembangan UMKM melalui berbagai program pelatihan, pendampingan, dan fasilitasi pemasaran produk.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/UMKM.png') }}" alt="UMKM Desa Lembang" class="img-fluid rounded shadow">
                </div>
            </div>


            {{-- PRODUK UMKM DARI DATABASE --}}
            <div class="row mb-5">
                <div class="col-12 text-center mb-4">
                    <h3>Produk UMKM Terbaru</h3>
                </div>
                @forelse($latestProduks as $produk) {{-- Menggunakan variabel $latestProduks --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card" data-aos="fade-up">
                        @if($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top product-img" alt="{{ $produk->nama_produk }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top product-img" alt="No Image">
                        @endif
                        <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                    <p class="card-text small">{{ Str::limit($produk->deskripsi, 70, '...') }}</p>
                    {{-- <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                    </div> --}}
                    <div class="contact-info">
                        @if($produk->umkm) {{-- Memeriksa apakah ada data UMKM terkait --}}
                            <small><i class="bi bi-shop me-1"></i>UMKM: {{ $produk->umkm->nama_umkm }}</small><br>
                            <small><i class="bi bi-telephone-fill me-1"></i>{{ $produk->umkm->kontak }}</small>
                            <div class="mt-2">
                                <a href="https://wa.me/{{ $produk->umkm->kontak }}" class="btn btn-sm whatsapp-btn" target="_blank">
                                    <i class="bi bi-whatsapp me-1"></i>WhatsApp
                                </a>
                            </div>
                        @else
                            <small>Informasi kontak UMKM tidak tersedia.</small>
                        @endif
                    </div>
                </div>  
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="lead text-muted">Belum ada produk UMKM terbaru yang tersedia.</p>
                </div>
                @endforelse
            </div>
            {{-- AKHIR PRODUK UMKM DARI DATABASE --}}

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="bg-light-green p-5 rounded">
                        <h3 class="mb-3">Tertarik dengan UMKM Kami?</h3>
                        <p class="lead mb-4">Dukung ekonomi lokal dengan membeli produk UMKM Desa Lembang yang berkualitas</p>
                        <a href="{{ route('daftarumkm') }}" class="btn btn-success btn-lg me-2"><i class="bi bi-shop me-2"></i>Lihat Semua UMKM</a>
                        </div>
                </div>
            </div>
        </div>
    </section>

    {{-- GALERI DESA --}}
    <section class="section" id="galeri">
        <div class="container">
            <h2 class="section-title">Galeri Desa</h2>
            <div class="row">
                @forelse($latestGaleri as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card" data-aos="fade-up">
                        @if($item->file)
                            <img src="{{ asset('storage/' . $item->file) }}" class="card-img-top gallery-img-welcome" alt="{{ $item->judul }}">
                        @else
                            <img src="https://via.placeholder.com/400/300?text=No+Image" class="card-img-top gallery-img-welcome" alt="No Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ Str::limit($item->deskripsi, 80, '...') }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="lead text-muted">Belum ada foto atau video di galeri.</p>
                </div>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('galeridesa') }}" class="btn btn-success"><i class="bi bi-grid-3x3-gap me-2"></i>Lihat Lebih Banyak</a>
            </div>
        </div>
    </section>
    {{-- GALERI DESA --}}


    <section class="section" id="kontak">
    <div class="container">
        <h2 class="section-title text-center mb-4">Hubungi Kami</h2>
        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h4 class="mb-4 text-center">Informasi Kontak</h4>

                        <div class="d-flex align-items-start mb-4">
                            <i class="bi bi-geo-alt-fill text-success fs-4 me-3"></i>
                            <div>
                                <h5 class="mb-1">Alamat</h5>
                                <p class="mb-0">{{ $profilDesa->alamat_kantor ?? 'Alamat belum disetel' }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <i class="bi bi-telephone-fill text-success fs-4 me-3"></i>
                            <div>
                                <h5 class="mb-1">Telepon</h5>
                                <p class="mb-0">{{ $profilDesa->telepon_kantor ?? 'Telepon belum disetel' }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <i class="bi bi-envelope-fill text-success fs-4 me-3"></i>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="mb-0">{{ $profilDesa->email_kantor ?? 'Email belum disetel' }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <i class="bi bi-clock-fill text-success fs-4 me-3"></i>
                            <div>
                                <h5 class="mb-1">Jam Operasional</h5>
                                <p class="mb-0">
                                    Senin - Kamis: 07.30 - 16.00 WIB<br>
                                    Jumat: 07.30 - 16.30 WIB<br>
                                    Sabtu - Minggu: Tutup
                                </p>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <h5>Media Sosial</h5>
                            <div class="d-flex justify-content-center mt-3">
                            <a href="{{ $profilDesa->link_facebook ?? '#' }}" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $profilDesa->link_instagram ?? '#' }}" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                            <a href="{{ $profilDesa->link_tiktok ?? '#' }}" class="text-white me-3"><i class="bi bi-tiktok"></i></a>
                            <a href="{{ $profilDesa->link_youtube ?? '#' }}" class="text-white me-3"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4>Hubungi Kami</h4>
                    <p><i class="bi bi-geo-alt-fill text-success me-2"></i>{{ $profilDesa->alamat_kantor ?? 'Alamat belum disetel' }}</p>
                    <p><i class="bi bi-telephone-fill text-success me-2"></i>{{ $profilDesa->telepon_kantor ?? 'Telepon belum disetel' }}</p>
                    <p><i class="bi bi-envelope-fill text-success me-2"></i>{{ $profilDesa->email_kantor ?? 'Email belum disetel' }}</p>
                </div>

                <div class="col-lg-4 mb-4">
                    <h4>Jam Operasional</h4>
                    <p><i class="bi bi-clock-fill text-success me-2"></i> Senin - Kamis: 07.30 - 16.00 WIB<br>
                        Jumat: 07.30 - 16.30 WIB<br>
                        Sabtu - Minggu: Tutup</p>
                    </div>

                <div class="col-lg-4">
                    <h4>Ikuti Media Sosial Kami</h4>
                    <div class="d-flex">
                            <a href="{{ $profilDesa->link_facebook ?? '#' }}" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $profilDesa->link_instagram ?? '#' }}" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                            <a href="{{ $profilDesa->link_tiktok ?? '#' }}" class="text-white me-3"><i class="bi bi-tiktok"></i></a>
                            <a href="{{ $profilDesa->link_youtube ?? '#' }}" class="text-white me-3"><i class="bi bi-youtube"></i></a>
                        </div>
                </div>
                </div>
            <hr class="mt-4 mb-4" style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Powered by KKN Universitas Islam Nusantara Kelompok 14 Lembang.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/navbarscroll.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1000
        });
    </script>
</body>
</html>