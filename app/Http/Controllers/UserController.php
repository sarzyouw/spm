<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        // Middleware untuk membatasi akses hanya untuk Level 1 (Ketua) dan Level 2 (Admin)
        $this->middleware(function ($request, $next) {
            if (!in_array(session('level'), [1, 2])) {
                abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengelola Pengguna.');
            }
            return $next($request);
        });
    }

    /**
     * Menampilkan daftar semua pengguna.
     */
    public function index()
    {
        $users = User::orderBy('nama_pegawai')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Menampilkan form untuk menambah pengguna baru.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Menyimpan pengguna baru ke database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username'     => 'required|unique:pegawai,username|max:20',
            'nama_pegawai' => 'required|max:30',
            'level'        => 'required|in:1,2,3',
        ]);

        $defaultPassword = 'stmijakarta';

        // Mengisi created_at manual karena timestamps di model dimatikan
        $data['created_at'] = Carbon::now();

        // Penting: Pastikan kolom update_at bernilai NULL saat data baru dibuat
        $data['update_at'] = null;

        // Jika Anda tidak menggunakan hashing otomatis di Model, gunakan:
        // $data['password'] = bcrypt($request->password);

        // HASH PASSWORD (WAJIB)
        $data['password'] = Hash::make($defaultPassword);

        User::create($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Pengguna baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pengguna.
     */
    public function edit($username)
    {
        // Menggunakan primary key 'username' sesuai konfigurasi Model
        $user = User::where('username', $username)->firstOrFail();
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Memperbarui data pengguna di database.
     */
    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $data = $request->validate([
            // Validasi Unique kecuali untuk user yang sedang diedit
            'username'     => 'required|max:20|unique:pegawai,username,' . $user->username . ',username',
            'nama_pegawai' => 'required|max:30',
            'password'     => 'nullable|min:5|confirmed',
            'level'        => 'required|in:1,2,3',
        ]);

        // Hapus password dari array jika tidak ingin diubah
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }


        // PERBAIKAN KRITIS: Gunakan 'update_at' sesuai kolom di Database Anda
        $data['update_at'] = Carbon::now();

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Pengguna ' . $user->nama_pegawai . ' berhasil diperbarui.');
    }

    /**
     * Menghapus pengguna dari database.
     */
    public function destroy($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        // Pencegahan menghapus diri sendiri berdasarkan session
        if ($user->username === session('username')) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
        }

        $user->delete();

        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
