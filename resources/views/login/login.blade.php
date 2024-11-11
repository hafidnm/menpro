<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a; /* Warna latar belakang gelap */
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-wrapper {
            display: flex;
            background-color: #2c2c2c; /* Latar belakang kontainer */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Bayangan */
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }
        .login-image {
            flex: 1;
            background-image: url('storage/SMP.jpg'); /* Ganti dengan path gambar */
            background-size: cover;
            background-position: center;
        }
        .login-container {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-container h2 {
            color: #0dcaf0; /* Biru terang */
            margin-bottom: 20px;
        }
        .form-label {
            color: #adb5bd; /* Abu-abu terang untuk label */
        }
        .btn-primary {
            background-color: #0dcaf0; /* Warna tombol */
            border-color: #0dcaf0;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #0aa2bd;
            border-color: #0aa2bd;
        }
        .alert-danger {
            font-size: 0.9em;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Login Wrapper -->
    <div class="login-wrapper">
        <!-- Kolom Gambar -->
        <div class="login-image"></div>

        <!-- Kolom Formulir Login -->
        <div class="login-container">
            <h2>Login</h2>
            <p>Masuk untuk mengakses sistem presensi SMPN 1 Nogosari</p>
            <form action="{{ route('loginform') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                @if ($errors->has('login_error'))
                    <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
                @endif
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
