<div class="modal fade" id="editProfilModal" tabindex="-1" aria-labelledby="editProfilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfilModalLabel">Edit Profil Desa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.profil-desa.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamatKantor" class="form-label">Alamat Kantor</label>
                                <input type="text" class="form-control" id="alamatKantor" name="alamat_kantor" value="{{ old('alamat_kantor', $profilDesa->alamat_kantor) }}">
                            </div>
                            <div class="mb-3">
                                <label for="teleponKantor" class="form-label">Telepon Kantor</label>
                                <input type="text" class="form-control" id="teleponKantor" name="telepon_kantor" value="{{ old('telepon_kantor', $profilDesa->telepon_kantor) }}">
                            </div>
                            <div class="mb-3">
                                <label for="emailKantor" class="form-label">Email Kantor</label>
                                <input type="email" class="form-control" id="emailKantor" name="email_kantor" value="{{ old('email_kantor', $profilDesa->email_kantor) }}">
                            </div>
                            <div class="mb-3">
                                <label for="linkFacebook" class="form-label">Link Facebook</label>
                                <input type="url" class="form-control" id="linkFacebook" name="link_facebook" value="{{ old('link_facebook', $profilDesa->link_facebook) }}">
                            </div>
                            <div class="mb-3">
                                <label for="linkInstagram" class="form-label">Link Instagram</label>
                                <input type="url" class="form-control" id="linkInstagram" name="link_instagram" value="{{ old('link_instagram', $profilDesa->link_instagram) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="linkTiktok" class="form-label">Link TikTok</label>
                                <input type="url" class="form-control" id="linkTiktok" name="link_tiktok" value="{{ old('link_tiktok', $profilDesa->link_tiktok) }}">
                            </div>
                            <div class="mb-3">
                                <label for="linkYoutube" class="form-label">Link YouTube</label>
                                <input type="url" class="form-control" id="linkYoutube" name="link_youtube" value="{{ old('link_youtube', $profilDesa->link_youtube) }}">
                            </div>
                            <div class="mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $profilDesa->latitude) }}">
                            </div>
                            <div class="mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $profilDesa->longitude) }}">
                            </div>
                             <div class="mb-3">
                                <label for="namaDesaStat" class="form-label">Nama Desa (Statistik)</label>
                                <input type="text" class="form-control" id="namaDesaStat" name="statistik_desa[nama_desa]" value="{{ old('statistik_desa.nama_desa', $profilDesa->statistik_desa['nama_desa'] ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="populasi" class="form-label">Populasi (jiwa) (Statistik)</label>
                                <input type="number" class="form-control" id="populasi" name="statistik_desa[populasi]" value="{{ old('statistik_desa.populasi', $profilDesa->statistik_desa['populasi'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="rumahTangga" class="form-label">Rumah Tangga (KK) (Statistik)</label>
                                <input type="number" class="form-control" id="rumahTangga" name="statistik_desa[rumah_tangga]" value="{{ old('statistik_desa.rumah_tangga', $profilDesa->statistik_desa['rumah_tangga'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="luasWilayah" class="form-label">Luas Wilayah (km²) (Statistik)</label>
                                <input type="text" class="form-control" id="luasWilayah" name="statistik_desa[luas_wilayah]" value="{{ old('statistik_desa.luas_wilayah', $profilDesa->statistik_desa['luas_wilayah'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="jumlahDusun" class="form-label">Jumlah Dusun (Statistik)</label>
                                <input type="number" class="form-control" id="jumlahDusun" name="statistik_desa[jumlah_dusun]" value="{{ old('statistik_desa.jumlah_dusun', $profilDesa->statistik_desa['jumlah_dusun'] ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kecamatanStat" class="form-label">Kecamatan (Statistik)</label>
                                <input type="text" class="form-control" id="kecamatanStat" name="statistik_desa[kecamatan]" value="{{ old('statistik_desa.kecamatan', $profilDesa->statistik_desa['kecamatan'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="kabupatenStat" class="form-label">Kabupaten (Statistik)</label>
                                <input type="text" class="form-control" id="kabupatenStat" name="statistik_desa[kabupaten]" value="{{ old('statistik_desa.kabupaten', $profilDesa->statistik_desa['kabupaten'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="provinsiStat" class="form-label">Provinsi (Statistik)</label>
                                <input type="text" class="form-control" id="provinsiStat" name="statistik_desa[provinsi]" value="{{ old('statistik_desa.provinsi', $profilDesa->statistik_desa['provinsi'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="kodePosStat" class="form-label">Kode Pos (Statistik)</label>
                                <input type="text" class="form-control" id="kodePosStat" name="statistik_desa[kode_pos]" value="{{ old('statistik_desa.kode_pos', $profilDesa->statistik_desa['kode_pos'] ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sejarahDesa" class="form-label">Sejarah Desa</label>
                        <textarea class="form-control" id="sejarahDesa" name="sejarah_desa" rows="5">{{ old('sejarah_desa', $profilDesa->sejarah_desa) }}</textarea>
                    </div>
                    {{-- Perubahan di sini: pisahkan visi dan misi --}}
                    <div class="mb-3">
                        <label for="visi" class="form-label">Visi</label>
                        <textarea class="form-control" id="visi" name="visi" rows="3">{{ old('visi', $profilDesa->visi) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="misi" class="form-label">Misi</label>
                        <textarea class="form-control" id="misi" name="misi" rows="3">{{ old('misi', $profilDesa->misi) }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>