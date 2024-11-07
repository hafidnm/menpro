<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            background-color: #0d6efd; /* Blue */
            color: white;
            position: fixed;
            width: 240px;
            transition: all 0.3s ease;
        }
        .sidebar h4, .sidebar p {
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: background-color 0.2s;
        }
        .sidebar a:hover {
            background-color: #0a58ca; /* Darker blue on hover */
        }

        /* Content styling */
        .content {
            margin-left: 240px;
            padding: 20px;
            background-color: #f8f9fa; /* Light gray background */
            min-height: 100vh;
        }
        
        /* Card styling */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for a more professional look */
            border: none;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.02); /* Slight zoom on hover for interactivity */
        }
        .card-title {
            color: #0d6efd; /* Blue for title */
        }
        .btn-light {
            color: #0d6efd;
            border: 1px solid #0d6efd;
            transition: all 0.3s;
        }
        .btn-light:hover {
            background-color: #0d6efd;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center py-4">
            <h4>ADMINISTRATOR</h4>
            <p>Laudzaun Instanfa, S.Kom</p>
            <p>Online</p>
        </div>
        <a href="#">xxxxxxxx</a>
        <a href="#">xxxxxxxx</a>
        <a href="#">xxxxxxxx</a>
        <a href="#">xxxxxxxx</a>
        <a href="#">xxxxxxxx</a>
        <a href="#">xxxxxxxx</a>
        <a href="#">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>SMPN 1 NOGOSARI</h2>
                <a href="{{ route('loginform') }}" class="btn btn-primary">Login</a>
            </div>
            <!-- Summary Cards -->
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
                        <div class="col-md-3"><button class="btn btn-light w-100 mb-2" href="{{ url('/siswa/scan') }}" class="btn btn-warning">Absen</button></div>
                        <div class="col-md-3"><button class="btn btn-light w-100 mb-2">Menu</button></div>
                        <div class="col-md-3"><button class="btn btn-light w-100 mb-2">Halaman</button></div>
                        <div class="col-md-3"><button class="btn btn-light w-100 mb-2">Berita</button></div>
                        <!-- Add more buttons as needed to match your layout -->
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
