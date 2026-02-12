<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = DB::table('pegawai')
            ->where('username', session('username'))
            ->first();

        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        DB::table('pegawai')
            ->where('username', session('username'))
            ->update([
                'password' => Hash::make($request->new_password)
            ]);

        switch ($user->level) {
        case 1:
            return redirect()->route('ketua.dashboard')
                ->with('success', 'Password berhasil diubah.');
        case 2:
            return redirect()->route('admin.dashboard')
                ->with('success', 'Password berhasil diubah.');
        default:
            return redirect()->route('home')
                ->with('success', 'Password berhasil diubah.');
    }
}
}
