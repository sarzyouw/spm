<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SPM STMI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard_ketua.css') }}">
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/stmi.png') }}" alt="Logo">
                <span class="fw-bold fs-5 text-primary">SPM STMI</span>
            </div>
            <h3>Menu Utama</h3>
            <a href="{{ route('ketua.dashboard') }}" class="menu-item {{ request()->routeIs('ketua.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> <span>Dashboard</span>
            </a>
            <h3>Kelola Validasi</h3>
            <a href="{{ route('ketua.validasi.tertunda') }}" class="menu-item {{ request()->routeIs('ketua.validasi.tertunda') ? 'active' : '' }}">
                <i class="fas fa-clock"></i> <span>Belum Validasi</span>
            </a>
            <a href="{{ route('ketua.dokumen.divalidasi') }}" class="menu-item {{ request()->routeIs('ketua.dokumen.divalidasi') ? 'active' : '' }}">
                <i class="fas fa-check-double"></i> <span>Sudah Validasi</span>
            </a>
        </nav>

        <div id="content">
            <nav class="navbar-custom">
                <button type="button" id="sidebarCollapse">
                    <i class="fas fa-bars"></i>
                </button>
                @php $nama_ketua = session('nama_pegawai') ?? 'Ketua'; @endphp
                <div class="dropdown profile-dropdown">
                    <a class="profile-trigger dropdown-toggle" id="profileMenu" data-bs-toggle="dropdown">
                        <span class="text-muted d-none d-sm-block small">Selamat datang, <b>{{ $nama_ketua }}</b></span>
                        <img src="https://ui-avatars.com/api/?name={{ $nama_ketua }}&background=0D8ABC&color=fff" class="profile-img">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-3">
                        <li class="text-center pb-2">
                            <h6 class="mb-0 fw-bold">{{ $nama_ketua }}</h6>
                            <small class="text-muted">Sebagai Ketua</small>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item rounded-6" href="{{ route('password.form') }}"><i class="fas fa-key me-2"></i> Ubah Password</a></li>
                        <li><a class="dropdown-item text-danger rounded-3" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a></li>
                    </ul>
                </div>
            </nav>

            <div class="p-4">
                @yield('konten_halaman')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
    @yield('script_halaman')
</body>
</html>