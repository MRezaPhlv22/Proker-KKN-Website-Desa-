<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Desa Lembang Garut</title>
    <link rel="icon" href="{{ asset('images/logo-garut.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        /* Navbar Styling */
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
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.3));
        }

        /* Body padding untuk navbar fixed */
        body {
            padding-top: 76px;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .section-title {
            position: relative;
            margin-bottom: 50px;
            text-align: center;
            font-weight: bold;
            color: #333;
        }

        .section-title:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -15px;
            width: 80px;
            height: 3px;
            background-color: #28a745;
            transform: translateX(-50%);
        }

        /* Gallery Card Styling */
        .gallery-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .gallery-img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
            cursor: pointer; /* Menambahkan cursor pointer untuk menunjukkan bisa diklik */
        }

        .gallery-card:hover .gallery-img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-info {
            color: white;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .gallery-info {
            transform: translateY(0);
        }

        /* Pagination Styling */
        .pagination-wrapper {
            margin-top: 50px;
            text-align: center;
        }

        .pagination .page-link {
            color: #28a745;
            border: 1px solid #28a745;
            padding: 8px 15px;
            margin: 0 2px;
            border-radius: 5px;
        }

        .pagination .page-link:hover {
            background-color: #28a745;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }

        /* Modal untuk gambar */
        .modal-img {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
        }

        /* Footer Styling */
        footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            color: #28a745;
        }

        /* Breadcrumb */
        .breadcrumb-section {
            background: linear-gradient(135deg, #28a745, #20c997);
            padding: 40px 0;
            color: white;
        }

        .breadcrumb {
            background: transparent;
            margin: 0;
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            color: white;
        }

        .breadcrumb-item.active {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <img src="/images/logo-garut.png" alt="Logo Kabupaten Garut">
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
                        <a class="nav-link" href="{{ route('profildesa') }}"><i class="bi bi-file-text me-1"></i> Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('strukturdesa') }}"><i class="bi bi-people me-1"></i> Pemerintahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftarumkm') }}"><i class="bi bi-shop me-1"></i> UMKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('galeridesa') }}"><i class="bi bi-images me-1"></i> Galeri</a>
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

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">Galeri Desa Lembang</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active">Galeri</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-section">
        <div class="container">

            <div class="row" id="galleryContainer">
                @forelse($galeriItems as $item)
                <div class="col-lg-4 col-md-6 gallery-item" data-aos="fade-up">
                    <div class="card gallery-card position-relative">
                        @if($item->file)
                            <img src="{{ asset('storage/' . $item->file) }}" class="card-img gallery-img" alt="{{ $item->judul }}" onclick="openModal('{{ asset('storage/' . $item->file) }}', '{{ $item->judul }}')">
                        @else
                            <img src="https://via.placeholder.com/400x300?text=No+Image" class="card-img gallery-img" alt="No Image" onclick="openModal('https://via.placeholder.com/400x300?text=No+Image', '{{ $item->judul }}')">
                        @endif
                        <div class="gallery-overlay">
                             <div class="gallery-info">
                                <h5 class="mb-1">{{ $item->judul }}</h5>
                                   <p class="mb-0">{{ $item->deskripsi }}</p> {{-- Deskripsi penuh di overlay --}}
                            </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">{{ $item->judul }}</h6>
                                    <p class="card-text small text-muted">{{ $item->deskripsi }}</p> {{-- Deskripsi penuh di card body --}}
                            </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center">Belum ada foto atau video di galeri.</p>
                </div>
                @endforelse
            </div>

            <div class="pagination-wrapper" data-aos="fade-up">
                <nav aria-label="Gallery pagination">
                    <ul class="pagination justify-content-center">
                        @if ($galeriItems->lastPage() > 1)
                            <li class="page-item {{ ($galeriItems->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $galeriItems->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $galeriItems->lastPage(); $i++)
                                <li class="page-item {{ ($galeriItems->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $galeriItems->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ ($galeriItems->currentPage() == $galeriItems->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $galeriItems->nextPageUrl() }}">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <p class="text-muted mt-3" id="paginationStatus">Menampilkan {{ $galeriItems->count() }} dari {{ $galeriItems->total() }} foto</p>
            </div>
        </div>
    </section>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Galeri Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="" class="modal-img">
                </div>
            </div>
        </div>
    </div>

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
            <div class="text-center mt-4 border-top pt-3">
                <p>&copy; {{ date('Y') }} Desa Lembang. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });

        // Function to open the image modal
        function openModal(imageSrc, title) {
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            modalImage.src = imageSrc;
            modalTitle.textContent = title;
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show();
        }

        // Filter functionality (dihapus karena kategori sudah tidak ada)
        // document.addEventListener('DOMContentLoaded', function() {
        //     const filterButtons = document.querySelectorAll('.filter-btn');
        //     const galleryItems = document.querySelectorAll('.gallery-item');

        //     filterButtons.forEach(button => {
        //         button.addEventListener('click', function() {
        //             filterButtons.forEach(btn => btn.classList.remove('active'));
        //             this.classList.add('active');

        //             const filter = this.dataset.filter;

        //             galleryItems.forEach(item => {
        //                 if (filter === 'all' || item.dataset.category === filter) {
        //                     item.style.display = 'block';
        //                     AOS.refresh();
        //                 } else {
        //                     item.style.display = 'none';
        //                 }
        //             });
        //         });
        //     });
        // });
    </script>
</body>
</html>