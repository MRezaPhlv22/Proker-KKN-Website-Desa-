<div id="profil" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-file-text me-2"></i>Profil Desa</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfilModal">
            <i class="bi bi-pencil me-2"></i>Edit Profil
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Informasi Umum</h5>
                    <table class="table table-borderless">
                        <tr>
                            <td width="30%" class="fw-bold">Alamat Kantor</td>
                            <td>: {{ $profilDesa->alamat_kantor ?? 'Belum disetel' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Telepon Kantor</td>
                            <td>: {{ $profilDesa->telepon_kantor ?? 'Belum disetel' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email Kantor</td>
                            <td>: {{ $profilDesa->email_kantor ?? 'Belum disetel' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Link Facebook</td>
                            <td>: <a href="{{ $profilDesa->link_facebook }}" target="_blank">{{ $profilDesa->link_facebook ?? 'Belum disetel' }}</a></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Link Instagram</td>
                            <td>: <a href="{{ $profilDesa->link_instagram }}" target="_blank">{{ $profilDesa->link_instagram ?? 'Belum disetel' }}</a></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Link TikTok</td>
                            <td>: <a href="{{ $profilDesa->link_tiktok }}" target="_blank">{{ $profilDesa->link_tiktok ?? 'Belum disetel' }}</a></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Link YouTube</td>
                            <td>: <a href="{{ $profilDesa->link_youtube }}" target="_blank">{{ $profilDesa->link_youtube ?? 'Belum disetel' }}</a></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Latitude</td>
                            <td>: {{ $profilDesa->latitude ?? 'Belum disetel' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Longitude</td>
                            <td>: {{ $profilDesa->longitude ?? 'Belum disetel' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Statistik Desa</h5>
                    <table class="table table-borderless">
                        <tr>
                            <td width="30%" class="fw-bold">Nama Desa</td>
                            <td>: {{ $profilDesa->statistik_desa['nama_desa'] ?? 'Belum disetel' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Kecamatan</td>
                            <td>: {{ $profilDesa->statistik_desa['kecamatan'] ?? 'Belum disetel' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Kabupaten</td>
                            <td>: {{ $profilDesa->statistik_desa['kabupaten'] ?? 'Belum disetel' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Provinsi</td>
                            <td>: {{ $profilDesa->statistik_desa['provinsi'] ?? 'Belum disetel' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Kode Pos</td>
                            <td>: {{ $profilDesa->statistik_desa['kode_pos'] ?? 'Belum disetel' }}</td>
                        </tr>
                         <td class="fw-bold">Populasi</td>
                            <td>: {{ isset($profilDesa->statistik_desa['populasi']) ? number_format($profilDesa->statistik_desa['populasi'], 0, ',', '.') : 'Belum disetel' }} jiwa</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Rumah Tangga</td>
                            <td>: {{ isset($profilDesa->statistik_desa['rumah_tangga']) ? number_format($profilDesa->statistik_desa['rumah_tangga'], 0, ',', '.') : 'Belum disetel' }} KK</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Luas Wilayah</td>
                            <td>: {{ $profilDesa->statistik_desa['luas_wilayah'] ?? 'Belum disetel' }} km²</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Jumlah Dusun</td>
                            <td>: {{ $profilDesa->statistik_desa['jumlah_dusun'] ?? 'Belum disetel' }} Dusun</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <h5>Sejarah Desa</h5>
            <p>{{ $profilDesa->sejarah_desa ?? 'Belum ada sejarah desa.' }}</p>
            <hr>
            <h5>Visi</h5>
            <p>{{ $profilDesa->visi ?? 'Belum ada visi.' }}</p> {{-- Perubahan di sini --}}
            <hr>
            <h5>Misi</h5>
            <p>{{ $profilDesa->misi ?? 'Belum ada misi.' }}</p> {{-- Perubahan di sini --}}
        </div>
    </div>
</div>