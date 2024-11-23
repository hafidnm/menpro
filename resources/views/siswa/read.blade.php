<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warna tema abu-abu */
        :root {
            --primary-gray: #B9B8B6; /* Biru abu-abu muda untuk latar belakang */
            --background-color: #f0f2f5; /* Latar belakang halaman abu muda */
            --card-background: #ffffff; /* Latar belakang kartu putih */
            --border-radius: 12px;
            --box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--background-color); /* Latar belakang abu muda */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container untuk detail siswa */
        .container {
            background-color: var(--card-background); /* Kartu putih */
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
            max-width: 600px;
            margin-top: 50px;
        }

        h2 {
            color: #198754; /* Hijau untuk judul */
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .alert-warning {
            font-size: 1rem;
            text-align: center;
        }

        .img-container {
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin: 0 auto;
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.2s;
        }

        .img-container:hover img {
            transform: scale(1.1);
        }

        .student-info p {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #333;
        }

        .student-info h3 {
            font-weight: bold;
            color: #198754; /* Hijau untuk judul info siswa */
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: var(--primary-gray);
            border-radius: 8px;
            padding: 10px 20px;
            border: none;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #6c757d;
        }

        /* Responsive layout */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(() => {
                document.getElementById('autoSubmitForm').submit();
            }, 3000); // 3000 ms = 3 detik
        });
    </script>
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        <div class="container text-center">
            <h2>Absen Berhasil</h2>

            @if(session('message'))
                <div class="alert alert-warning my-4">{{ session('message') }}</div>
            @endif

            @if(isset($siswa))
                <!-- Menampilkan gambar siswa di tengah -->
                @if($siswa->gambar)
                    <div class="img-container my-4">
                        <img src="{{ asset('storage/' . $siswa->gambar) }}" alt="Foto Siswa">
                    </div>
                @else
                    <p class="text-muted">Tidak ada foto</p>
                @endif

                <!-- Informasi siswa di bawah gambar -->
                <div class="mt-3">
                    <h3>Data Siswa</h3>

                    <!-- Flexbox untuk menata informasi siswa ke kiri -->
                    <div class="d-flex flex-column align-items-start">
                        <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                        <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                        <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
                        <p><strong>Jam Absen:</strong> {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('HH:mm:ss') }}</p>
                        <p><strong>Tanggal Absen:</strong> {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                    </div>
                </div>

                <!-- Form untuk menyimpan absen ke database secara otomatis -->
                <form id="autoSubmitForm" action="{{ route('siswa.absen') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nis" value="{{ $siswa->nis }}">
                    <input type="hidden" name="nama" value="{{ $siswa->nama }}">
                    <input type="hidden" name="kelas" value="{{ $siswa->kelas }}">
                </form>
            @else
                <p class="text-danger">Siswa tidak ditemukan.</p>
            @endif
        </div>
    </div>
</body>

</html>
