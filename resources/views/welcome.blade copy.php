<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Lembang - Garut</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
<style>
    /* Tambahan CSS khusus untuk bagian UMKM agar konsisten dengan daftarumkm.blade.php */
    .product-card {
        border: none;
        transition: transform 0.3s;
        margin-bottom: 25px;
        background-color: white; /* Pastikan background putih */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    .product-img {
        height: 200px;
        object-fit: cover;
    }
    .product-price {
        font-weight: bold;
        color: #28a745;
        font-size: 1.2rem;
    }
    .contact-info {
        background-color: #f8f9fa;
        padding: 8px 12px;
        border-radius: 5px;
        margin-top: 10px;
    }
    .contact-info small {
        color: #6c757d;
    }
    .whatsapp-btn {
        background-color: #25d366;
        border-color: #25d366;
        color: white;
        font-size: 0.8rem;
    }
    .whatsapp-btn:hover {
        background-color: #20c05a;
        border-color: #20c05a;
        color: white;
    }
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
    <section class="hero-section" id="beranda">
        <div class="hero-content">
            <h1 class="display-3 fw-bold mb-4 text-white">Selamat Datang di Website Desa Lembang</h1>
            <p class="lead mb-4">Desa Wisata dan Budaya di Kaki Gunung Guntur, Kabupaten Garut</p>
            <a href="#profil" class="btn btn-success btn-lg me-2"><i class="bi bi-info-circle me-2"></i>Tentang Kami</a>
            <a href="#kontak" class="btn btn-outline-light btn-lg"><i class="bi bi-telephone me-2"></i>Hubungi Kami</a>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card" data-aos="zoom-in">
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-number">6.765 </div>
                        <div class="stat-title">Populasi</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card" data-aos="zoom-in">
                        <div class="stat-icon">
                            <i class="bi bi-house-fill"></i>
                        </div>
                        <div class="stat-number">2.120 </div>
                        <div class="stat-title">Rumah Tangga</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card" data-aos="zoom-in">
                        <div class="stat-icon">
                            <i class="bi bi-map-fill"></i>
                        </div>
                        <div class="stat-number">6.26</div>
                        <div class="stat-title">Luas (km²)</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card" data-aos="zoom-in">
                        <div class="stat-icon">
                            <i class="bi bi-pin-map-fill"></i>
                        </div>
                        <div class="stat-number">3</div>
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
                    <p>Dengan pemandangan alam yang indah dan udara yang sejuk, Desa Lembang menjadi destinasi wisata yang populer bagi wisatawan lokal maupun mancanegara. Desa ini juga dikenal dengan kekayaan budaya dan tradisi yang masih terjaga dengan baik hingga saat ini.</p>
                    <p>Masyarakat Desa Lembang sebagian besar bermata pencarian sebagai petani dan pengrajin. Hasil pertanian utama meliputi sayuran, buah-buahan, dan tanaman hias. Sementara kerajinan tangan seperti anyaman bambu dan ukiran kayu juga menjadi salah satu sumber pendapatan masyarakat.</p>
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
                <div class="col-lg-4 col-md-6">
                    <div class="team-member" data-aos="fade-up">
                        <img src="/Icon/Kades Animasi.png" alt="Kepala Desa" class="shadow">
                        <h4 class="mt-3">Rahmat</h4>
                        <p class="text-success">Kepala Desa</p>
                        <p class="small">Menjabat sejak tahun 2014. Memiliki visi untuk memajukan Desa Lembang menjadi desa wisata dan pertanian berkelanjutan.</p>
                        <div class="social-links">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-member" data-aos="fade-up">
                        <img src="/api/placeholder/150/150" alt="Sekretaris Desa" class="shadow">
                        <h4 class="mt-3">Risna Saridewi</h4>
                        <p class="text-success">Sekretaris Desa</p>
                        <p class="small">Bertanggung jawab atas administrasi desa. Selalu siap membantu masyarakat dalam urusan surat-menyurat dan dokumen penting.</p>
                        <div class="social-links">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-member" data-aos="fade-up">
                        <img src="/api/placeholder/150/150" alt="Bendahara Desa" class="shadow">
                        <h4 class="mt-3">Narisa Nurul Maulida</h4>
                        <p class="text-success">Kaur Tata Usaha</p>
                        <p class="small">Mengelola keuangan desa dengan transparan dan akuntabel. Berpengalaman dalam pengelolaan anggaran pembangunan desa.</p>
                        <div class="social-links">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('strukturdesa') }}" class="btn btn-success"><i class="bi bi-people me-2"></i>Lihat Struktur Organisasi Lengkap</a>
            </div>
        </div>
    </section>

    <section class="section" id="umkm">
        <div class="container">
            <h2 class="section-title">UMKM Desa Lembang</h2>
            
            <div class="row mb-5">
                <div class="col-lg-6">
                    <h3 class="mb-3">Pemberdayaan Ekonomi Lokal</h3>
                    <p class="lead">Desa Lembang memiliki berbagai Usaha Mikro, Kecil, dan Menengah (UMKM) yang menjadi penggerak ekonomi lokal.</p>
                    <p>UMKM di Desa Lembang terdiri dari berbagai sektor, mulai dari pertanian organik, kerajinan tangan tradisional, kuliner khas, hingga produk olahan hasil pertanian. Semua produk UMKM kami dibuat dengan memperhatikan kualitas dan kearifan lokal.</p>
                    <p>Desa Lembang berkomitmen untuk mendukung pengembangan UMKM melalui berbagai program pelatihan, pendampingan, dan fasilitasi pemasaran produk.</p>
                </div>
                <div class="col-lg-6">
                    <img src="/api/placeholder/600/400" alt="UMKM Desa Lembang" class="img-fluid rounded shadow">
                </div>
            </div>


            <div class="row mb-5">
                <div class="col-12 text-center mb-4">
                    <h3>Produk UMKM</h3>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card" data-aos="fade-up">
                        <img src="/api/placeholder/300/200" class="card-img-top product-img" alt="Keripik Singkong">
                        <div class="card-body">
                            <h5 class="card-title">Keripik Singkong Balado</h5>
                            <p class="card-text small">Keripik singkong renyah dengan bumbu balado khas Desa Lembang.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="product-price">Rp 25.000</span>
                            </div>
                            <div class="contact-info">
                                <small><i class="bi bi-person-fill me-1"></i>Ibu Sari</small><br>
                                <small><i class="bi bi-telephone-fill me-1"></i>0812-3456-7890</small>
                                <div class="mt-2">
                                    <a href="https://wa.me/6281234567890" class="btn btn-sm whatsapp-btn" target="_blank">
                                        <i class="bi bi-whatsapp me-1"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="card product-card">
                        <img src="/api/placeholder/300/200" class="card-img-top product-img" alt="Anyaman Bambu">
                        <div class="card-body">
                            <h5 class="card-title">Anyaman Bambu Hias</h5>
                            <p class="card-text small">Kerajinan bambu buatan tangan untuk dekorasi rumah.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="product-price">Rp 75.000</span>
                            </div>
                            <div class="contact-info">
                                <small><i class="bi bi-person-fill me-1"></i>Pak Budi</small><br>
                                <small><i class="bi bi-telephone-fill me-1"></i>0813-9876-5432</small>
                                <div class="mt-2">
                                    <a href="https://wa.me/6281398765432" class="btn btn-sm whatsapp-btn" target="_blank">
                                        <i class="bi bi-whatsapp me-1"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card product-card">
                        <img src="/api/placeholder/300/200" class="card-img-top product-img" alt="Dodol Garut">
                        <div class="card-body">
                            <h5 class="card-title">Dodol Garut Premium</h5>
                            <p class="card-text small">Dodol manis legit dengan cita rasa khas Garut.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="product-price">Rp 35.000</span>
                            </div>
                            <div class="contact-info">
                                <small><i class="bi bi-person-fill me-1"></i>Ibu Dewi</small><br>
                                <small><i class="bi bi-telephone-fill me-1"></i>0814-1122-3344</small>
                                <div class="mt-2">
                                    <a href="https://wa.me/6281411223344" class="btn btn-sm whatsapp-btn" target="_blank">
                                        <i class="bi bi-whatsapp me-1"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="card product-card">
                        <img src="/api/placeholder/300/200" class="card-img-top product-img" alt="Kopi Lembang">
                        <div class="card-body">
                            <h5 class="card-title">Kopi Lembang Arabika</h5>
                            <p class="card-text small">Kopi arabika premium dari perkebunan Desa Lembang.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="product-price">Rp 60.000</span>
                            </div>
                            <div class="contact-info">
                                <small><i class="bi bi-person-fill me-1"></i>Pak Ahmad</small><br>
                                <small><i class="bi bi-telephone-fill me-1"></i>0815-5566-7788</small>
                                <div class="mt-2">
                                    <a href="https://wa.me/6281555667788" class="btn btn-sm whatsapp-btn" target="_blank">
                                        <i class="bi bi-whatsapp me-1"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <section class="section" id="galeri">
        <div class="container">
            <h2 class="section-title">Galeri Desa</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card" data-aos="fade-up">
                        <img src="/api/placeholder/400/300" class="card-img-top" alt="Keindahan Alam Desa">
                        <div class="card-body">
                            <h5 class="card-title">Pemandangan Alam</h5>
                            <p class="card-text">Keindahan alam Desa Lembang dengan latar belakang Gunung Guntur.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card" data-aos="fade-up">
                        <img src="/api/placeholder/400/300" class="card-img-top" alt="Pertanian Organik">
                        <div class="card-body">
                            <h5 class="card-title">Pertanian Organik</h5>
                            <p class="card-text">Lahan pertanian organik yang dikelola oleh masyarakat desa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card" data-aos="fade-up">
                        <img src="/api/placeholder/400/300" class="card-img-top" alt="Kerajinan Tangan">
                        <div class="card-body">
                            <h5 class="card-title">Kerajinan Tangan</h5>
                            <p class="card-text">Hasil kerajinan tangan dari para pengrajin lokal Desa Lembang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card" data-aos="fade-up">
                        <img src="/api/placeholder/400/300" class="card-img-top" alt="Budaya Lokal">
                        <div class="card-body">
                            <h5 class="card-title">Pertunjukan Budaya</h5>
                            <p class="card-text">Pertunjukan seni dan budaya yang masih dilestarikan oleh masyarakat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card" data-aos="fade-up">
                        <img src="/api/placeholder/400/300" class="card-img-top" alt="Wisata Desa">
                        <div class="card-body">
                            <h5 class="card-title">Objek Wisata</h5>
                            <p class="card-text">Berbagai objek wisata yang menarik di Desa Lembang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card" data-aos="fade-up">
                        <img src="/api/placeholder/400/300" class="card-img-top" alt="Kegiatan Masyarakat">
                        <div class="card-body">
                            <h5 class="card-title">Kegiatan Masyarakat</h5>
                            <p class="card-text">Kegiatan gotong royong dan kebersamaan masyarakat desa.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('galeridesa') }}" class="btn btn-success"><i class="bi bi-grid-3x3-gap me-2"></i>Lihat Lebih Banyak</a>
            </div>
        </div>
    </section>
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
                                <p class="mb-0">Jl. Ciharus No. 200, Desa Lembang, Kecamatan Leles, Kabupaten Garut, Jawa Barat 44152</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <i class="bi bi-telephone-fill text-success fs-4 me-3"></i>
                            <div>
                                <h5 class="mb-1">Telepon</h5>
                                <p class="mb-0">+62 812-2047-6828</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <i class="bi bi-envelope-fill text-success fs-4 me-3"></i>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="mb-0">desalembang200leles@gmail.com</p>
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
                                <a href="#" class="btn btn-success me-2"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="btn btn-success me-2"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="btn btn-success me-2"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="btn btn-success me-2"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- FOOTER FOOTER --}}
    <footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h4>Hubungi Kami</h4>
                <p><i class="bi bi-geo-alt-fill text-success me-2"></i> Jl. Ciharus No. 200, Desa Lembang, Kecamatan Leles, Kabupaten Garut, Jawa Barat 44152</p>
                <p><i class="bi bi-telephone-fill text-success me-2"></i>+62 812-2047-6828</p>
                <p><i class="bi bi-envelope-fill text-success me-2"></i>desalembang200leles@gmail.com</p>
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
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-youtube"></i></a>
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