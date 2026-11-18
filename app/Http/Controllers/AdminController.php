<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Pemerintahan;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\DesaProfile;
use App\Models\User; // Import model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Illuminate\Validation\Rule; // Untuk validasi unique pada update
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     public function index()
    {
        // Mengambil data UMKM dengan pagination terpisah
        $umkms = Umkm::orderBy('created_at', 'asc')->paginate(10, ['*'], 'umkm_page'); // 'umkm_page' sebagai nama parameter query string

        // Mengambil data Pemerintahan dengan pagination terpisah
        $pemerintahan = Pemerintahan::orderBy('created_at', 'asc')->paginate(11, ['*'], 'pemerintahan_page'); // 'pemerintahan_page' sebagai nama parameter query string

        $produks = Produk::with('umkm')->latest()->get();
        $galeri = Galeri::latest()->paginate(8, ['*'], 'galeri_page'); // Tambahkan paginasi untuk Galeri, misalnya 8 item per halaman
        $profilDesa = DesaProfile::firstOrCreate([]);
        $users = User::latest()->get(); // Mengambil semua pengguna

        // --- Logika untuk Aktivitas Terbaru ---
        $activities = collect();

        $latestProduct = Produk::latest('updated_at')->with('umkm')->first();
        if ($latestProduct) {
            $activities->push([
                'type' => 'produk',
                'description' => 'Produk UMKM baru ditambahkan/diperbarui: ' . $latestProduct->nama_produk . ' (UMKM: ' . ($latestProduct->umkm->nama_umkm ?? 'N/A') . ')',
                'timestamp' => $latestProduct->updated_at,
                'icon' => 'bi-box-seam',
                'color' => 'text-success'
            ]);
        }

        if ($profilDesa && $profilDesa->updated_at) {
            $activities->push([
                'type' => 'profil_desa',
                'description' => 'Profil desa diperbarui',
                'timestamp' => $profilDesa->updated_at,
                'icon' => 'bi-pencil-square',
                'color' => 'text-primary'
            ]);
        }

        $latestGaleriItem = Galeri::latest('updated_at')->first();
        if ($latestGaleriItem) {
            $activities->push([
                'type' => 'galeri',
                'description' => 'Foto baru ditambahkan/diperbarui ke galeri: ' . $latestGaleriItem->judul,
                'timestamp' => $latestGaleriItem->updated_at,
                'icon' => 'bi-image',
                'color' => 'text-info'
            ]);
        }

        $latestPemerintahan = Pemerintahan::latest('updated_at')->first();
        if ($latestPemerintahan) {
            $activities->push([
                'type' => 'pemerintahan',
                'description' => 'Data pemerintahan diperbarui: ' . $latestPemerintahan->jabatan . ' - ' . $latestPemerintahan->nama,
                'timestamp' => $latestPemerintahan->updated_at,
                'icon' => 'bi-people-fill',
                'color' => 'text-warning'
            ]);
        }

        $latestUmkm = Umkm::latest('updated_at')->first();
        if ($latestUmkm) {
            $activities->push([
                'type' => 'umkm',
                'description' => 'Data UMKM diperbarui: ' . $latestUmkm->nama_umkm,
                'timestamp' => $latestUmkm->updated_at,
                'icon' => 'bi-shop',
                'color' => 'text-danger'
            ]);
        }

        $latestActivities = $activities->sortByDesc('timestamp')->take(5);

        return view('admin.dashboard', compact('umkms', 'pemerintahan', 'produks', 'galeri', 'profilDesa', 'latestActivities', 'users'));
    }

     public function getAllUmkms()
    {
        $umkms = Umkm::orderBy('created_at', 'asc')->get();
        return response()->json($umkms);
    }

    public function getAllPemerintahan()
    {
        $pemerintahan = Pemerintahan::orderBy('created_at', 'asc')->get();
        return response()->json($pemerintahan);
    }


    public function updateDesaProfile(Request $request)
    {
        $profile = DesaProfile::firstOrCreate([]);

        // Validasi disesuaikan dengan struktur input form yang baru (visi dan misi terpisah)
        $request->validate([
            'sejarah_desa' => 'nullable|string',
            'visi' => 'nullable|string', // Perubahan: validasi untuk kolom visi
            'misi' => 'nullable|string', // Perubahan: validasi untuk kolom misi
            'alamat_kantor' => 'nullable|string|max:255',
            'telepon_kantor' => 'nullable|string|max:255',
            'email_kantor' => 'nullable|email|max:255',
            'link_facebook' => 'nullable|url|max:255',
            'link_instagram' => 'nullable|url|max:255',
            'link_tiktok' => 'nullable|url|max:255',
            'link_youtube' => 'nullable|url|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',

            // Validasi untuk statistik_desa (akan menjadi array asosiatif)
            'statistik_desa.nama_desa' => 'nullable|string|max:255',
            'statistik_desa.populasi' => 'nullable|integer',
            'statistik_desa.rumah_tangga' => 'nullable|integer',
            'statistik_desa.luas_wilayah' => 'nullable|numeric',
            'statistik_desa.jumlah_dusun' => 'nullable|integer',
            'statistik_desa.kecamatan' => 'nullable|string|max:255',
            'statistik_desa.kabupaten' => 'nullable|string|max:255',
            'statistik_desa.provinsi' => 'nullable|string|max:255',
            'statistik_desa.kode_pos' => 'nullable|string|max:255',
        ]);

        // Laravel akan secara otomatis meng-handle input 'statistik_desa[key]' menjadi array
        $profile->update([
            'sejarah_desa' => $request->input('sejarah_desa'),
            'visi' => $request->input('visi'), // Perubahan: simpan ke kolom visi
            'misi' => $request->input('misi'), // Perubahan: simpan ke kolom misi
            'alamat_kantor' => $request->input('alamat_kantor'),
            'telepon_kantor' => $request->input('telepon_kantor'),
            'email_kantor' => $request->input('email_kantor'),
            'link_facebook' => $request->input('link_facebook'),
            'link_instagram' => $request->input('link_instagram'),
            'link_tiktok' => $request->input('link_tiktok'),
            'link_youtube' => $request->input('link_youtube'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'statistik_desa' => $request->input('statistik_desa'), // Akan di-cast ke JSON secara otomatis
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Profil Desa berhasil diperbarui!')->withFragment('profil');
    }

    // Metode untuk menghapus profil desa (berhati-hatilah dengan ini)
    public function destroyDesaProfile()
    {
        $profile = DesaProfile::first(); // Ambil profil pertama

        if ($profile) {
            $profile->delete();
            $message = 'Profil Desa berhasil dihapus!';
        } else {
            $message = 'Tidak ada Profil Desa untuk dihapus.';
        }

        return redirect()->route('admin.dashboard')->with('success', $message)->withFragment('profil');
    }

    // --- UMKM CRUD ---
    public function storeUmkm(Request $request)
    {
        $data = $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('umkm', 'public');
        } else {
            $data['gambar'] = null;
        }

        Umkm::create($data);
        return redirect()->route('admin.dashboard', ['#umkm'])->with('success', 'Data UMKM berhasil ditambahkan.');
    }

    public function updateUmkm(Request $request, Umkm $umkm)
    {
        $data = $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($umkm->gambar) {
                Storage::disk('public')->delete($umkm->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('umkm', 'public');
        }

        $umkm->update($data);
        return redirect()->route('admin.dashboard', ['#umkm'])->with('success', 'Data UMKM berhasil diupdate.');
    }

    public function destroyUmkm(Umkm $umkm)
    {
        if ($umkm->gambar) {
            Storage::disk('public')->delete($umkm->gambar);
        }
        $umkm->delete();
        return redirect()->route('admin.dashboard', ['#umkm'])->with('success', 'Data UMKM berhasil dihapus.');
    }

    // --- Pemerintahan CRUD ---
    // --- Pemerintahan CRUD ---
    public function storePemerintahan(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240' // Perubahan: max:2048 menjadi max:10240
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pemerintahan', 'public');
        } else {
            $data['foto'] = null;
        }

        Pemerintahan::create($data);
        return redirect()->route('admin.dashboard', ['#pemerintahan'])->with('success', 'Data pejabat berhasil ditambahkan.');
    }

    public function updatePemerintahan(Request $request, Pemerintahan $pemerintahan)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240' // Perubahan: max:2048 menjadi max:10240
        ]);

        if ($request->hasFile('foto')) {
            if ($pemerintahan->foto) {
                Storage::disk('public')->delete($pemerintahan->foto);
            }
            $data['foto'] = $request->file('foto')->store('pemerintahan', 'public');
        }

        $pemerintahan->update($data);
        return redirect()->route('admin.dashboard', ['#pemerintahan'])->with('success', 'Data pejabat berhasil diupdate.');
    }

    public function destroyPemerintahan(Pemerintahan $pemerintahan)
    {
        if ($pemerintahan->foto) {
            Storage::disk('public')->delete($pemerintahan->foto);
        }
        $pemerintahan->delete();
        return redirect()->route('admin.dashboard', ['#pemerintahan'])->with('success', 'Data pejabat berhasil dihapus.');
    }

    // --- Produk CRUD ---
    public function storeProduk(Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'umkm_id' => 'required|exists:umkms,id',
            // 'harga' => 'nullable|numeric', // DIUBAH DARI 'required|numeric' menjadi 'nullable|numeric'
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        } else {
            $data['gambar'] = null;
        }

        Produk::create($data);
        return redirect()->route('admin.dashboard', ['#produk'])->with('success', 'Data produk berhasil ditambahkan.');
    }

    public function updateProduk(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'umkm_id' => 'required|exists:umkms,id',
            // 'harga' => 'nullable|numeric', // DIUBAH DARI 'required|numeric' menjadi 'nullable|numeric'
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($data);
        return redirect()->route('admin.dashboard', ['#produk'])->with('success', 'Data produk berhasil diupdate.');
    }

    public function destroyProduk(Produk $produk)
    {
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }
        $produk->delete();
        return redirect()->route('admin.dashboard', ['#produk'])->with('success', 'Data produk berhasil dihapus.');
    }

    // --- Galeri CRUD ---
    public function storeGaleri(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240'
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        Galeri::create($data);
        return redirect()->route('admin.dashboard', ['#galeri'])->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function updateGaleri(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240'
        ]);

        if ($request->hasFile('file')) {
            if ($galeri->file) {
                Storage::disk('public')->delete($galeri->file);
            }
            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update($data);
        return redirect()->route('admin.dashboard', ['#galeri'])->with('success', 'Foto galeri berhasil diupdate.');
    }

    public function destroyGaleri(Galeri $galeri)
    {
        if ($galeri->file) {
            Storage::disk('public')->delete($galeri->file);
        }
        $galeri->delete();
        return redirect()->route('admin.dashboard', ['#galeri'])->with('success', 'Foto galeri berhasil dihapus.');
    }


       // --- Manajemen Pengguna CRUD ---
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard', ['#users'])->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed', // Password bisa kosong jika tidak ingin diubah
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.dashboard', ['#users'])->with('success', 'Data pengguna berhasil diupdate.');
    }

    public function destroyUser(User $user)
{
    // Pastikan Anda tidak menghapus akun yang sedang login.
    if (Auth::check() && Auth::user()->id === $user->id) {
        return redirect()->route('admin.dashboard', ['#users'])->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
    }

    $user->delete();
    return redirect()->route('admin.dashboard', ['#users'])->with('success', 'Pengguna berhasil dihapus.');
}
}