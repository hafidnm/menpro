<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Light Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Light Mode Colors */
        :root {
            --bg-color: #ffffff;
            --text-color: #121212;
            --highlight-color: #6200ea; /* Warna ungu untuk teks dan aksen */
            --secondary-text-color: #333333;
            --card-bg-color: #f0f0f0;
            --button-color: #89CFF0; /* Warna asli tombol login */
            --button-hover-color: #89CFF0; /* Warna hover asli tombol login */
        }

        /* Content styling */
        .content {
            padding: 60px;
            background-color: var(--bg-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
        }

        /* Welcome Section Styling */
        .welcome-section {
            display: flex;
            align-items: center;
            gap: 60px;
            max-width: 1200px;
            width: 100%;
            padding: 20px;
        }
        
        .welcome-text h1 {
            font-size: 3rem;
            font-weight: bold;
            color: var(--text-color);
            margin-bottom: 10px;
            line-height: 1.2;
        }
        
        .welcome-text p {
            font-size: 1.25rem;
            color: var(--secondary-text-color);
            margin-bottom: 30px;
        }

        .btn-login {
            background-color: var(--button-color); /* Warna asli tombol login */
            color: #000000;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-size: 1.1rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
        
        .btn-login:hover {
            background-color: var(--button-hover-color); /* Warna hover asli */
            color: #ffffff;
        }
        
        .image-frame {
            border: 3px solid var(--card-bg-color);
            border-radius: 15px;
            padding: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            flex: 1;
            max-width: 550px;
            background-color: var(--card-bg-color);
        }

        .school-image {
            width: 100%;
            height: auto;
            border-radius: 12px;
        }

        .image-frame {
            position: relative;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar-landing') <!-- Panggil file navbar-landing.blade.php -->

    <!-- Main Content -->
    <div class="content">
        <div class="welcome-section">
            <!-- Text Section -->
            <div class="welcome-text">
                <h1>Selamat datang <br> di Presensi Online <br> SMPN 1 Nogosari</h1>
                <p>SMP Negeri 1 Nogosari berkarakter hebat jaya</p>
                <a href="{{ route('loginform') }}" class="btn-login">Login ➔</a>
            </div>
            <!-- Image Section -->
            <div class="image-frame">
                <img src="{{ asset('storage/SMP.jpg') }}" alt="School Image" class="school-image">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    localStorage.removeItem('inputTanggal');
</script>
</body>
</html>
