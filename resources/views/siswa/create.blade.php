<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warna tema biru muda */
        :root {
            --primary-blue: #89CFF0; /* Warna biru muda */
        }

        body {
            background-color: var(--primary-blue); /* Latar belakang biru muda */
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: white; /* Background putih untuk form */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
            padding: 30px;
            margin-top: 50px;
            max-width: 500px;
        }

        h1 {
            color: #0d6efd; /* Blue heading */
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .alert {
            text-align: center;
            font-size: 0.9em;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('components.sidebar')
    
    <div class="container">
        <h1>Form Pendaftaran Siswa</h1>

        <!-- Formulir Pendaftaran Siswa -->
        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="text" id="nis" name="nis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <input type="text" id="kelas" name="kelas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Foto:</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="rfid_id" class="form-label">ID RFID:</label>
                <input type="text" id="rfid_id" name="rfid_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Daftarkan</button>
            </div>
        </form>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Error Alert for duplicate RFID -->
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Error messages for validation -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 