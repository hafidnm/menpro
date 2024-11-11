<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan RFID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warna tema biru muda */
        :root {
            --primary-blue: #89CFF0; /* Biru muda */
        }

        body {
            background-color: var(--primary-blue); /* Latar belakang biru muda */
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: white; /* Background putih untuk kontainer */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            max-width: 500px;
        }

        h2 {
            color: #0d6efd; /* Warna heading biru */
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .alert {
            text-align: center;
        }

        .student-data {
            margin-top: 20px;
        }

        .student-data img {
            display: block;
            margin: 0 auto;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body onload="document.getElementById('rfid_id').focus()">
    @include('components.sidebar')
    
    <div class="container">
        <h2>Scan RFID</h2>
        <form action="{{ route('siswa.read') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="rfid_id" class="form-label">ID RFID:</label>
                <input type="text" id="rfid_id" name="rfid_id" class="form-control" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cari Siswa</button>
        </form>
        
        <!-- Pesan jika RFID tidak ditemukan -->
        @if(session('message'))
            <div class="alert alert-warning mt-3">{{ session('message') }}</div>
        @endif

        <!-- Menampilkan data siswa jika ditemukan -->
        @if(isset($siswa))
            <div class="student-data">
                <h3 class="text-center">Data Siswa</h3>
                <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>

                <!-- Menampilkan gambar jika ada -->
                @if($siswa->gambar)
                    <p class="text-center">Foto Siswa:</p>
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . $siswa->gambar) }}" alt="Foto Siswa" width="150" height="150">
                    </div>
                @else
                    <p class="text-muted text-center">Tidak ada foto</p>
                @endif
            </div>
        @endif
    </div>

    <script>
        // Fokus otomatis pada input saat halaman dimuat
        window.onload = () => {
            const rfidInput = document.getElementById('rfid_id');
            rfidInput.focus();
            rfidInput.select();
        };
    </script>
</body>
</html>
