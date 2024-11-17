<!-- resources/views/siswa/profil.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil SMPN 1 Nogosari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tema Dark Mode */
        :root {
            --bg-color: #ffffff;
            --text-color: #000000;
            --highlight-color: #1e90ff; /* Ungu */
            --secondary-text-color: #000000;
            --card-bg-color: #1e1e1e;
            --button-color: #1e90ff; /* Teal */
            --button-hover-color: #018786;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
            padding: 20px;
        }

        h1, h2 {
            color: var(--highlight-color);
        }

        p {
            color: var(--secondary-text-color);
        }

        .school-image {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        .highlight {
            color: var(--button-color);
            font-weight: bold;
        }

        .btn-back {
            background-color: var(--button-color);
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: var(--button-hover-color);
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    @include('components.navbar-landing')

    <!-- Profil SMPN 1 Nogosari -->
    <div class="container text-center">
        <h1>Profil SMPN 1 Nogosari Boyolali</h1>
        <p class="mb-4">Sekolah Menengah Pertama Negeri yang berkomitmen untuk mencetak generasi muda yang berkarakter, hebat, dan jaya di Kabupaten Boyolali.</p>

        <!-- Image of the school -->
        <img src="{{ asset('storage/SMP.jpg') }}" alt="Gambar SMPN 1 Nogosari" class="school-image mb-4">

        <!-- Profile Section -->
        <div class="text-start">
            <h2>Sejarah Singkat</h2>
            <p>
                SMPN 1 Nogosari didirikan dengan tujuan untuk memberikan pendidikan berkualitas di daerah Nogosari, Kabupaten Boyolali. Sejak berdirinya, sekolah ini telah menjadi tempat tumbuh kembangnya <span class="highlight">generasi berprestasi</span> dan berkarakter kuat. Sekolah ini dikenal karena dedikasinya dalam meningkatkan <span class="highlight">kualitas pendidikan</span> dan pengembangan karakter siswa.
            </p>

            <h2>Visi dan Misi</h2>
            <p><strong>Visi:</strong> Mencetak generasi yang unggul dalam pengetahuan, berkarakter, serta peduli lingkungan.</p>
            <p><strong>Misi:</strong></p>
            <ul>
                <li>Menanamkan nilai-nilai kejujuran, kedisiplinan, dan tanggung jawab.</li>
                <li>Mendorong kreativitas dan inovasi siswa melalui kegiatan belajar yang aktif dan interaktif.</li>
                <li>Mengembangkan lingkungan belajar yang aman, nyaman, dan berbudaya.</li>
                <li>Meningkatkan prestasi akademik dan non-akademik siswa melalui program-program unggulan.</li>
            </ul>

            <h2>Program Unggulan</h2>
            <p>
                SMPN 1 Nogosari memiliki berbagai program unggulan yang berfokus pada pengembangan <span class="highlight">karakter</span> dan <span class="highlight">keterampilan</span> siswa. Beberapa program tersebut meliputi:
            </p>
            <ul>
                <li>Program <strong>Adiwiyata</strong>: Mendidik siswa untuk mencintai dan menjaga lingkungan sekolah.</li>
                <li>Ekstrakurikuler <strong>Olahraga dan Seni</strong>: Mengembangkan minat dan bakat siswa dalam bidang olahraga dan seni.</li>
                <li>Program <strong>Literasi</strong>: Membudayakan minat baca dan menulis di kalangan siswa.</li>
                <li>Program <strong>Teknologi dan Informasi</strong>: Menyiapkan siswa untuk lebih melek teknologi dan siap menghadapi tantangan di era digital.</li>
            </ul>
        </div>

        <!-- Back Button -->
        <a href="/" class="btn-back">Kembali ke Beranda</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>