<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function reset(Request $request, $username)
    {
        // cari user
        $user = DB::table('pegawai')->where('username', $username)->first();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        // 1️⃣ generate password random
        $newPassword = 'stmijakarta';

        // 2️⃣ update password
        DB::table('pegawai')
            ->where('username', $username)
            ->update([
                'password' => Hash::make($newPassword)
            ]);

        // 3️⃣ simpan audit log
        DB::table('audit_logs')->insert([
            'admin_username' => session('username'),
            'action'         => 'RESET_PASSWORD',
            'target_user'    => $username,
            'description'    => 'Admin mereset password user',
            'created_at'     => now()
        ]);

        // 4️⃣ kirim password ke session
        return back()->with([
            'success'       => 'Password berhasil direset.',
            'new_password'  => $newPassword
        ]);
    }
}
