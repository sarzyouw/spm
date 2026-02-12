<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color: #f5f7fa; }
        .card-password { border: none; border-radius: 16px; box-shadow: 0 8px 25px rgba(0,0,0,0.08); }
        .form-control { border-radius: 10px; padding: 10px 14px; }
        .input-group-text { background: #fff; cursor: pointer; }
        .btn-primary { border-radius: 10px; padding: 10px; font-weight: 500; }
        
        /* Tambahan CSS sedikit untuk pesan validasi agar rapi */
        .btn-back { color: #707eae; text-decoration: none; font-size: 0.9rem; margin-bottom: 15px; display: inline-block; }
        .btn-back:hover { color: #002f9e; }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5">

        <div class="card card-password">
            <div class="card-body p-4">

                <div class="text-center mb-4">
                    <h5 class="fw-semibold mb-1">
                        <i class="bi bi-shield-lock me-1"></i> Ubah Password
                    </h5>
                    <small class="text-muted">Gunakan password yang kuat dan aman</small>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" id="pwForm">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Password Lama</label>
                        <div class="input-group">
                            <input type="password" id="old_password" name="old_password" class="form-control" required>
                            <span class="input-group-text" onclick="togglePassword('old_password', this)">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <div class="input-group">
                            <input type="password" id="new_password" name="new_password" class="form-control" required minlength="6">
                            <span class="input-group-text" onclick="togglePassword('new_password', this)">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                        <div id="new_pw_msg" class="text-danger small mt-1" style="display:none;"></div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                            <span class="input-group-text" onclick="togglePassword('new_password_confirmation', this)">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                        <div id="confirm_pw_msg" class="text-danger small mt-1" style="display:none;">Konfirmasi password tidak cocok!</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const form = document.getElementById('pwForm');
    const oldPw = document.getElementById('old_password');
    const newPw = document.getElementById('new_password');
    const confirmPw = document.getElementById('new_password_confirmation');
    
    const newMsg = document.getElementById('new_pw_msg');
    const confirmMsg = document.getElementById('confirm_pw_msg');

    // 1. Toggle Password (Tetap sama)
    function togglePassword(inputId, el) {
        const input = document.getElementById(inputId);
        const icon = el.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = "password";
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }

    // 2. Validasi Real-time
    function validate() {
        let isValid = true;

        // Peringatan jika PW Baru sama dengan PW Lama
        if (newPw.value === oldPw.value && newPw.value !== "") {
            newMsg.innerText = "Password baru tidak boleh sama dengan password lama!";
            newMsg.style.display = "block";
            isValid = false;
        } else if (newPw.value.length < 6 && newPw.value !== "") {
            newMsg.innerText = "Password minimal harus 6 karakter!";
            newMsg.style.display = "block";
            isValid = false;
        } else {
            newMsg.style.display = "none";
        }

        // Peringatan jika Konfirmasi tidak cocok
        if (confirmPw.value !== newPw.value && confirmPw.value !== "") {
            confirmMsg.style.display = "block";
            isValid = false;
        } else {
            confirmMsg.style.display = "none";
        }

        return isValid;
    }

    // Jalankan validasi setiap kali user mengetik
    newPw.addEventListener('input', validate);
    confirmPw.addEventListener('input', validate);
    oldPw.addEventListener('input', validate);

    // Mencegah form dikirim jika validasi gagal
    form.addEventListener('submit', function(e) {
        if (!validate()) {
            e.preventDefault();
            alert("Harap periksa kembali inputan Anda.");
        }
    });
</script>

</body>
</html>