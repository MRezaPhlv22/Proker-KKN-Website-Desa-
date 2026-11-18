<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk UMKM Desa Lembang</title>
    <link rel="icon" href="{{ asset('images/logo-garut.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 76px; /* Tambahkan padding-top untuk konten agar tidak tertutup navbar fixed */
        }
        /* Navbar Styling - Menyesuaikan dengan home.css (scrolled state) */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease-in-out;
            background-color: #28a745 !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: white !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #f8f9fa !important;
            transform: translateY(-1px);
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
            filter: none; /* Hilangkan filter yang mungkin ada dari home.css default */
        }

        /* Product Card Styling */
        .product-card {
            border: none;
            transition: transform 0.3s;
            margin-bottom: 25px;
            background-color: white;
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
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#" style="margin-left: -5px;">
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
                        <a class="nav-link" href="{{ route('welcome') }}"><i class="bi bi-house-door me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profildesa') }}"><i class="bi bi-file-text me-1"></i> Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('strukturdesa') }}"><i class="bi bi-people me-1"></i> Pemerintahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('daftarumkm') }}"><i class="bi bi-shop me-1"></i> UMKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeridesa') }}"><i class="bi bi-images me-1"></i> Galeri</a>
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

    {{-- UMKM Desa Lembang --}}
    <div class="container py-5">
        <h1 class="text-center mb-5" data-aos="fade-down">UMKM Desa Lembang</h1>
        <div class="row">
            @forelse($umkms as $umkm)
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up">
                <div class="card product-card">
                    @if($umkm->gambar)
                    <img src="{{ asset('storage/' . $umkm->gambar) }}" class="card-img-top product-img" alt="{{ $umkm->nama_umkm }}">
                    @else
                        <img src="https://via.placeholder.com/400x250?text=No+Image" class="card-img-top product-img" alt="No Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                        </div>
                        <div class="contact-info">
                                <small><i class="bi bi-person-fill me-1"></i>{{ $umkm->pemilik }}</small><br>
                                <small><i class="bi bi-tag-fill me-1"></i>{{ $umkm->kategori }}</small><br>
                                <small><i class="bi bi-geo-alt-fill me-1"></i>{{ $umkm->alamat }}</small><br>
                                <small><i class="bi bi-telephone-fill me-1"></i>{{ $umkm->kontak }}</small>
                            <div class="mt-2">
                                <a href="https://wa.me/{{ $umkm->kontak }}" class="btn btn-sm whatsapp-btn" target="_blank">
                                    <i class="bi bi-whatsapp me-1"></i>WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="lead">Belum ada data UMKM yang tersedia.</p>
            </div>
            @endforelse
        </div>
        {{-- Tambahkan Pagination Links untuk UMKM --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $umkms->links('pagination::bootstrap-5') }}
        </div>
    </div>
    {{-- UMKM Desa Lembang --}}

   {{-- Produk UMKM Desa Lembang --}}
<div class="container py-5">
    <h1 class="text-center mb-5" data-aos="fade-down">Produk UMKM Desa Lembang</h1>
    <div class="row">
        {{-- Loop data produk dari database --}}
        @forelse($produks as $produk)
        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up">
            <div class="card product-card">
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
            <p class="lead text-muted">Belum ada produk UMKM yang tersedia.</p>
        </div>
        @endforelse
    </div>
    {{-- Tambahkan Pagination Links untuk Produk --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $produks->links('pagination::bootstrap-5') }}
    </div>
</div>
{{-- Produk UMKM Desa Lembang --}}


    <footer class="bg-dark text-white py-4" id="kontak">
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
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1000
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>