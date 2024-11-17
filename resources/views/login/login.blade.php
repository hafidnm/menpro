<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Light Mode Colors */
        :root {
            --bg-color: #ffffff; /* Latar belakang halaman utama putih */
            --text-color: #121212;
            --highlight-color: #000000; /* Hitam untuk aksen */
            --secondary-text-color: #333333;
            --login-bg-color: #1e90ff; /* Biru muda untuk background kontainer login */
            --button-color: #000000; /* Hitam untuk tombol login */
            --button-hover-color: #333333;
        }

        body {
            background-color: var(--bg-color); /* Warna latar belakang utama putih */
            color: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-wrapper {
            display: flex;
            background-color: var(--login-bg-color); /* Background kontainer login */
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }

        .login-image {
            flex: 1;
            background-image: url('{{ asset('storage/SMP.jpg') }}'); /* Path gambar */
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
            color: #ffffff; /* Putih untuk teks judul login di atas background biru */
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .login-container p {
            color: #ffffff; /* Warna putih untuk paragraf */
        }

        .form-label {
            color: #ffffff; /* Warna putih untuk label */
        }

        .btn-primary {
            background-color: var(--button-color); /* Hitam untuk tombol */
            border-color: var(--button-color);
            color: #ffffff; /* Putih untuk teks di tombol */
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--button-hover-color); /* Warna hover lebih gelap */
            border-color: var(--button-hover-color);
            color: #ffffff;
        }

        .alert-danger {
            font-size: 0.9em;
            margin-top: 10px;
            color: #d9534f;
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
