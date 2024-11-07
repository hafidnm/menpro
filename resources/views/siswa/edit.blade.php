<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Data Siswa</h2>

        <!-- Pesan kesalahan atau konfirmasi -->
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulir Edit Siswa -->
        <form action="{{ route('siswa.update', $siswa->rfid_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Input NIS -->
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}" required>
            </div>

            <!-- Input Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}" required>
            </div>

            <!-- Input Kelas -->
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $siswa->kelas }}" required>
            </div>

            <!-- Input ID RFID -->
            <div class="mb-3">
                <label for="rfid_id" class="form-label">ID RFID</label>
                <input type="text" name="rfid_id" id="rfid_id" class="form-control" value="{{ $siswa->rfid_id }}" required>
            </div>

            <!-- Upload Gambar -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
                @if($siswa->gambar)
                    <p class="mt-2">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $siswa->gambar) }}" alt="Foto {{ $siswa->nama }}" width="100" height="100" class="rounded">
                @endif
            </div>

            <!-- Tombol Simpan dan Batal -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
