<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan RFID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --background-color: #f5f5f5;
            --card-background: #ffffff;
            --primary-color: #121212;
            --secondary-color: #B9B8B6;
            --border-color: #dcdcdc;
            --btn-hover-color: #a9a9a9;
        }

        body {
            background-color: var(--background-color);
            color: var(--primary-color);
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: var(--card-background);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: 60px auto;
            max-width: 450px;
        }

        h2 {
            color: var(--primary-color);
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: var(--primary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--btn-hover-color);
            color: white;
        }

        .alert {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            border: none;
            border-radius: 8px;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }

        .student-data {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .student-data h3 {
            font-weight: bold;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 20px;
        }

        .student-data img {
            display: block;
            margin: 0 auto 15px auto;
            width: 150px;
            height: 150px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .student-data p {
            font-size: 1rem;
            margin-bottom: 8px;
        }

        input[type="text"] {
            border: 1px solid var(--border-color);
            padding: 10px;
            border-radius: 8px;
            width: 100%;
        }
    </style>
</head>
<body>
    @include('components.sidebar')
    
    <div class="container">
        <h2>Scan Kartu RFID</h2>
        <form action="{{ route('siswa.read') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="rfid_id">Masukkan ID RFID</label>
                <input 
                    type="text" 
                    id="rfid_id" 
                    name="rfid_id" 
                    placeholder="" 
                    required 
                    autofocus 
                >
            </div>
            <button type="submit" class="btn btn-primary w-100">Proses Absen</button>
        </form>

        @if(session('message'))
            <div class="alert mt-4">
                <strong>Info:</strong> {{ session('message') }}
            </div>
        @endif

        @if(isset($siswa))
            <div class="student-data">
                <h3>Data Siswa</h3>
                <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
                @if($siswa->gambar)
                    <img src="{{ asset('uploads/' . $siswa->gambar) }}" alt="Foto Siswa">
                @else
                    <p class="text-muted text-center">Tidak ada foto tersedia</p>
                @endif
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputField = document.getElementById('rfid_id');
            inputField.focus();
            inputField.select();
        });
    </script>
</body>
</html>
