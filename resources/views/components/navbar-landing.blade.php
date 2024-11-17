<!-- resources/views/components/navbar-landing.blade.php -->
<nav class="navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <!-- Tambahkan ikon di sebelah kiri teks -->
            <img src="{{ asset('storage/icon.png') }}" alt="Icon" class="icon">
            <h4 class="mb-0">Selamat Datang</h4>
        </div>
        <div>
            <a href="/">Home</a>
            <a href="/profil">Profil</a>
            <a href="/tentangkami">Tentang Kami</a>
            <a href="/kontak">Kontak</a>
        </div>
    </div>
</nav>

<style>
    /* Navbar styling */
    .navbar {
        background-color: #1c1c1e; 
        padding: 15px 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }
    .navbar h4 {
        color: #ffffff; /* Warna putih untuk judul navbar */
        margin: 0;
    }
    .navbar a {
        color: #ffffff; /* Warna putih untuk link navbar */
        text-decoration: none;
        padding: 0 15px;
        transition: color 0.3s;
    }
    .navbar a:hover {
        color: #1e90ff; /* Warna teal pada hover */
    }

    /* Icon styling */
    .navbar .icon {
        width: 36px;
        height: 36px;
        margin-right: 10px;
    }
</style>
