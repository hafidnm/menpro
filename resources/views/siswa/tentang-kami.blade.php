<!-- resources/views/siswa/tentang_kami.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Tim Developer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tema Dark Mode */
        :root {
            --bg-color: #ffffff;
            --text-color: #ffffff;
            --highlight-color: #1e90ff; 
            --secondary-text-color: #ffffff;
            --card-bg-color: #1e90ff;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .container {
            max-width: 1000px;
            margin-top: 50px;
            padding: 20px;
        }

        h1 {
            color: var(--highlight-color);
            text-align: center;
            margin-bottom: 40px;
        }

        .card {
            background-color: var(--card-bg-color);
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.2s ease;
            height: 100%; /* Membuat semua kartu memiliki tinggi penuh */
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-top: 20px;
        }

        .card-body {
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 200px; /* Menyetel tinggi minimum agar ukuran kartu seragam */
        }

        .card-title {
            color: var(--text-color);
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 10px;
        }

        .card-text {
            color: var(--secondary-text-color);
            text-align: center;
            margin-top: 5px;
        }

        /* Menyesuaikan tinggi semua kartu agar seragam */
        .developer-card {
            height: 100%; /* Agar semua kolom memiliki tinggi yang sama */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    @include('components.navbar-landing')

    <!-- Tentang Kami Section -->
    <div class="container">
        <h1>Tim Developer Web</h1>
        <div class="row text-center justify-content-center">
            <!-- Developer 1 -->
            <div class="col-md-4 mb-4">
                <div class="card p-3 developer-card">
                    <img src="{{ asset('storage/adt.jpg') }}" alt="TANK" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title">Adit</h5>
                        <p class="card-text">Full Stack Developer berpengalaman dengan fokus pada pengembangan aplikasi end-to-end.</p>
                    </div>
                </div>
            </div>
            <!-- Developer 2 -->
            <div class="col-md-4 mb-4">
                <div class="card p-3 developer-card">
                    <img src="{{ asset('storage/ll.jpg') }}" alt="BOSS" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title">Lala</h5>
                        <p class="card-text">Frontend Developer dengan spesialisasi React, Vue, dan pembuatan antarmuka interaktif.</p>
                    </div>
                </div>
            </div>
            <!-- Developer 3 -->
            <div class="col-md-4 mb-4">
                <div class="card p-3 developer-card">
                    <img src="{{ asset('storage/gwl.jpg') }}" alt="COPET" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title">Hafid</h5>
                        <p class="card-text">Backend Developer yang ahli dalam desain arsitektur microservices dan manajemen data skala besar.</p>
                    </div>
                </div>
            </div>
            <!-- Developer 4 -->
            <div class="col-md-4 mb-4">
                <div class="card p-3 developer-card">
                    <img src="{{ asset('storage/hendry.jpg') }}" alt="USTAD" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title">Henry</h5>
                        <p class="card-text">UI/UX Designer dengan pendekatan user-centered design untuk pengalaman pengguna optimal.</p>
                    </div>
                </div>
            </div>
            <!-- Developer 5 -->
            <div class="col-md-4 mb-4">
                <div class="card p-3 developer-card">
                    <img src="{{ asset('storage/imem.jpg') }}" alt="CIDRO" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title">Jali</h5>
                        <p class="card-text">Quality Assurance Specialist yang fokus pada pengujian manual dan otomatis untuk memastikan kualitas produk.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
