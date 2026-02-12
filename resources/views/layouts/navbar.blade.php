@php
    $isPengunjungLogin = session('logged_in') && session('level') == 3;
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- TOP BAR --}}
<div class="top-bar d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <span><i class="bi bi-envelope me-1"></i> <a href="mailto:spm@stmi.ac.id">spm@stmi.ac.id</a></span>
            <span class="opacity-50">|</span>
            <span><i class="bi bi-telephone me-1"></i> <a href="tel:02142886064">(021) 42886064</a></span>
            <span class="opacity-50">|</span>
            <span><i class="bi bi-whatsapp me-1"></i> <a href="https://wa.me/085155244455" target="_blank">0851-552-44455</a></span>
        </div>
        <div class="social-icons d-flex gap-3">
            <a href="https://x.com/stmijakarta" target="_blank"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.instagram.com/stmijakarta" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://web.facebook.com/PoliteknikSTMIJakarta" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://youtube.com/@politeknikstmijakarta" target="_blank"><i class="bi bi-youtube"></i></a>
        </div>
    </div>
</div>

{{-- MAIN NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a href="https://stmi.ac.id/" class="navbar-brand">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" height="45">
        </a>

        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>

                @if(!$isPengunjungLogin)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('profil.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
                        Profil
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->routeIs('profil.tentangspm') ? 'active' : '' }}" href="{{ route('profil.tentangspm') }}">Tentang SPM</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('profil.strukturorganisasi') ? 'active' : '' }}" href="{{ route('profil.strukturorganisasi') }}">Struktur Organisasi</a></li>
                    </ul>
                </li>
                @endif

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('spmi.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
                        SPMI
                    </a>
                    <ul class="dropdown-menu">

                         @if(!$isPengunjungLogin)
                        <li><a class="dropdown-item {{ request()->routeIs('spmi.tentangspmi') ? 'active' : '' }}" href="{{ route('spmi.tentangspmi') }}">Tentang SPMI</a></li>
                        @endif
                        
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Dokumen SPMI</a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item {{ request()->routeIs('spmi.dokumenspmi.kebijakanmutu') ? 'active' : '' }}" href="{{ route('spmi.dokumenspmi.kebijakanmutu') }}">Kebijakan Mutu</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('spmi.dokumenspmi.manualmutu') ? 'active' : '' }}" href="{{ route('spmi.dokumenspmi.manualmutu') }}">Manual Mutu</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('spmi.dokumenspmi.standarmutu') ? 'active' : '' }}" href="{{ route('spmi.dokumenspmi.standarmutu') }}">Standar Mutu</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('spmi.dokumenspmi.pendokumentasian') ? 'active' : '' }}" href="{{ route('spmi.dokumenspmi.pendokumentasian') }}">Pendokumentasian</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('spmi.auditmutuinternal') }}">Audit Mutu Internal</a></li>
                        <li><a class="dropdown-item" href="{{ route('spmi.hasilsurveykepuasan') }}">Hasil Survey Kepuasan</a></li>

                        <li><a class="dropdown-item" href="{{ route('spmi.dokumensop') }}">Dokumen SOP</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('spme.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
                        SPME
                    </a>
                    <ul class="dropdown-menu">

                        @if(!$isPengunjungLogin)
                        <li><a class="dropdown-item {{ request()->routeIs('spme.tentangspme') ? 'active' : '' }}" href="{{ route('spme.tentangspme') }}">Tentang SPME</a></li>
                        @endif

                        <li><a class="dropdown-item {{ request()->routeIs('spme.iapt') ? 'active' : '' }}" href="{{ route('spme.iapt') }}">Instrumen Akreditasi PT</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('spme.iap') ? 'active' : '' }}" href="{{ route('spme.iap') }}">Instrumen Akreditasi Prodi</a></li>
                    </ul>
                </li>
                
            </ul>

            <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                <button id="openSearch" class="btn p-0 text-primary border-0 me-1 shadow-none">
                    <i class="fas fa-search fs-5"></i>
                </button>

@if(session('logged_in'))
    @php
        // Mengambil Nama Lengkap, jika tidak ada baru gunakan username sebagai cadangan
        $display_name = session('nama_pegawai') ?? session('username') ?? 'User';
        $inisial = strtoupper(substr($display_name, 0, 1));
    @endphp

    <div class="dropdown profile-only-click">
        <button class="btn p-1 pe-3 border-0 bg-light rounded-pill d-flex align-items-center gap-2 shadow-sm profile-capsule"
            type="button"
            data-bs-toggle="dropdown"
            style="border: 1px solid rgba(0,0,0,0.08) !important; transition: all 0.3s ease;">

            <div class="avatar-circle-sm"
                style="width: 32px; height: 32px; background: linear-gradient(135deg, #002f9e 0%, #4361ee 100%); color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: 700; font-size: 0.85rem; box-shadow: 0 2px 4px rgba(0,47,158,0.2);">
                {{ $inisial }}
            </div>

            <div class="text-start d-none d-sm-block me-1">
                {{-- Bagian ini diubah menjadi $display_name (Nama Lengkap) --}}
                <p class="mb-0 fw-bold text-dark lh-1" style="font-size: 0.8rem;">{{ $display_name }}</p>
                <small class="text-muted" style="font-size: 0.65rem;">{{ session('level_name') }}</small>
            </div>

            <i class="fas fa-chevron-down text-muted" style="font-size: 0.7rem;"></i>
        </button>

        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2 p-2 rounded-4 animate fade-in" style="min-width: 190px;">
            <li>
                <a class="dropdown-item rounded-3 py-2 d-flex align-items-center gap-2" href="{{ route('password.form') }}">
                    <i class="fas fa-key text-muted" style="width: 20px;"></i>
                    <span>Ubah Password</span>
                </a>
            </li>

            <li><hr class="dropdown-divider mx-2"></li>

            <li>
                <form action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button type="submit" class="dropdown-item rounded-3 py-2 d-flex align-items-center gap-2 text-danger fw-medium">
                        <i class="fas fa-sign-out-alt" style="width: 20px;"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
@else
    <button class="btn btn-primary btn-sm rounded-pill px-4 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN</button>
@endif
            </div>
        </div>
    </div>
</nav>