<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Pemerintahan - Desa Lembang Garut</title>
    <link rel="icon" href="{{ asset('images/logo-garut.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #6c757d;
            --light-green: #f8f9fa;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #20c997 100%);
            padding: 100px 0 60px;
            color: white;
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

        .team-member {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2rem;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--primary-color);
            margin-bottom: 1rem;
        }

        .team-member h4 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .team-member .position {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .social-links {
            margin-top: 1rem;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            margin: 0 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #1e7e34;
            transform: translateY(-2px);
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            color: #333;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-color);
        }

        .org-chart {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .org-level {
            margin-bottom: 3rem;
        }

        .org-box {
            background: linear-gradient(135deg, var(--primary-color), #20c997);
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            margin: 0.5rem;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
            transition: transform 0.3s ease;
        }

        .org-box:hover {
            transform: translateY(-5px);
        }

        .org-box h5 {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .org-box p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .connector {
            text-align: center;
            color: var(--primary-color);
            font-size: 2rem;
            margin: 1rem 0;
        }

        .bg-light-green {
            background-color: #f8f9fa;
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center; /* Center horizontally */
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #555;
        }

        .contact-item i {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-right: 0.5rem;
            width: 25px; /* Fixed width for icon */
            text-align: center;
        }

        .breadcrumb-item.active {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#" style="margin-left: -5px;">
                <img src="{{ asset('images/logo-garut.png') }}" alt="Logo Kabupaten Garut" style="height: 40px;">
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
                        <a class="nav-link active" href="{{ route('strukturdesa') }}"><i class="bi bi-people me-1"></i> Pemerintahan</a>
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

    <section class="hero-section text-center">
        <div class="container" data-aos="fade-up">
            <h1 class="display-4 fw-bold">Struktur Pemerintahan Desa Lembang</h1>
            <p class="lead mt-3">Mengenal Pejabat dan Aparatur Desa yang Melayani Masyarakat</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="text-white text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pemerintahan</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- BAGAN STRUKTUR PEMERINTAHAN DESA LEMBANG --}}
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Bagan Organisasi Pemerintahan Desa</h2>
            
            <div class="org-chart">
                @if(isset($kepalaDesa) && $kepalaDesa)
                <div class="org-level">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="org-box">
                                <h5><i class="bi bi-person-fill me-2"></i>KEPALA DESA</h5>
                                <p>{{ $kepalaDesa->nama }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-12 text-center">
                    <p>Data Kepala Desa belum tersedia di bagan.</p>
                </div>
                @endif

                <div class="connector">
                    <i class="bi bi-arrow-down"></i>
                </div>

                @if(isset($sekretarisDesa) && $sekretarisDesa)
                <div class="org-level">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="org-box">
                                <h5><i class="bi bi-person-badge me-2"></i>SEKRETARIS DESA</h5>
                                <p>{{ $sekretarisDesa->nama }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-12 text-center">
                    <p>Data Sekretaris Desa belum tersedia di bagan.</p>
                </div>
                @endif

                <div class="connector">
                    <i class="bi bi-arrow-down"></i>
                </div>

                <div class="org-level">
                    <div class="row">
                        {{-- Loop untuk setiap kelompok Kaur --}}
                        @if(isset($allKaur) && $allKaur->isNotEmpty())
                            @foreach($allKaur->sortKeys() as $jabatanKaur => $pejabatKaurGroup)
                                {{-- Kita asumsikan setiap jabatan Kaur hanya memiliki 1 pejabat untuk layout bagan ini --}}
                                @php $pejabatKaur = $pejabatKaurGroup->first(); @endphp
                                @if($pejabatKaur)
                                <div class="col-lg-3 col-md-6">
                                    <div class="org-box">
                                        {{-- Ikon bisa disesuaikan per jabatan jika ada di database, atau pakai default --}}
                                        <h5><i class="bi bi-file-text me-2"></i>{{ strtoupper($jabatanKaur) }}</h5>
                                        <p>{{ $pejabatKaur->nama }}</p>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif

                        {{-- Loop untuk setiap kelompok Kasi --}}
                        @if(isset($allKasi) && $allKasi->isNotEmpty())
                            @foreach($allKasi->sortKeys() as $jabatanKasi => $pejabatKasiGroup)
                                {{-- Kita asumsikan setiap jabatan Kasi hanya memiliki 1 pejabat untuk layout bagan ini --}}
                                @php $pejabatKasi = $pejabatKasiGroup->first(); @endphp
                                @if($pejabatKasi)
                                <div class="col-lg-3 col-md-6">
                                    <div class="org-box">
                                        {{-- Ikon bisa disesuaikan per jabatan jika ada di database, atau pakai default --}}
                                        <h5><i class="bi bi-people me-2"></i>{{ strtoupper($jabatanKasi) }}</h5>
                                        <p>{{ $pejabatKasi->nama }}</p>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif

                        {{-- Jika tidak ada data Kaur atau Kasi --}}
                        @if((!isset($allKaur) || $allKaur->isEmpty()) && (!isset($allKasi) || $allKasi->isEmpty()))
                        <div class="col-12 text-center">
                            <p>Data Kepala Urusan dan Kepala Seksi belum tersedia di bagan.</p>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="connector">
                    <i class="bi bi-arrow-down"></i>
                </div>

                <div class="org-level">
                    <div class="row">
                        @if(isset($allKadus) && $allKadus->isNotEmpty())
                            {{-- Urutkan kunci jabatan secara alami untuk urutan numerik yang benar (Dusun 1, Dusun 2, dst.) --}}
                            @foreach($allKadus->sortKeysUsing(function($keyA, $keyB) {
                                return strnatcmp($keyA, $keyB);
                            }) as $jabatanKadus => $pejabatKadusGroup)
                                {{-- Kita asumsikan setiap jabatan Kadus hanya memiliki 1 pejabat untuk layout bagan ini --}}
                                @php $pejabatKadus = $pejabatKadusGroup->first(); @endphp
                                @if($pejabatKadus)
                                <div class="col-lg-4">
                                    <div class="org-box">
                                        <h5><i class="bi bi-geo-alt me-2"></i>{{ strtoupper($jabatanKadus) }}</h5>
                                        <p>{{ $pejabatKadus->nama }}</p>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @else
                        <div class="col-12 text-center">
                            <p>Data Kepala Dusun belum tersedia di bagan.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- BAGAN STRUKTUR PEMERINTAHAN DESA LEMBANG --}}

    {{-- PROFIL APARAT DESA --}}
    <section class="py-5 bg-light-green">
        <div class="container">
            <h2 class="section-title">Profil Pemerintahan Desa</h2>

            <div class="row justify-content-center">
                @if(isset($kepalaDesa) && $kepalaDesa)
                <div class="col-lg-4 col-md-6">
                    <div class="team-member" data-aos="fade-up">
                        {{-- Menggunakan asset('storage/') untuk gambar dari storage/app/public --}}
                        <img src="{{ asset('storage/' . $kepalaDesa->foto) }}" alt="{{ $kepalaDesa->nama }}" class="shadow">
                        <h4>{{ $kepalaDesa->nama }}</h4>
                        <p class="position">{{ $kepalaDesa->jabatan }}</p>
                        <p class="small text-muted">{{ $kepalaDesa->deskripsi ?? 'Deskripsi belum tersedia.' }}</p>
                        @if($kepalaDesa->telepon)
                        <div class="contact-item">
                            <i class="bi bi-telephone"></i>
                            <span>{{ $kepalaDesa->telepon }}</span>
                        </div>
                        @endif
                        <div class="social-links">
                            @if($kepalaDesa->facebook_url) <a href="{{ $kepalaDesa->facebook_url }}" target="_blank"><i class="bi bi-facebook"></i></a> @endif
                            @if($kepalaDesa->twitter_url) <a href="{{ $kepalaDesa->twitter_url }}" target="_blank"><i class="bi bi-twitter"></i></a> @endif
                            @if($kepalaDesa->instagram_url) <a href="{{ $kepalaDesa->instagram_url }}" target="_blank"><i class="bi bi-instagram"></i></a> @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-4 col-md-6">
                    <div class="team-member" data-aos="fade-up">
                        {{-- Placeholder jika data tidak ada --}}
                        <img src="{{ asset('images/placeholder_kades.png') }}" alt="Kepala Desa Placeholder" class="shadow">
                        <h4>Nama Kepala Desa</h4>
                        <p class="position">Kepala Desa</p>
                        <p class="small text-muted">Data Kepala Desa belum tersedia.</p>
                    </div>
                </div>
                @endif

                @if(isset($sekretarisDesa) && $sekretarisDesa)
                <div class="col-lg-4 col-md-6">
                    <div class="team-member" data-aos="fade-up" data-aos-delay="100">
                        {{-- Menggunakan asset('storage/') untuk gambar dari storage/app/public --}}
                        <img src="{{ asset('storage/' . $sekretarisDesa->foto) }}" alt="{{ $sekretarisDesa->nama }}" class="shadow">
                        <h4>{{ $sekretarisDesa->nama }}</h4>
                        <p class="position">{{ $sekretarisDesa->jabatan }}</p>
                        <p class="small text-muted">{{ $sekretarisDesa->deskripsi ?? 'Deskripsi belum tersedia.' }}</p>
                        @if($sekretarisDesa->telepon)
                        <div class="contact-item">
                            <i class="bi bi-telephone"></i>
                            <span>{{ $sekretarisDesa->telepon }}</span>
                        </div>
                        @endif
                        <div class="social-links">
                            @if($sekretarisDesa->facebook_url) <a href="{{ $sekretarisDesa->facebook_url }}" target="_blank"><i class="bi bi-facebook"></i></a> @endif
                            @if($sekretarisDesa->twitter_url) <a href="{{ $sekretarisDesa->twitter_url }}" target="_blank"><i class="bi bi-twitter"></i></a> @endif
                            @if($sekretarisDesa->instagram_url) <a href="{{ $sekretarisDesa->instagram_url }}" target="_blank"><i class="bi bi-instagram"></i></a> @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-4 col-md-6">
                    <div class="team-member" data-aos="fade-up" data-aos-delay="100">
                        {{-- Placeholder jika data tidak ada --}}
                        <img src="{{ asset('images/placeholder_sekretaris.png') }}" alt="Sekretaris Desa Placeholder" class="shadow">
                        <h4>Nama Sekretaris Desa</h4>
                        <p class="position">Sekretaris Desa</p>
                        <p class="small text-muted">Data Sekretaris Desa belum tersedia.</p>
                    </div>
                </div>
                @endif

                {{-- Menampilkan Kaur dan Kasi (dinamis dari database) --}}
                {{-- Gabungkan Kaur dan Kasi untuk looping yang lebih efisien --}}
                @php
                    $combinedStaff = collect();
                    if (isset($allKaur) && $allKaur->isNotEmpty()) {
                        // Urutkan berdasarkan kunci (nama jabatan) untuk konsistensi
                        foreach ($allKaur->sortKeys() as $jabatan => $group) {
                            $combinedStaff->push($group->first()); // Ambil pejabat pertama dari setiap kelompok jabatan
                        }
                    }
                    if (isset($allKasi) && $allKasi->isNotEmpty()) {
                        // Urutkan berdasarkan kunci (nama jabatan) untuk konsistensi
                        foreach ($allKasi->sortKeys() as $jabatan => $group) {
                            $combinedStaff->push($group->first());
                        }
                    }
                    // Opsional: Urutkan semua staff gabungan berdasarkan nama atau jabatan jika diinginkan
                    // $combinedStaff = $combinedStaff->sortBy('jabatan');
                @endphp

                @if($combinedStaff->isNotEmpty())
                    @foreach($combinedStaff as $staff)
                        @if($staff)
                        <div class="col-lg-4 col-md-6">
                            <div class="team-member" data-aos="fade-up" data-aos-delay="200"> {{-- Anda bisa menyesuaikan delay --}}
                                {{-- Menggunakan asset('storage/') untuk gambar dari storage/app/public --}}
                                <img src="{{ asset('storage/' . $staff->foto) }}" alt="{{ $staff->nama }}" class="shadow">
                                <h4>{{ $staff->nama }}</h4>
                                <p class="position">{{ $staff->jabatan }}</p>
                                <p class="small text-muted">{{ $staff->deskripsi ?? 'Deskripsi belum tersedia.' }}</p>
                                @if($staff->telepon)
                                <div class="contact-item">
                                    <i class="bi bi-telephone"></i>
                                    <span>{{ $staff->telepon }}</span>
                                </div>
                                @endif
                                <div class="social-links">
                                    @if($staff->facebook_url) <a href="{{ $staff->facebook_url }}" target="_blank"><i class="bi bi-facebook"></i></a> @endif
                                    @if($staff->twitter_url) <a href="{{ $staff->twitter_url }}" target="_blank"><i class="bi bi-twitter"></i></a> @endif
                                    @if($staff->instagram_url) <a href="{{ $staff->instagram_url }}" target="_blank"><i class="bi bi-instagram"></i></a> @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-12 text-center mt-4">
                        <p>Data Kaur dan Kasi belum tersedia.</p>
                    </div>
                @endif
            </div>

            <div class="row justify-content-center mt-4">
                @if(isset($allKadus) && $allKadus->isNotEmpty())
                    {{-- Urutkan kunci jabatan secara alami untuk urutan numerik yang benar (Dusun 1, Dusun 2, dst.) --}}
                    @foreach($allKadus->sortKeysUsing(function($keyA, $keyB) {
                        return strnatcmp($keyA, $keyB);
                    }) as $jabatanKadus => $pejabatKadusGroup)
                        @php $pejabatKadus = $pejabatKadusGroup->first(); @endphp
                        @if($pejabatKadus)
                        <div class="col-lg-4 col-md-6"> {{-- Gunakan col-lg-4 agar tetap 3 per baris jika data ada --}}
                            <div class="team-member" data-aos="fade-up" data-aos-delay="600"> {{-- Sesuaikan delay --}}
                                {{-- Menggunakan asset('storage/') untuk gambar dari storage/app/public --}}
                                <img src="{{ asset('storage/' . $pejabatKadus->foto) }}" alt="{{ $pejabatKadus->nama }}" class="shadow">
                                <h4>{{ $pejabatKadus->nama }}</h4>
                                <p class="position">{{ $pejabatKadus->jabatan }}</p>
                                <p class="small text-muted">{{ $pejabatKadus->deskripsi ?? 'Deskripsi belum tersedia.' }}</p>
                                @if($pejabatKadus->telepon)
                                <div class="contact-item">
                                    <i class="bi bi-telephone"></i>
                                    <span>{{ $pejabatKadus->telepon }}</span>
                                </div>
                                @endif
                                <div class="social-links">
                                    @if($pejabatKadus->facebook_url) <a href="{{ $pejabatKadus->facebook_url }}" target="_blank"><i class="bi bi-facebook"></i></a> @endif
                                    @if($pejabatKadus->twitter_url) <a href="{{ $pejabatKadus->twitter_url }}" target="_blank"><i class="bi bi-twitter"></i></a> @endif
                                    @if($pejabatKadus->instagram_url) <a href="{{ $pejabatKadus->instagram_url }}" target="_blank"><i class="bi bi-instagram"></i></a> @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-12 text-center mt-4">
                        <p>Data Kepala Dusun belum tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    {{-- PROFIL APARAT DESA --}}


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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>
</html>