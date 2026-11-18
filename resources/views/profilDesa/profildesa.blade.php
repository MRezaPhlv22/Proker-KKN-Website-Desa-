<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Lengkap - Desa Lembang Garut</title>
    <link rel="icon" href="{{ asset('images/logo-garut.png') }}" type="image/png">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        /* CSS untuk halaman profil lengkap */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        /* Hero Section untuk halaman profil */
        .profile-hero {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 120px 0 80px 0;
            margin-top: 76px;
        }

        /* Navbar styling */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #28a745 !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar .nav-link {
            color: white !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #f8f9fa !important;
        }

        /* Section styling */
        .section {
            padding: 80px 0;
        }

        .section-title {
            position: relative;
            margin-bottom: 50px;
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            font-weight: bold;
        }

        .section-title:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -15px;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #28a745, #20c997);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Card styling */
        .profile-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Icon styling */
        .section-icon {
            font-size: 3rem;
            color: #28a745;
            margin-bottom: 20px;
        }

/* --- Timeline Styles --- */
.timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 10px;
}

/* Hapus atau komentari bagian ini untuk menghilangkan garis vertikal */
/*
.timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background-color: #28a745;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -3px;
    border-radius: 5px;
    z-index: 1;
}
*/

/* Container untuk setiap item timeline */
.timeline-item {
    padding: 10px 40px;
    position: relative;
    background-color: inherit;
    width: 50%;
    margin-bottom: 50px;
}

/* Lingkaran penomoran pada timeline */
.timeline-item .timeline-icon {
    padding: 10px 15px;
    position: absolute;
    width: 50px;
    height: 50px;
    line-height: 30px;
    text-align: center;
    background-color: #20c997;
    color: white;
    border-radius: 50%;
    z-index: 2; /* Z-index ini tidak terlalu berpengaruh jika garis tidak ada, tapi tetap baik untuk dipertahankan */
    font-weight: bold;
    font-size: 1.2rem;
    border: 3px solid #fff;
}

/* Konten (tanggal dan nama) */
.timeline-item .timeline-content {
    /* Gaya untuk konten di sini */
}

.timeline-item .timeline-date {
    font-size: 0.9em;
    color: #777;
    margin-bottom: 5px;
}

.timeline-item h5 {
    font-size: 1.3rem;
    color: #333;
}

/* Posisi item timeline di sisi kiri */
.timeline-item.left {
    left: 0;
    text-align: right;
    padding-right: 70px; /* Pertahankan padding untuk penempatan icon */
}

/* Posisi icon untuk item di sisi kiri */
.timeline-item.left .timeline-icon {
    right: -25px; /* Tetap posisikan icon di tengah lokasi garis yang seharusnya */
}

/* Posisi item timeline di sisi kanan */
.timeline-item.right {
    left: 50%;
    text-align: left;
    padding-left: 70px; /* Pertahankan padding untuk penempatan icon */
}

/* Posisi icon untuk item di sisi kanan */
.timeline-item.right .timeline-icon {
    left: -25px; /* Tetap posisikan icon di tengah lokasi garis yang seharusnya */
}

/* Panah untuk item timeline (efek gelembung bicara) */
/* Panah ini mungkin perlu disesuaikan atau dihapus jika tidak ada garis */
.timeline-item.left::before {
    content: " ";
    height: 0;
    position: absolute;
    top: 22px;
    width: 0;
    z-index: 1;
    right: 40px;
    border: medium solid white;
    border-width: 10px 0 10px 10px;
    border-color: transparent transparent transparent white;
}

.timeline-item.right::before {
    content: " ";
    height: 0;
    position: absolute;
    top: 22px;
    width: 0;
    z-index: 1;
    left: 40px;
    border: medium solid white;
    border-width: 10px 10px 10px 0;
    border-color: transparent white transparent transparent;
}

/* Media queries untuk responsivitas (mobile) */
@media screen and (max-width: 768px) {
    /* Hapus atau komentari bagian ini juga jika Anda menghapus garis */
    /*
    .timeline::after {
        left: 31px;
    }
    */
    .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 25px;
        margin-bottom: 30px;
    }
    .timeline-item.left,
    .timeline-item.right {
        left: 0;
        text-align: left;
    }
    .timeline-item.left .timeline-icon,
    .timeline-item.right .timeline-icon {
        left: 5px;
    }
    .timeline-item.left::before,
    .timeline-item.right::before {
        left: 60px;
        border-width: 10px 10px 10px 0;
        border-color: transparent white transparent transparent;
    }
}
/* --- END Timeline Styles --- */

        /* Stats card styling */
        .stats-card {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .stats-icon {
            font-size: 2rem;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        /* Border card styling */
        .border-card {
            border: 2px solid #28a745;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background: white;
        }

        .border-title {
            color: #28a745;
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .profile-hero {
                padding: 100px 0 60px 0;
            }
            
            .section {
                padding: 60px 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .profile-card {
                padding: 30px 20px;
            }
        }

        /* Background patterns */
        .bg-pattern {
            background-image: radial-gradient(circle at 25px 25px, rgba(40, 167, 69, 0.1) 2%, transparent 0%);
            background-size: 50px 50px;
        }

        /* Custom button */
        .btn-custom {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('welcome') }}" style="margin-left: -5px;">
                <img src="/images/logo-garut.png" alt="Logo Kabupaten Garut" style="height: 40px;">
                <div class="d-flex flex-column">
                    <span class="fs-4 fw-bold">Desa Lembang</span>
                    <span class="fs-6">Kabupaten Garut</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}"><i class="bi bi-house-door me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('profildesa') }}"><i class="bi bi-file-text me-1"></i> Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('strukturdesa') }}"><i class="bi bi-people me-1"></i> Pemerintahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftarumkm') }}"><i class="bi bi-shop me-1"></i> UMKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeridesa') }}"><i class="bi bi-images me-1"></i> Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak"><i class="bi bi-envelope me-1"></i> Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="profile-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-4 fw-bold mb-4">Profil Lengkap Desa Lembang</h1>
                    <p class="lead mb-4">Mengenal lebih dalam tentang sejarah, visi misi, dan potensi Desa Lembang, Kabupaten Garut, Jawa Barat</p>
                    <div>
                        <span class="badge bg-light text-dark me-2 p-2"><i class="bi bi-geo-alt me-1"></i>Kecamatan Leles</span>
                        <span class="badge bg-light text-dark p-2"><i class="bi bi-people me-1"></i>6.765 Jiwa</span>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left">
                    <i class="bi bi-building section-icon" style="font-size: 8rem; color: rgba(255,255,255,0.3);"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Desa -->
    <section class="section bg-white">
        <div class="container">
            <div class="row">
                <!-- Total Penduduk -->
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stats-card">
                        <div class="stats-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="stats-number">
                            <!-- Mengambil data populasi dari statistik_desa JSON -->
                            {{ isset($profilDesa->statistik_desa['populasi']) ? number_format($profilDesa->statistik_desa['populasi'], 0, ',', '.') : 'N/A' }} 
                        </div>
                        <div>Total Penduduk</div>
                    </div>
                </div>
                <!-- Total Penduduk -->

                <!-- Rumah Tangga -->
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stats-card">
                        <div class="stats-icon"><i class="bi bi-house-fill"></i></div>
                        <div class="stats-number">
                        <!-- Mengambil data rumah_tangga dari statistik_desa JSON -->
                        {{ isset($profilDesa->statistik_desa['rumah_tangga']) ? number_format($profilDesa->statistik_desa['rumah_tangga'], 0, ',', '.') : 'N/A' }}
                        </div>
                        <div>Rumah Tangga</div>
                    </div>
                </div>
                <!-- Rumah Tangga -->

                <!-- Luas Wilayah -->
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stats-card">
                        <div class="stats-icon"><i class="bi bi-map-fill"></i></div>
                        <div class="stats-number">
                            <!-- Mengambil data luas_wilayah dari statistik_desa JSON -->
                            {{ $profilDesa->statistik_desa['luas_wilayah'] ?? 'N/A' }}
                        </div>
                        <div>Luas Wilayah (km²)</div>
                    </div>
                </div>
                <!-- Luas Wilayah -->

                <!-- Jumlah Dusun -->
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stats-card">
                        <div class="stats-icon"><i class="bi bi-pin-map-fill"></i></div>
                        <div class="stats-number">
                         <!-- Mengambil data jumlah_dusun dari statistik_desa JSON -->
                            {{ $profilDesa->statistik_desa['jumlah_dusun'] ?? 'N/A' }}
                        </div>
                        <div>Jumlah Dusun</div>
                    </div>
                </div>
                <!-- Jumlah Dusun -->
            </div>
        </div>
    </section>

    <!-- Visi Misi-->
    <section class="section bg-pattern">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Visi & Misi Desa</h2>
            <div class="row">
                <!-- VISI -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="profile-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-eye section-icon"></i>
                            <h3 class="fw-bold text-success">VISI</h3>
                        </div>
                        <blockquote class="blockquote text-center">
                            <!-- Mengambil data visi dari database -->
                            <p class="mb-4 fs-5 fst-italic">{!! nl2br($profilDesa->visi ?? 'Belum ada visi yang disetel.') !!}</p>
                        </blockquote>
                    </div>
                </div>
                <!-- VISI -->

                <!-- MISI -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="profile-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-target section-icon"></i>
                            <h3 class="fw-bold text-success">MISI</h3>
                        </div>
                        <ul class="list-unstyled">
                            {{-- Mengambil data misi dari database dan memecah menjadi list item --}}
                            @if ($profilDesa->misi)
                                @foreach(explode("\n", $profilDesa->misi) as $misiItem)
                                    @if(trim($misiItem) != '')
                                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>{!! trim($misiItem) !!}</li>
                                    @endif
                                @endforeach
                            @else
                                <li class="mb-3">Belum ada misi yang disetel.</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- MISI -->
            </div>
        </div>
    </section>

    <!-- Sejarah Desa -->
    <section class="section bg-white">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Sejarah Desa Lembang</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto" data-aos="fade-up">
                    <div class="profile-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-book section-icon"></i>
                        </div>
                        <!--  Mengambil data sejarah_desa dari database -->
                        <p>{!! nl2br($profilDesa->sejarah_desa ?? 'Belum ada sejarah desa yang disetel.') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sejarah Desa -->
    
    <!-- Kepala Desa dari Masa ke Masa -->
    <section class="section bg-pattern">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Kepala Desa dari Masa ke Masa</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto" data-aos="fade-up">
                <div class="profile-card">
                    <div class="text-center mb-4">
                        <i class="bi bi-person-badge section-icon"></i>
                        <h4>Daftar Kepala Desa Lembang</h4>
                    </div>
                    
                    <div class="timeline">
                        {{-- Contoh data jika $profilDesa->kepala_desa_masa_ke_masa belum ada atau kosong --}}
                        {{-- Pastikan data ini diisi dari database dengan format JSON array:
                            [
                                {"periode": "1979 - 1982", "nama": "Amu Nurhana"},
                                {"periode": "1982 - 1984", "nama": "Rukmantika"},
                                // ... dst
                            ]
                        --}}
                        @php
                            $kepalaDesaData = $profilDesa->kepala_desa_masa_ke_masa ?? [
                                ['periode' => '1979 - 1982', 'nama' => 'Amu Nurhana'],
                                ['periode' => '1982 - 1984', 'nama' => 'Rukmantika'],
                                ['periode' => '1984 - 1992', 'nama' => 'Rukmantika'],
                                ['periode' => '1992 Menjabat', 'nama' => 'Rd.Oman'],
                                ['periode' => '1992 - 2000', 'nama' => 'Rukmantika'],
                                ['periode' => '2000 Menjabat', 'nama' => 'Sahidin'],
                                ['periode' => '2002 - 2006', 'nama' => 'Rd.Oman'],
                                ['periode' => '2007 - 2014', 'nama' => 'Imamudin Suhendar'],
                                ['periode' => '2014 - 2020', 'nama' => 'Rahmat'],
                                ['periode' => '2020 - Sekarang', 'nama' => 'Rahmat'],
                            ];
                        @endphp

                        @if (!empty($kepalaDesaData))
                            @foreach($kepalaDesaData as $index => $pejabat)
                                <div class="timeline-item {{ $index % 2 == 0 ? 'left' : 'right' }}" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                    <div class="timeline-icon">{{ $index + 1 }}</div>
                                    <div class="timeline-content">
                                        <div class="timeline-date">{{ $pejabat['periode'] }}</div>
                                        <h5 class="fw-bold">{{ $pejabat['nama'] }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center text-muted">Belum ada data kepala desa yang disetel.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Kepala Desa dari Masa ke Masa -->

    <!-- Batas Wilayah -->
    <section class="section bg-white">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Batas Wilayah Desa</h2>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="profile-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-compass section-icon"></i>
                            <h4>Lokasi Geografis</h4>
                        </div>
                        <p class="text-center mb-4">Desa Lembang terletak di koordinat 7°12'30"S - 107°52'15"E dengan ketinggian 650-800 mdpl</p>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="border-card">
                                    <div class="border-title"><i class="bi bi-arrow-up me-2"></i>Utara</div>
                                    <p class="mb-0">Desa Rancasalak Kec. Kadungora</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border-card">
                                    <div class="border-title"><i class="bi bi-arrow-down me-2"></i>Selatan</div>
                                    <p class="mb-0">Desa Cipancar Kec. Leles</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border-card">
                                    <div class="border-title"><i class="bi bi-arrow-left me-2"></i>Barat</div>
                                    <p class="mb-0">Desa Dano Kec. Leles</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border-card">
                                    <div class="border-title"><i class="bi bi-arrow-right me-2"></i>Timur</div>
                                    <p class="mb-0">Desa Hegar Sari Kec. Kadungora</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="profile-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-geo-alt section-icon"></i>
                            <h4>Karakteristik Wilayah</h4>
                        </div>
                        
                        <div class="border-card">
                            <div class="border-title"><i class="bi bi-thermometer-half me-2"></i>Iklim</div>
                            <p class="mb-0">Tropis dengan suhu rata-rata 22-28°C, curah hujan 1480 mm/tahun</p>
                        </div>
                        
                        <div class="border-card">
                            <div class="border-title"><i class="bi bi-geo me-2"></i>Topografi</div>
                            <p class="mb-0">Dataran tinggi berbukit dengan kemiringan 15-30°, tanah vulkanis subur</p>
                        </div>
                        
                        <div class="border-card">
                            <div class="border-title"><i class="bi bi-tree me-2"></i>Penggunaan Lahan</div>
                            <p class="mb-0">40% pertanian, 25% permukiman, 20% hutan, 15% fasilitas umum</p>
                        </div>
                        
                        <div class="border-card">
                            <div class="border-title"><i class="bi bi-water me-2"></i>Sumber Air</div>
                            <p class="mb-0">Mata air pegunungan, Sungai Ciharus, dan sumur artesis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Potensi dan Keunggulan -->
    <section class="section bg-pattern">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Potensi & Keunggulan Desa</h2>
            <div class="row">
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="profile-card text-center">
                        <i class="bi bi-tree-fill section-icon"></i>
                        <h4 class="fw-bold mb-3">Potensi Alam</h4>
                        <ul class="list-unstyled text-start">
                            <li><i class="bi bi-check2 text-success me-2"></i>Pemandangan Gunung Guntur</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Udara sejuk dan segar</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Mata air pegunungan</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Hutan konservasi</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Lahan pertanian organik</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="profile-card text-center">
                        <i class="bi bi-people-fill section-icon"></i>
                        <h4 class="fw-bold mb-3">Potensi Budaya</h4>
                        <ul class="list-unstyled text-start">
                            <li><i class="bi bi-check2 text-success me-2"></i>Seni tradisional Sunda</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Kerajinan tangan</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Kuliner khas daerah</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Gotong royong masyarakat</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Festival budaya tahunan</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="profile-card text-center">
                        <i class="bi bi-graph-up section-icon"></i>
                        <h4 class="fw-bold mb-3">Potensi Ekonomi</h4>
                        <ul class="list-unstyled text-start">
                            <li><i class="bi bi-check2 text-success me-2"></i>Agrowisata terpadu</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>UMKM produk lokal</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Homestay dan penginapan</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Wisata edukasi pertanian</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Pasar produk organik</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                    <div class="profile-card">
                        <i class="bi bi-heart-fill section-icon text-danger"></i>
                        <h3 class="fw-bold mb-4">Mari Bersama Membangun Desa Lembang</h3>
                        <p class="lead mb-4">Bergabunglah dengan kami dalam mengembangkan potensi desa melalui berbagai program pemberdayaan masyarakat dan pelestarian lingkungan</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="/" class="btn btn-custom">
                                <i class="bi bi-house me-2"></i>Kembali ke Beranda
                            </a>
                            <a href="{{ route('daftarumkm') }}" class="btn btn-outline-success">
                                <i class="bi bi-shop me-2"></i>Lihat UMKM Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer - Bagian bawah website dengan Informasi Kontak -->
    <footer class="bg-dark text-white py-4" id="kontak">
        <div class="container">
            <div class="row">
                <!-- Informasi Kontak -->
                <div class="col-lg-4 mb-4">
                    <h4>Hubungi Kami</h4>
                    <p><i class="bi bi-geo-alt-fill text-success me-2"></i>{{ $profilDesa->alamat_kantor ?? 'Alamat belum disetel' }}</p>
                    <p><i class="bi bi-telephone-fill text-success me-2"></i>{{ $profilDesa->telepon_kantor ?? 'Telepon belum disetel' }}</p>
                    <p><i class="bi bi-envelope-fill text-success me-2"></i>{{ $profilDesa->email_kantor ?? 'Email belum disetel' }}</p>
                </div>

                <!-- Link Penting -->
                <div class="col-lg-4 mb-4">
                    <h4>Jam Operasional</h4>
                    <p><i class="bi bi-clock-fill text-success me-2"></i> Senin - Kamis: 07.30 - 16.00 WIB<br>
                        Jumat: 07.30 - 16.30 WIB<br>
                        Sabtu - Minggu: Tutup</p>
                    <!-- <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none"><i class="bi bi-chevron-right me-2"></i>Website Kabupaten Garut</a></li>
                        <li><a href="#" class="text-white text-decoration-none"><i class="bi bi-chevron-right me-2"></i>Portal Desa Nasional</a></li>
                        <li><a href="#" class="text-white text-decoration-none"><i class="bi bi-chevron-right me-2"></i>E-Government Garut</a></li>
                        <li><a href="#" class="text-white text-decoration-none"><i class="bi bi-chevron-right me-2"></i>Transparansi Anggaran</a></li>
                        <li><a href="#" class="text-white text-decoration-none"><i class="bi bi-chevron-right me-2"></i>Lapor!</a></li>
                    </ul> -->
                </div>

                <!-- Media Sosial -->
                <div class="col-lg-4">
                    <h4>Ikuti Media Sosial Kami</h4>
                    <div class="d-flex">
                            <a href="{{ $profilDesa->link_facebook ?? '#' }}" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $profilDesa->link_instagram ?? '#' }}" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                            <a href="{{ $profilDesa->link_tiktok ?? '#' }}" class="text-white me-3"><i class="bi bi-tiktok"></i></a>
                            <a href="{{ $profilDesa->link_youtube ?? '#' }}" class="text-white me-3"><i class="bi bi-youtube"></i></a>
                        </div>
                </div>
                <!-- Media Sosial -->
            </div>
            <!-- Copyright -->
            <hr class="mt-4 mb-4" style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Powered by KKN Universitas Islam Nusantara Kelompok 14 Lembang.</p>
            </div>
        </div>
    </footer>
    <!-- Footer - Bagian bawah website dengan Informasi Kontak -->

    <!-- Script Section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>