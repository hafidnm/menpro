<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warna tema abu-abu */
        :root {
            --primary-gray: #f0f2f5; /* Latar belakang abu-abu terang */
            --white: #ffffff; /* Warna putih */
            --dark-gray: #6c757d; /* Warna teks abu-abu gelap */
            --btn-primary: #6c757d; /* Warna tombol abu-abu */
        }

        body {
            background-color: var(--primary-gray); /* Latar belakang abu-abu terang */
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: var(--white); /* Background putih untuk form */
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Shadow lebih soft */
            padding: 30px;
            margin-top: 50px;
            max-width: 600px;
        }

        h1 {
            color: #198754; /* Warna hijau untuk heading */
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-label {
            font-weight: bold;
            color: var(--dark-gray);
        }

        .form-control {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 5px rgba(25, 135, 84, 0.5);
        }

        .btn-primary {
            width: 100%;
            border-radius: 8px;
            background-color: #198754;
            border: none;
            color: var(--white);
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #145c43;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .alert {
            text-align: center;
            font-size: 1rem;
            margin-top: 20px;
            border-radius: 8px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 8px;
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
