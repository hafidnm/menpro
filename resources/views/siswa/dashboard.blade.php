<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warna biru sesuai dengan warna sebelumnya */
        :root {
            --primary-blue: ;
            --biru-tua: #1e90ff;
            --text-color: #121212;
            --card-bg-color: #f8f9fa;
            --btn-hover-color: #1e90ff;
        }

        /* Content styling */
        .content {
            margin-left: 240px;
            padding: 20px;
            background-color: var(--primary-blue); /* Biru muda sebagai latar belakang konten */
            color: var(--text-color);
            min-height: 100vh;
        }

        /* Card styling */
        .card {
            background-color: var(--card-bg-color); /* Background card putih */
            color: var(--text-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow */
            border: none;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.02); /* Slight zoom on hover */
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>SMPN 1 NOGOSARI</h2>
                <a href="{{ route('siswa.landing') }}" class="btn btn-danger">Logout</a>
            </div>

            <div class="row mb-4">
            <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Tanggal</h5>
                            <p id="tanggal-display" class="card-text fs-4">-</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Kelas</h5>
                            <p class="card-text fs-4">{{ $totalKelas }}</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tanggalModal" tabindex="-1" aria-labelledby="tanggalModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tanggalModalLabel">Masukkan Tanggal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="tanggalForm">
                                <div class="mb-3">
                                    <label for="tanggalInput" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggalInput" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Siswa</h5>
                            <p class="card-text fs-4">{{ $totalSiswa }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Sudah Absen</h5>
                            <p class="card-text fs-4">{{ $absenHariIni }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Application Buttons -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang di Website Resmi SMPN 1 Nogosari</h5>
                    <p>Silahkan klik menu-menu yang tersedia:</p>
                    <div class="row text-center">
                        <div class="col-md-3"><a class="btn btn-light w-100 mb-2" href="{{ url('/siswa/scan') }}">Absen</a></div>
                        <div class="col-md-3"><button class="btn btn-light w-100 mb-2">Menu</button></div>
                        <div class="col-md-3"><button class="btn btn-light w-100 mb-2">Halaman</button></div>
                        <div class="col-md-3"><button class="btn btn-light w-100 mb-2">Berita</button></div>
                    </div>
                </div>
            </div>

            <!-- Attendance Chart -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Absensi</h5>
                    <div id="attendance-chart">
                        <!-- Integrate a chart library here to display attendance data -->
                        Grafik Absensi
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalModal = new bootstrap.Modal(document.getElementById('tanggalModal'));
            const tanggalDisplay = document.getElementById('tanggal-display');
            const savedTanggal = localStorage.getItem('inputTanggal');

            // Check if date already exists in localStorage
            if (savedTanggal) {
                tanggalDisplay.textContent = savedTanggal;
            } else {
                tanggalModal.show();
            }

            // Handle form submission
            document.getElementById('tanggalForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const tanggalInput = document.getElementById('tanggalInput').value;
                if (tanggalInput) {
                    tanggalDisplay.textContent = tanggalInput;
                    localStorage.setItem('inputTanggal', tanggalInput);
                    tanggalModal.hide();
                }
            });
        });
    </script>
</body>
</html>
