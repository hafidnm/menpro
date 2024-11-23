<style>
    /* Sidebar Styling */
    .sidebar {
        height: 100vh;
        background-color: #2f2f2f; /* Dark grey */
        color: white;
        position: fixed;
        width: 250px;
        transition: all 0.3s ease;
        top: 0;
        padding-top: 20px;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        font-family: 'Roboto', sans-serif;
    }

    /* Sidebar Header */
    .sidebar .text-center {
        margin-bottom: 30px;
    }

    .sidebar h4 {
        color: #ffffff;
        font-weight: 600;
        font-size: 24px;
        text-transform: uppercase;
    }

    .sidebar p {
        color: #f1f1f1;
        font-size: 14px;
        margin: 5px 0;
    }

    /* Link Styling */
    .sidebar a {
        color: #ffffff;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 15px 20px;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s, transform 0.2s;
        margin: 5px 0;
    }

    /* Add Icons */
    .sidebar a i {
        margin-right: 10px;
        font-size: 18px;
    }

    /* Hover Effect */
    .sidebar a:hover {
        background-color: #555555; /* Slightly lighter grey */
        transform: scale(1.05);
    }

    /* Active Link */
    .sidebar a.active {
        background-color: #444444; /* Darker grey */
        color: #f1f1f1;
        font-weight: 600;
    }

    /* Responsive Sidebar */
    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }

        .sidebar a {
            padding: 12px 15px;
        }
    }

    /* Optional: Hover effect for the sidebar on mobile */
    .sidebar a:hover {
        background-color: #444444;
    }
</style>

<!-- resources/views/components/sidebar.blade.php -->

<div class="sidebar">
    <div class="text-center py-4">
        <h4>ADMINISTRATOR</h4>
        <p>Laudzaun Instanfa, PsHt</p>
        <p>Online</p>
    </div>

    <!-- Sidebar Links with Icons -->
    <a href="/siswa/dashboard" class=""><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    <a href="/siswa"><i class="fa fa-users"></i> Manajemen Siswa</a>
    <a href="/siswa/scan"><i class="fa fa-scan"></i> Absen</a>
    <a href="{{ route('sudah.absen') }}"><i class="fa fa-chart-line"></i> Lihat Data Absensi</a>
</div>

<!-- Include Font Awesome CDN for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
