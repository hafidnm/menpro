<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Root variables for colors */
        :root {
            --light-grey: #f1f1f1; /* Light grey */
            --medium-grey: #cccccc; /* Medium grey */
            --dark-grey: #333333; /* Dark grey */
            --text-color: #121212;
            --card-bg-color: #ffffff; /* White for cards */
            --btn-hover-color: #e0e0e0; /* Light grey for buttons on hover */
        }

        /* Main Content Styling */
        .content {
            margin-left: 240px;
            padding: 20px;
            background-color: var(--light-grey); /* Light grey for content background */
            color: var(--dark-grey); /* Dark grey text */
            min-height: 100vh;
        }

        /* Card Styling */
        .card {
            background-color: var(--card-bg-color); /* White background for cards */
            color: var(--text-color); /* Dark text for cards */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for card */
            border-radius: 8px; /* Rounded corners */
            transition: transform 0.2s, box-shadow 0.2s;
        }

        /* Card Hover Effect */
        .card:hover {
            transform: scale(1.03); /* Slight zoom effect */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* Enhance shadow on hover */
        }

        /* Button Hover Effect */
        .btn:hover {
            background-color: var(--btn-hover-color);
            color: black;
        }

        /* Modal Styling */
        .modal-content {
            background-color: var(--card-bg-color);
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Custom Text */
        .text-custom {
            font-family: 'Roboto', sans-serif;
            font-weight: 600;
            color: var(--dark-grey);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 10px;
            }

            .card {
                margin-bottom: 15px;
            }
        }

        /* Card Body Styling */
        .card-body p {
            font-size: 24px;
            font-weight: 600;
        }

        .row > .col-md-4 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="content">
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <img src="{{ asset('storage/icon.png') }}" class="img-fluid me-5" style="height: 90px; width: auto;">
            <h2 class="text-custom mb-0">Selamat Datang di Website SMPN 1 NOGOSARI</h2>
            <a href="{{ route('siswa.landing') }}" class="btn btn-danger">Logout</a>
        </div>
        <div class="row mb-4">

    <!-- Tanggal Card -->
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Tanggal</h5>
                <p id="tanggal-display" class="card-text fs-4">-</p>
            </div>
        </div>
    </div>

    <!-- Jumlah Kelas Card -->
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Jumlah Kelas</h5>
                <p class="card-text fs-4">{{ $totalKelas }}</p>
            </div>
        </div>
    </div>

    <!-- Jumlah Siswa Card -->
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Jumlah Siswa</h5>
                <p class="card-text fs-4">{{ $totalSiswa }}</p>
            </div>
        </div>
    </div>
</div>


            <!-- Modal Tanggal -->
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


            <!-- Attendance Chart Section -->
            <div class="card" style="width: 77rem; font-size: 0.9rem; text-align: center;"> <!-- Text align untuk center -->
    <div class="card-body">
        <h5 class="card-title" style="font-size: 2rem;">Grafik Absensi</h5> <!-- Mengatur ukuran judul -->
        <div id="attendance-chart" style="height: 500px; display: flex; justify-content: center; align-items: center;"> <!-- Pusatkan grafik -->
            <canvas id="attendanceChart"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('attendanceChart').getContext('2d');
        
        // Data palsu untuk jumlah siswa yang sudah absen pada hari Senin sampai Jumat
        var attendanceData = {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'], // Nama hari
            datasets: [{
                label: 'Jumlah Siswa yang Absen',
                data: [25, 30, 22, 40, 35], // Data dummy untuk absensi (misalnya 25 siswa absen pada Senin)
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna background bar
                borderColor: 'rgba(54, 162, 235, 1)', // Warna border bar
                borderWidth: 1
            }]
        };

        var config = {
            type: 'bar', // Jenis grafik (bar chart)
            data: attendanceData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + ' siswa'; // Menampilkan jumlah siswa pada tooltip
                            }
                        }
                    }
                }
            }
        };

        // Membuat chart
        var attendanceChart = new Chart(ctx, config);
    });
</script>


</body>
</html>
