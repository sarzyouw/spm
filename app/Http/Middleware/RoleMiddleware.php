<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$levels)
{
    if (!Session::has('logged_in')) {
        return redirect()->route('login');
    }

    // Ubah ke intval agar aman saat pengecekan in_array
    $userLevel = intval(Session::get('level'));
    
    // Konversi semua parameter levels menjadi integer
    $allowedLevels = array_map('intval', $levels);

    if (in_array($userLevel, $allowedLevels)) {
        return $next($request);
    }

    abort(403);
}
}