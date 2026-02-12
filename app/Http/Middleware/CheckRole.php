<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!session()->has('level')) {
            return redirect()->route('login');
        }
        
        // Sesinya disimpan sebagai integer, rutenya string.
        // Konversi ke string agar in_array berfungsi 100% tanpa konflik tipe data.
        $currentLevel = (string)session('level'); 
        
        if (!in_array($currentLevel, $roles)) {
            abort(403, 'AKSES DITOLAK');
        }

        return $next($request);
    }
}