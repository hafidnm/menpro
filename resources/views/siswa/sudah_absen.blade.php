<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudah Absen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h1 {
            color: #6c757d;
            font-weight: bold;
        }
        .btn-primary, .btn-secondary, .btn-success {
            transition: all 0.3s ease;
        }
        .btn-primary:hover, .btn-secondary:hover, .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .form-control {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
            padding: 12px;
        }
        .table th {
            background-color: #f1f1f1;
            color: #495057;
        }
        .table td {
            background-color: #ffffff;
        }
        .row.mb-3 {
            margin-bottom: 20px;
        }
    </style>
    
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Data Sudah Absen</h1>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('sudah.absen') }}">
            <div class="row mb-3">
                <!-- Filter Tanggal -->
                <div class="col-md-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input 
                        type="text" 
                        name="tanggal" 
                        id="tanggal" 
                        class="form-control" 
                        placeholder="YYYY-MM-DD" 
                        pattern="\d{4}-\d{2}-\d{2}" 
                        title="Masukkan format tanggal: YYYY-MM-DD">
                </div>

                <!-- Tombol Filter -->
                <div class="col-md-3 mt-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('sudah.absen') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Download Button -->
        <a href="{{ route('sudah.absen.download', request()->only(['tanggal'])) }}" class="btn btn-success mt-3">Download CSV</a>

        <!-- Tabel Data -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Waktu Absen</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absensi as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->waktu_absen }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data absensi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('siswa.dashboard') }}" class="btn btn-secondary mt-4">Kembali ke Dashboard</a>
    </div>
</body>
</html>
