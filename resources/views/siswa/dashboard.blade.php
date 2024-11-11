<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        

        /* Content styling */
        .content {
            margin-left: 240px;
            padding: 20px;
            background-color: #fff; /* Dark background */
            color: #f8f9fa;
            min-height: 100vh;
        }

        /* Card styling */
        .card {
            background-color: #0d6efd; /* Dark card background */
            color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow */
            border: none;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.02); /* Slight zoom on hover */
        }
        .card-title {
            color: #fff; /* Bright blue for title */
        }

        /* Button styling */
        .btn-light {
            color: #fff;
            border: 1px solid #0dcaf0;
            background-color: transparent;
            transition: all 0.3s;
        }
        .btn-light:hover {
            background-color: #0dcaf0;
            color: white;
        }

        /* Custom header styling */
        h2 {
            color: #0d6efd;
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
                <a href="{{ route('siswa.landing') }}" class="btn btn-primary">Logout</a>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Kelas</h5>
                            <p class="card-text fs-4">{{ $totalKelas }}</p>
                        </div>
                    </div>
                </div>
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
</body>
</html>