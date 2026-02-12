<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPM STMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        :root { --primary-color: #002c77; }
        body {
            min-height: 100vh; 
            background-color: var(--primary-color); 
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
        }
        /* Efek blur latar belakang sesuai foto 3 */
        .overlay-bg {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(8px);
            z-index: 1;
        }
        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 400px;
            padding: 15px;
        }
        .modal-content {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            background: white;
            padding: 2rem 1.5rem;
        }
        .modal-title {
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--primary-color);
            text-align: center;
            width: 100%;
            margin-bottom: 1.5rem;
        }
        .form-label { font-weight: 600; margin-bottom: 0.4rem; }
        .form-control {
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
        }
        .btn-custom-primary {
            background-color: var(--primary-color);
            color: white;
            font-weight: 700;
            padding: 0.75rem;
            border-radius: 0.75rem;
            border: none;
            width: 100%;
            margin-top: 1rem;
        }
        .btn-close-custom {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #999;
        }
    </style>
</head>
<body>

<div class="overlay-bg"></div>

<div class="login-container">
    <div class="modal-content">
        <button type="button" class="btn-close-custom" onclick="window.location.href='{{ route('home') }}'">&times;</button>
        <h2 class="modal-title">Login</h2>

        @if ($errors->any())
        <div class="alert alert-danger text-center py-2 mb-3 small">
            {{ $errors->first() }}
        </div>
        @endif

        {{-- Pesan Error dari Session Laravel --}}
        @if(session('login_error'))
            <div class="alert alert-danger text-center py-2 mb-3 small">
                {{ session('login_error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
            </div>
            
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-custom-primary shadow">Masuk</button>
        </form>
    </div>
</div>

</body>
</html>