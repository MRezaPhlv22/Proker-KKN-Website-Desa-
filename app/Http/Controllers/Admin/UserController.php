<?php

namespace App\Http\Controllers\Admin; // Perhatikan namespace Admin

use App\Http\Controllers\Controller;
use App\Models\User; // Import model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Illuminate\Validation\Rule; // Untuk validasi unique email saat update
use Illuminate\Support\Facades\Auth; // <<<--- TAMBAHKAN BARIS INI UNTUK MEMBANTU INTELEPHENSE

class UserController extends Controller
{
    /**
     * Tampilkan daftar pengguna.
     * Metode ini tidak akan dipanggil langsung melalui route users.index,
     * karena daftar users akan dimuat melalui AdminController@index dan di-include di dashboard.blade.php.
     * Disediakan jika Anda ingin mengaksesnya secara terpisah.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.sections.users_section', compact('users'));
    }

    /**
     * Simpan pengguna baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard', ['#users'])->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Perbarui pengguna yang ada.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'], // <<<--- LENGKAPI VALIDASI PASSWORD
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.dashboard', ['#users'])->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Hapus pengguna.
     */
    public function destroy(User $user)
    {
        // Pencegahan: Jangan biarkan admin menghapus dirinya sendiri jika ada admin lain
        // Menggunakan Auth::check() dan Auth::id() secara eksplisit
        if (Auth::check() && $user->id === Auth::id()) { // <<<--- PERBAIKAN UNTUK INTELEPHENSE
            return redirect()->route('admin.dashboard', ['#users'])->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.dashboard', ['#users'])->with('success', 'Pengguna berhasil dihapus.');
    }
}