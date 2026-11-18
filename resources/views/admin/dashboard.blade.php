<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Desa Lembang</title>
    <link rel="icon" href="{{ asset('images/logo-garut.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* (Gaya CSS yang sama seperti sebelumnya, tidak ada perubahan) */
        :root {
            --primary-color: #28a745;
            --secondary-color: #198754;
            --sidebar-width: 280px;
        }

        body {
            background-color: #f8f9fa;
            font-size: 14px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            overflow-y: auto; /* Tambahkan ini jika belum ada untuk scroll sidebar */
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand {
            font-size: 1.4rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-menu-item {
            padding: 0.75rem 1.5rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .sidebar-menu-item:hover,
        .sidebar-menu-item.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh; /* Pastikan ini 100vh agar konten bisa scroll */
            transition: margin-left 0.3s ease;
        }

        .top-navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-area {
            padding: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border: none;
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-3px);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .content-section {
            display: none;
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            margin-top: 2rem;
        }

        .content-section.active {
            display: block;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .table-container {
            overflow-x: auto;
        }

        .action-buttons .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
            margin: 0 2px;
        }

        .modal-header {
            background-color: var(--primary-color);
            color: white;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                width: 250px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: block;
            }
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-color);
            padding: 0;
        }

        /* Gaya Khusus untuk Cetak */
        @media print {
            body {
                background-color: white !important;
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif; /* Font yang lebih umum untuk cetak */
                color: #000;
            }

            /* Sembunyikan elemen UI yang tidak perlu dicetak */
            .sidebar,
            .top-navbar,
            .mobile-menu-btn,
            .modal-footer,
            .modal-header .btn-close,
            .content-section:not(.active), /* Hanya cetak section yang aktif */
            .no-print, /* Kelas baru untuk menyembunyikan elemen tertentu */
            .pagination-links { /* Sembunyikan pagination */
                display: none !important;
            }

            /* Tampilkan konten utama secara penuh */
            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
                min-height: auto !important; /* Biarkan konten memanjang sesuai kebutuhan */
                padding: 20px; /* Tambahkan padding agar tidak terlalu mepet */
            }

            .content-area {
                padding: 0 !important; /* Hapus padding yang mungkin ada */
            }

            /* Gaya Tabel */
            table {
                width: 100% !important;
                border-collapse: collapse;
                margin-top: 20px;
                page-break-inside: auto; /* Memungkinkan tabel terpotong di halaman */
            }
            thead {
                display: table-header-group; /* Agar header tabel berulang di setiap halaman */
            }
            tr {
                page-break-inside: avoid; /* Hindari pemotongan baris di tengah */
                page-break-after: auto;
            }
            th, td {
                border: 1px solid #aaa !important; /* Border lebih jelas */
                padding: 8px 12px !important; /* Padding lebih nyaman */
                text-align: left;
                vertical-align: top; /* Rata atas untuk konten yang panjang */
            }
            th {
                background-color: #f2f2f2 !important; /* Background header abu-abu muda */
                color: #333 !important;
                font-weight: bold !important;
            }
            .table-striped tbody tr:nth-child(odd) {
                background-color: #f9f9f9 !important; /* Warna selang-seling lebih lembut */
            }

            /* Sembunyikan gambar kecil di dalam tabel (seperti foto profil/UMKM) */
            img.rounded, img.rounded-circle {
                display: none !important;
            }

            /* Menyesuaikan tampilan agar lebih rapi saat dicetak */
            .table-container {
                overflow-x: visible !important; /* Pastikan tabel tidak terpotong horizontal */
            }

            /* Judul cetak (opsional, bisa ditambahkan via JS atau di setiap section) */
            h2 {
                font-size: 20px;
                margin-bottom: 15px;
                text-align: center;
                color: #333;
            }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
            <img src="{{ asset('images/logo-garut.png ') }}" alt="Logo Kabupaten Garut" style="height: 40px;">
            Admin Desa Lembang
            </a>
        </div>

        <nav class="sidebar-menu">
            <button class="sidebar-menu-item active" onclick="showSection('dashboard', this)">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </button>
            <button class="sidebar-menu-item" onclick="showSection('profil', this)">
                <i class="bi bi-file-text"></i>
                Profil Desa
            </button>
            <button class="sidebar-menu-item" onclick="showSection('pemerintahan', this)">
                <i class="bi bi-people"></i>
                Pemerintahan
            </button>
            <button class="sidebar-menu-item" onclick="showSection('umkm', this)">
                <i class="bi bi-shop"></i>
                Data UMKM
            </button>
            <button class="sidebar-menu-item" onclick="showSection('produk', this)">
                <i class="bi bi-box"></i>
                Produk UMKM
            </button>
            <button class="sidebar-menu-item" onclick="showSection('galeri', this)">
                <i class="bi bi-images"></i>
                Galeri
            </button>
            <button class="sidebar-menu-item" onclick="showSection('users', this)">
                <i class="bi bi-people-fill"></i>
                Manajemen Pengguna
            </button>
        </nav>
    </div>

    <div class="main-content">
        <div class="top-navbar">
            <button class="mobile-menu-btn" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <div class="d-flex align-items-center ms-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-2"></i>Admin
                    </button>
                    <ul class="dropdown-menu">
                        
                        <li><a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>

        <div class="content-area">
            {{-- Menampilkan pesan sukses atau error dari session --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Include sections, passing data --}}
            @include('admin.sections.dashboard_section')
            @include('admin.sections.profil_section', ['profilDesa' => $profilDesa])
            @include('admin.sections.pemerintahan_section', ['pemerintahan' => $pemerintahan])
            @include('admin.sections.umkm_section', ['umkms' => $umkms])
            @include('admin.sections.produk_section', ['produks' => $produks, 'umkms' => $umkms])
            @include('admin.sections.galeri_section', ['galeri' => $galeri])
            @include('admin.sections.users_section', ['users' => $users])
        </div>
    </div>

    @include('admin.modals.edit_profil_modal', ['profilDesa' => $profilDesa])
    @include('admin.modals.tambah_pemerintahan_modal')
    @include('admin.modals.edit_pemerintahan_modal')
    @include('admin.modals.tambah_umkm_modal')
    @include('admin.modals.edit_umkm_modal')
    {{-- Passing $umkms to produk modals for dropdown --}}
    @include('admin.modals.tambah_produk_modal', ['umkms' => $umkms])
    @include('admin.modals.edit_produk_modal', ['umkms' => $umkms])
    @include('admin.modals.tambah_galeri_modal')
    @include('admin.modals.edit_galeri_modal')
    @include('admin.modals.tambah_user_modal') {{-- Tambahkan ini --}}
    @include('admin.modals.edit_user_modal') {{-- Tambahkan ini --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function showSection(sectionId, clickedButton) {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            document.getElementById(sectionId).classList.add('active');

            const menuItems = document.querySelectorAll('.sidebar-menu-item');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });

            if (clickedButton) {
                clickedButton.classList.add('active');
            }

            // Update URL hash without reloading the page
            history.pushState(null, '', `#${sectionId}`);

            // For mobile: close sidebar after selection
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth <= 768 && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.mobile-menu-btn');

            if (window.innerWidth <= 768 && sidebar.classList.contains('active')) {
                if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            const urlHash = window.location.hash.substring(1);
            let defaultSection = 'dashboard';

            if (urlHash && document.getElementById(urlHash)) {
                defaultSection = urlHash;
            } else if (window.location.search.includes('umkm_page=')) {
                defaultSection = 'umkm';
            } else if (window.location.search.includes('pemerintahan_page=')) {
                defaultSection = 'pemerintahan';
            } else if (window.location.search.includes('galeri_page=')) { // Tambahkan ini
                defaultSection = 'galeri'; // Tambahkan ini
            }

            const activeButton = document.querySelector(`.sidebar-menu-item[onclick*="${defaultSection}"]`);
            if (activeButton) {
                showSection(defaultSection, activeButton);
            } else {
                showSection('dashboard', document.querySelector('.sidebar-menu-item.active'));
            }

            // Tambahkan event listener untuk tautan pagination
            document.body.addEventListener('click', function(e) {
                if (e.target.matches('.pagination a')) {
                    e.preventDefault(); // Mencegah navigasi default

                    const url = new URL(e.target.href);
                    const currentHash = window.location.hash;

                    // Ambil parameter pagination yang relevan dari URL yang diklik
                    const umkmPageParam = url.searchParams.get('umkm_page');
                    const pemerintahanPageParam = url.searchParams.get('pemerintahan_page');
                    const galeriPageParam = url.searchParams.get('galeri_page'); // Tambahkan ini

                    // Hapus semua parameter pagination dari URL saat ini sebelum menambahkan yang baru
                    // Ini penting agar hanya parameter yang relevan untuk section aktif yang ada
                    let currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.delete('umkm_page');
                    currentUrl.searchParams.delete('pemerintahan_page');
                    currentUrl.searchParams.delete('galeri_page'); // Tambahkan ini

                    // Tambahkan kembali parameter pagination yang baru jika ada
                    if (umkmPageParam) {
                        currentUrl.searchParams.set('umkm_page', umkmPageParam);
                    }
                    if (pemerintahanPageParam) {
                        currentUrl.searchParams.set('pemerintahan_page', pemerintahanPageParam);
                    }
                    if (galeriPageParam) { // Tambahkan ini
                        currentUrl.searchParams.set('galeri_page', galeriPageParam); // Tambahkan ini
                    }

                    // Tambahkan hash URL aktif
                    if (currentHash) {
                        currentUrl.hash = currentHash;
                    }

                    // Arahkan ke URL baru
                    window.location.href = currentUrl.toString();
                }
            });

            // JavaScript untuk mengisi data modal Edit UMKM (tetap sama)
            var editUmkmModal = document.getElementById('editUmkmModal');
            if (editUmkmModal) {
                editUmkmModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var id = button.getAttribute('data-id');
                    var nama = button.getAttribute('data-nama');
                    var pemilik = button.getAttribute('data-pemilik');
                    var kategori = button.getAttribute('data-kategori');
                    var alamat = button.getAttribute('data-alamat');
                    var kontak = button.getAttribute('data-kontak');
                    var gambar = button.getAttribute('data-gambar');

                    var modalTitle = editUmkmModal.querySelector('.modal-title');
                    var form = editUmkmModal.querySelector('form');
                    var inputNama = editUmkmModal.querySelector('#editUmkmNama');
                    var inputPemilik = editUmkmModal.querySelector('#editUmkmPemilik');
                    var inputKategori = editUmkmModal.querySelector('#editUmkmKategori');
                    var inputAlamat = editUmkmModal.querySelector('#editUmkmAlamat');
                    var inputKontak = editUmkmModal.querySelector('#editUmkmKontak');
                    var currentImageText = editUmkmModal.querySelector('#currentUmkmImage');

                    modalTitle.textContent = 'Edit Data UMKM: ' + nama;
                    form.action = '/admin/umkm/' + id;
                    inputNama.value = nama;
                    inputPemilik.value = pemilik;
                    inputKategori.value = kategori;
                    inputAlamat.value = alamat;
                    inputKontak.value = kontak;

                    if (gambar) {
                        var fileName = gambar.substring(gambar.lastIndexOf('/') + 1);
                        currentImageText.innerHTML = `Gambar saat ini: <a href="${gambar}" target="_blank">${fileName}</a>`;
                    } else {
                        currentImageText.textContent = 'Tidak ada gambar saat ini.';
                    }
                });
            }

            // JavaScript untuk mengisi data modal Edit Pemerintahan (tetap sama)
            var editPemerintahanModal = document.getElementById('editPemerintahanModal');
            if (editPemerintahanModal) {
                editPemerintahanModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var id = button.getAttribute('data-id');
                    var nama = button.getAttribute('data-nama');
                    var jabatan = button.getAttribute('data-jabatan');
                    var deskripsi = button.getAttribute('data-deskripsi');
                    var foto = button.getAttribute('data-foto');

                    var modalTitle = editPemerintahanModal.querySelector('.modal-title');
                    var form = editPemerintahanModal.querySelector('form');
                    var inputNama = editPemerintahanModal.querySelector('#editPemerintahanNama');
                    var inputJabatan = editPemerintahanModal.querySelector('#editPemerintahanJabatan');
                    var inputDeskripsi = editPemerintahanModal.querySelector('#editPemerintahanDeskripsi');
                    var currentFotoText = editPemerintahanModal.querySelector('#currentPemerintahanFoto');

                    modalTitle.textContent = 'Edit Pejabat: ' + nama;
                    form.action = '/admin/pemerintahan/' + id;
                    inputNama.value = nama;
                    inputJabatan.value = jabatan;
                    inputDeskripsi.value = deskripsi;

                    if (foto) {
                        var fileName = foto.substring(foto.lastIndexOf('/') + 1);
                        currentFotoText.innerHTML = `Foto saat ini: <a href="${foto}" target="_blank">${fileName}</a>`;
                    } else {
                        currentFotoText.textContent = 'Tidak ada foto saat ini.';
                    }
                });
            }

            // JavaScript untuk mengisi data modal Edit Produk (tetap sama)
            var editProdukModal = document.getElementById('editProdukModal');
            if (editProdukModal) {
                editProdukModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var id = button.getAttribute('data-id');
                    var namaProduk = button.getAttribute('data-nama-produk');
                    var umkmId = button.getAttribute('data-umkm-id');
                    var harga = button.getAttribute('data-harga');
                    var deskripsi = button.getAttribute('data-deskripsi');
                    var gambar = button.getAttribute('data-gambar');

                    var modalTitle = editProdukModal.querySelector('.modal-title');
                    var form = editProdukModal.querySelector('form');
                    var inputNamaProduk = editProdukModal.querySelector('#editProdukNama');
                    var inputUmkm = editProdukModal.querySelector('#editProdukUmkm');
                    var inputHarga = editProdukModal.querySelector('#editProdukHarga');
                    var inputDeskripsi = editProdukModal.querySelector('#editProdukDeskripsi');
                    var currentGambarText = editProdukModal.querySelector('#currentProdukGambar');

                    modalTitle.textContent = 'Edit Produk: ' + namaProduk;
                    form.action = '/admin/produk/' + id;
                    inputNamaProduk.value = namaProduk;
                    inputUmkm.value = umkmId;
                    inputHarga.value = harga;
                    inputDeskripsi.value = deskripsi;

                    if (gambar) {
                        var fileName = gambar.substring(gambar.lastIndexOf('/') + 1);
                        currentGambarText.innerHTML = `Gambar saat ini: <a href="${gambar}" target="_blank">${fileName}</a>`;
                    } else {
                        currentGambarText.textContent = 'Tidak ada gambar saat ini.';
                    }
                });
            }

            // JavaScript untuk mengisi data modal Edit Galeri (tetap sama)
            var editGaleriModal = document.getElementById('editGaleriModal');
            if (editGaleriModal) {
                editGaleriModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var id = button.getAttribute('data-id');
                    var judul = button.getAttribute('data-judul');
                    var deskripsi = button.getAttribute('data-deskripsi');
                    var file = button.getAttribute('data-file');

                    var modalTitle = editGaleriModal.querySelector('.modal-title');
                    var form = editGaleriModal.querySelector('form');
                    var inputJudul = editGaleriModal.querySelector('#editGaleriJudul');
                    var inputDeskripsi = editGaleriModal.querySelector('#editGaleriDeskripsi');
                    var currentFileText = editGaleriModal.querySelector('#currentGaleriFile');

                    modalTitle.textContent = 'Edit Foto Galeri: ' + judul;
                    form.action = '/admin/galeri/' + id;
                    inputJudul.value = judul;
                    inputDeskripsi.value = deskripsi;

                    if (file) {
                        var fileName = file.substring(file.lastIndexOf('/') + 1);
                        currentFileText.innerHTML = `File saat ini: <a href="${file}" target="_blank">${fileName}</a>`;
                    } else {
                        currentFileText.textContent = 'Tidak ada file saat ini.';
                    }
                });
            }

            // JavaScript untuk mengisi data modal Edit User (BARU)
            var editUserModal = document.getElementById('editUserModal');
            if (editUserModal) {
                editUserModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var id = button.getAttribute('data-id');
                    var name = button.getAttribute('data-name');
                    var email = button.getAttribute('data-email');

                    var modalTitle = editUserModal.querySelector('.modal-title');
                    var form = editUserModal.querySelector('form');
                    var inputName = editUserModal.querySelector('#editUserName');
                    var inputEmail = editUserModal.querySelector('#editUserEmail');

                    modalTitle.textContent = 'Edit Pengguna: ' + name;
                    form.action = '/admin/users/' + id;
                    inputName.value = name;
                    inputEmail.value = email;
                });
            }
        });
    </script>
</body>
</html>