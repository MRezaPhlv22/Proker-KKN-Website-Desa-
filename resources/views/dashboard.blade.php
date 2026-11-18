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
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
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
            min-height: 100vh;
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
            <button class="sidebar-menu-item" onclick="showSection('kontak', this)">
                <i class="bi bi-person-lines-fill"></i>
                Kontak
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
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
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
            @include('admin.sections.profil_section')
            @include('admin.sections.pemerintahan_section', ['pemerintahan' => $pemerintahan])
            @include('admin.sections.umkm_section', ['umkms' => $umkms])
            @include('admin.sections.produk_section', ['produks' => $produks, 'umkms' => $umkms])
            @include('admin.sections.galeri_section', ['galeri' => $galeri])
            @include('admin.sections.kontak_section')
        </div>
    </div>

    @include('admin.modals.edit_profil_modal')
    @include('admin.modals.tambah_pemerintahan_modal')
    @include('admin.modals.edit_pemerintahan_modal')
    @include('admin.modals.tambah_umkm_modal')
    @include('admin.modals.edit_umkm_modal')
    {{-- Passing $umkms to produk modals for dropdown --}}
    @include('admin.modals.tambah_produk_modal', ['umkms' => $umkms])
    @include('admin.modals.edit_produk_modal', ['umkms' => $umkms])
    @include('admin.modals.tambah_galeri_modal')
    @include('admin.modals.edit_galeri_modal')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function showSection(sectionId, clickedButton) {
            // Hide all content sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            // Show the target section
            document.getElementById(sectionId).classList.add('active');

            // Remove 'active' class from all sidebar menu items
            const menuItems = document.querySelectorAll('.sidebar-menu-item');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });

            // Add 'active' class to the clicked sidebar menu item
            if (clickedButton) {
                clickedButton.classList.add('active');
            }

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

        // Optional: Close sidebar if clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.mobile-menu-btn');

            if (window.innerWidth <= 768 && sidebar.classList.contains('active')) {
                // Check if the click is outside the sidebar and not on the toggle button
                if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });

        // Set initial active section and menu item on page load
        document.addEventListener('DOMContentLoaded', (event) => {
            const urlHash = window.location.hash.substring(1);
            let defaultSection = 'dashboard';

            if (urlHash && document.getElementById(urlHash)) {
                defaultSection = urlHash;
            }

            const activeButton = document.querySelector(`.sidebar-menu-item[onclick*="${defaultSection}"]`);
            if (activeButton) {
                showSection(defaultSection, activeButton);
            } else {
                showSection('dashboard', document.querySelector('.sidebar-menu-item.active'));
            }

            // JavaScript untuk mengisi data modal Edit UMKM
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

            // JavaScript untuk mengisi data modal Edit Pemerintahan
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

            // JavaScript untuk mengisi data modal Edit Produk
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

            // JavaScript untuk mengisi data modal Edit Galeri
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
        });
    </script>
</body>
</html>