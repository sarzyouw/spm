<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SPM STMI Jakarta')</title>

    {{-- Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary-color: #002c77;
            --secondary-color: #007bff;
            --light-bg: #f6f9fc;
            --dark-bg: #001a4d;
            --text-color: #333;
            --text-dark: #444;
            --accent-color: #ffe600;
            --hover-bg: #e9f3ff;
            --footer-bg: #003399;
            --active-blue: #00a6ff;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            scroll-behavior: smooth;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: 700;
            color: var(--primary-color);
        }

        /* 🔹 Top Bar */
        .top-bar {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            color: white;
            font-size: 0.85rem;
            padding: 0.5rem 0;
        }

        .top-bar a {
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .top-bar a:hover {
            color: var(--accent-color);
        }

        /* 🔹 Navbar Custom */
        .navbar-custom {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
        }

        .navbar-nav {
            gap: 0.3rem;
        }


        .navbar-custom .nav-link {
            color: var(--primary-color);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 0.8rem 1rem;
        }

        /* 3. NAVBAR NYALA (ACTIVE STATE) */
        /* Berwarna biru muda saat di klik atau saat dropdown terbuka */
        .navbar-custom .nav-link.active,
        .navbar-custom .nav-link.show,
        .dropdown-item.active {
            color: var(--active-blue) !important;
            font-weight: 700;
        }

        /* 1. POSISI MENU TENGAH */
        .navbar-collapse {
            justify-content: center;
        }

        .navbar-custom .nav-link.active,
        .navbar-custom .dropdown-toggle.active {
            color: var(--active-blue) !important;
            font-weight: 700;
        }

        .dropdown-menu .dropdown-item.active {
            background-color: var(--hover-bg);
            color: var(--active-blue);
            font-weight: 600;
        }


        /* 🔹 Dropdown */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }

        .dropdown-item {
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.6rem 1.2rem;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>a::after {
            content: "\F285";
            font-family: "bootstrap-icons";
            border: none;
            float: right;
            font-size: 0.8rem;
            margin-top: 3px;
            margin-left: 10px;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            /* Inilah yang membuatnya geser ke kanan */
            margin-top: -6px;
            /* Menyelaraskan tinggi dengan item induk */
            margin-left: 0;
            border-radius: 8px;
            display: none;
            /* Sembunyikan dulu */
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Tampilkan ke samping saat di-hover */
        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
            animation: slideInRight 0.2s ease-out;
        }

        @media (min-width: 992px) {

            .navbar .dropdown:hover>.dropdown-menu,
            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }
        }

        /* Hanya targetkan profil, tidak akan mengganggu navbar lain */
        .profile-only-click:hover .dropdown-menu {
            display: none !important;
            /* Paksa sembunyi saat kursor nempel */
        }

        .profile-only-click .dropdown-menu.show {
            display: block !important;
            /* Paksa muncul HANYA jika sudah diklik (class .show aktif) */
        }

        /* 🔹 Login Modal */
        #loginModal .modal-content {
            border-radius: 1.5rem;
            border: none;
        }

        #loginModal .modal-header {
            border: none;
            text-align: center;
        }

        #loginModal .btn-custom-primary {
            background-color: var(--primary-color);
            color: white;
            border-radius: 0.5rem;
            padding: 0.6rem;
            font-weight: 700;
        }

        /* 🔹 Search Overlay */
        .search-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .search-overlay.show {
            display: flex;
        }

        .search-container {
            width: 90%;
            max-width: 600px;
            display: flex;
            border-radius: 50px;
            overflow: hidden;
        }

        /* 🔹 Scroll Top */
        .scroll-to-top {
            display: none;
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 45px;
            height: 45px;
            background: var(--secondary-color);
            color: white;
            border-radius: 8px;
            text-align: center;
            line-height: 45px;
            z-index: 1000;
        }

        .hero-section {
            background-image: linear-gradient(rgba(0, 44, 119, 0.6), rgba(0, 44, 119, 0.6)),
            url("{{ asset('images/gedung.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: left;
            /* Mengikuti gambar kanan yang teksnya di kiri/tengah */
            padding: 150px 0;
            display: flex;
            align-items: center;
        }

        .hero-section h1 {
            font-size: 4.2rem;
            font-weight: 900;
            /* lebih bold */
            color: #ffffff !important;
            letter-spacing: 1px;
            line-height: 1.2;
            text-shadow:
                3px 3px 12px rgba(0, 0, 0, 0.6);
        }

        .hero-section p {
            font-size: 1.5rem;
            color: white;
            opacity: 0.9;
        }

        /* 🔹 Footer Biru */
        footer {
            background-color: var(--footer-bg) !important;
            color: white !important;
            padding: 60px 0 20px;
        }

        footer h5 {
            color: white !important;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        footer a {
            color: rgba(255, 255, 255, 0.8) !important;
            text-decoration: none;
        }

        footer a:hover {
            color: var(--accent-color) !important;
        }

        footer .border-top {
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        .news-item {
            padding: 20px 0;
            border-bottom: 1px solid #eee;
            transition: 0.3s;
        }

        .news-item:hover {
            background-color: #f8f9fa;
        }

        .news-title {
            font-weight: 700;
            color: #000;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .news-title:hover {
            color: var(--active-blue);
        }

        .news-meta {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 8px;
        }

        .custom-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
        }

        .custom-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 44, 119, 0.1) !important;
        }

        .news-title-hover {
            transition: color 0.2s ease;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 3rem;
        }

        .news-title-hover:hover {
            color: #00a6ff !important;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .fw-800 {
            font-weight: 800;
        }

        .lead-sm {
            font-size: 1.05rem;
        }

        .org-chart-wrapper {
            background: linear-gradient(145deg, #f8f9fa 0%, #ffffff 100%);
        }

        .hover-zoom:hover {
            transform: scale(1.02);
            cursor: pointer;
        }

        .transition-hover {
            transition: all 0.3s ease;
        }

        .transition-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .1) !important;
        }

        /* Styling Breadcrumb */
        .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Animasi sederhana untuk ikon */
        .icon-shape i {
            transition: transform 0.3s ease;
        }

        .card:hover .icon-shape i {
            transform: rotate(15deg) scale(1.2);
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    {{-- Modal Login --}}
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 380px;">
            <div class="modal-content p-3">
                <div class="modal-header justify-content-center">
                    <h2 class="modal-title h4">Login</h2>
                </div>
                <div class="modal-body">
                    @if(session('login_error'))
                    <div class="alert alert-danger small text-center mb-3">
                        {{ session('login_error') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="loginPassword" class="form-control" placeholder="" required style="border-right: none;">
                                <button class="btn border shadow-none" type="button" id="togglePassword" style="border-left: none; background: #fff; border-color: #dee2e6;">
                                    <i class="bi bi-eye-slash text-muted"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-custom-primary">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Search Overlay --}}
    <div id="searchOverlay" class="search-overlay">
        <span id="closeSearch" class="position-absolute top-0 end-0 m-4 fs-1 text-white" style="cursor:pointer">&times;</span>
        <form action="/berita" method="GET" class="search-container shadow">
            <input type="text" name="q" placeholder="Cari Berita..." class="form-control border-0 py-3 px-4">
            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <a href="#" id="scrollToTopBtn" class="scroll-to-top shadow"><i class="bi bi-chevron-up"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Scroll To Top Logic
        const scrollBtn = document.getElementById("scrollToTopBtn");
        window.onscroll = () => {
            scrollBtn.style.display = (window.scrollY > 300) ? "block" : "none";
        };
        scrollBtn.onclick = (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        };

        // Search Overlay Logic
        const sOverlay = document.getElementById('searchOverlay');
        document.getElementById('openSearch')?.addEventListener('click', (e) => {
            e.preventDefault();
            sOverlay.classList.add('show');
        });
        document.getElementById('closeSearch')?.addEventListener('click', () => sOverlay.classList.remove('show'));
        // Fitur Toggle Password Lihat/Sembunyi
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const passwordInput = document.getElementById('loginPassword');
            const eyeIcon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
                eyeIcon.classList.remove('text-muted');
                eyeIcon.classList.add('text-primary'); // Opsional: warna berubah saat aktif
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
                eyeIcon.classList.remove('text-primary');
                eyeIcon.classList.add('text-muted');
            }
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-in-out'
        });
    </script>

    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil',
            html: `{!! session('success') !!}`,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    @if(session('login_error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });
    </script>
    @endif
</body>

</html>