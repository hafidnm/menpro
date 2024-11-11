<style>
/* Sidebar styling */
        .sidebar {
            height: 100vh;
            background-color: #0d6efd; /* Blue */
            color: white;
            position: fixed;
            width: 240px;
            transition: all 0.3s ease;
            top: 0;
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
</style>


<!-- resources/views/components/sidebar.blade.php -->

<div class="sidebar">
    <div class="text-center py-4">
        <h4>ADMINISTRATOR</h4>
        <p>Laudzaun Instanfa, S.Kom</p>
        <p>Online</p>
    </div>
    <a href="/siswa/dashboard">Dashboard</a>
    <a href="/siswa">Manajemen Siswa</a>
    <a href="/siswa/create">Tambah siswa</a>
    <a href="/siswa/scan">absen</a>
    <a href="/siswa/dashboard">Back</a>
</div>