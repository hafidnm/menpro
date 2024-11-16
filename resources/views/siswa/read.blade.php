<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            margin-top: 50px;
        }
        h2 {
            color: #198754;
            font-weight: bold;
        }
        .alert-warning {
            font-size: 1rem;
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
            transition: transform 0.1s;
        }
        .img-container:hover img {
            transform: scale(1.1);
        }
    </style>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            // Kirim form setelah beberapa detik
            setTimeout(() => {
                document.getElementById('autoSubmitForm').submit();
            }, 3000); // 3000 ms = 3 detik

            // Alihkan halaman ke halaman scan kartu setelah 3 menit
            
        });
    </script>
</head>
<body>
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
                <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
                <p><strong>Jam Absen:</strong> {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('HH:mm:ss') }}</p>
                <p><strong>Tanggal Absen:</strong> {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
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
</body>
</html>
