<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SPM STMI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/stmi.png') }}" alt="Logo">
                <span class="fw-bold fs-5 text-primary">SPM STMI</span>
            </div>
            <h3>Menu Utama</h3>
            <a href="{{ route('admin.dashboard') }}" class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> <span>Dashboard</span>
            </a>
            <h3>Kelola Pengguna</h3>
            <a href="{{ route('admin.users.index') }}" class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-user-friends"></i> <span>Daftar Pengguna</span>
            </a>
            <h3>Manajemen Dokumen</h3>
            <a href="{{ route('admin.dokumen.index') }}" class="menu-item {{ request()->routeIs('admin.dokumen.*') ? 'active' : '' }}">
                <i class="fas fa-folder-open"></i> <span>Arsip Dokumen</span>
            </a>
        </nav>

        <div id="content">
            <nav class="navbar-custom">
                <button type="button" id="sidebarCollapse">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown profile-dropdown">
                    @php $nama_admin = session('nama_pegawai') ?? 'Admin'; @endphp
                    <a class="profile-trigger dropdown-toggle" id="profileMenu" data-bs-toggle="dropdown">
                        <span class="text-muted d-none d-sm-block small">Selamat datang, <b>{{ $nama_admin }}</b></span>
                        <img src="https://ui-avatars.com/api/?name={{ $nama_admin }}&background=0D8ABC&color=fff" class="profile-img">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-3">
                        <li class="text-center pb-2">
                            <h6 class="mb-0 fw-bold">{{ $nama_admin }}</h6>
                            <small class="text-muted">Sebagai Admin</small>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item rounded-3" href="{{ route('password.form') }}"><i class="fas fa-key me-2 text-muted"></i> Ubah Password</a></li>
                        <li><a class="dropdown-item text-danger rounded-3" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a></li>
                    </ul>
                </div>
            </nav>

            <div class="p-4">
                @yield('konten')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
    @yield('scripts')
</body>
</html>