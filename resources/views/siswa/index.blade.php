<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --background-light: #f8f9fa;
            --card-bg: #ffffff;
            --text-dark: #121212;
            --text-muted: #6c757d;
            --border-color: #e0e0e0;
            --btn-hover: #e3e3e3;
        }

        body {
            background-color: var(--background-light);
            color: var(--text-dark);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .main-content {
            margin-left: 240px; /* Sesuaikan dengan lebar sidebar */
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            background-color: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            font-weight: bold;
            color: var(--text-dark);
        }

        .btn-primary, .btn-secondary, .btn-danger {
            border-radius: 5px;
            color: #ffffff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover, .btn-secondary:hover, .btn-danger:hover {
            background-color: var(--btn-hover);
            color: var(--text-dark);
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table thead {
            background-color: var(--background-light);
            border-bottom: 2px solid var(--border-color);
        }

        .table tbody tr:nth-child(even) {
            background-color: var(--background-light);
        }

        .alert {
            background-color: var(--background-light);
            border: 1px solid var(--border-color);
            color: var(--text-muted);
        }

        img {
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Daftar Siswa</h2>
                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
            
            <!-- Tombol Aksi -->
            <div class="mb-4 d-flex gap-2">
                <a href="{{ route('siswa.create') }}" class="btn btn-secondary">Tambah Siswa</a>
            </div>

            <!-- Tabel Daftar Siswa -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>ID RFID</th>
                        <th>Aksi</th> <!-- Kolom aksi untuk edit dan hapus -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $siswa)
                        <tr>
                            <td>
                                @if($siswa->gambar)
                                    <img src="{{ asset('storage/' . $siswa->gambar) }}" alt="Foto {{ $siswa->nama }}" width="60" height="60">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->kelas }}</td>
                            <td>{{ $siswa->rfid_id }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('siswa.edit', $siswa->rfid_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('siswa.destroy', $siswa->rfid_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pesan jika tidak ada siswa terdaftar -->
            @if($siswas->isEmpty())
                <div class="alert alert-warning mt-3">Tidak ada siswa yang terdaftar.</div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
