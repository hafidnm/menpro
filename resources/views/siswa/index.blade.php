<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
            padding: 20px;
            margin-top: 30px;
        }
        h2 {
            color: #0d6efd; /* Blue heading */
        }
        .btn-primary, .btn-success, .btn-warning, .btn-info, .btn-danger {
            border-radius: 5px;
            transition: all 0.3s;
        }
        .btn-primary:hover, .btn-success:hover, .btn-warning:hover, .btn-info:hover, .btn-danger:hover {
            opacity: 0.8;
        }
        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #e9ecef;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        img {
            border-radius: 50%;
            object-fit: cover;
        }
        .alert {
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="color-secondary">Daftar Siswa</h2>
            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        
        <!-- Tombol Aksi -->
        <div class="mb-3">
            <a href="{{ route('siswa.create') }}" class="btn btn-secondary">Tambah Siswa</a>
            <a href="{{ url('/siswa/scan') }}" class="btn btn-secondary">Simulasi Absen</a>
            <a href="{{ url('/siswa/read') }}" class="btn btn-secondary">Read Siswa</a>
        </div>

        <!-- Tabel Daftar Siswa -->
        <table class="table table-striped table-bordered">
        <thead class="table-primary">
    <tr>
        <th>Foto</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>ID RFID</th>
        <th>Status Absensi</th> <!-- Kolom baru untuk status absensi -->
        <th>Aksi</th> <!-- Kolom aksi untuk edit dan hapus -->
    </tr>
</thead>
<tbody>
    @foreach($siswas as $siswa)
        <tr>
            <td>
                @if($siswa->gambar)
                    <img src="{{ asset('storage/' . $siswa->gambar) }}" alt="Foto {{ $siswa->nama }}" width="80" height="80">
                @else
                    <span class="text-muted">Tidak ada foto</span>
                @endif
            </td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->kelas }}</td>
            <td>{{ $siswa->rfid_id }}</td>
            <td>{{ $siswa->status_absensi ? 'Sudah Absen' : 'Belum Absen' }}</td> <!-- Menampilkan status absensi -->
            <td>
                <!-- Tombol Edit -->
                <a href="{{ route('siswa.edit', $siswa->rfid_id) }}" class="btn btn-primary btn-sm">Edit</a>
                
                <!-- Tombol Hapus dengan konfirmasi -->
                <form action="{{ route('siswa.destroy', $siswa->rfid_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Hapus</button>
                </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
