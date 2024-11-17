<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Sekolah - SMPN 1 Nogosari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #e0e0e0;
            --highlight-color: #1e90ff; 
            --secondary-text-color: #ffffff;
            --card-bg-color: #1e90ff;
            --button-color: #03dac5;
            --button-hover-color: #018786;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
            padding: 20px;
        }

        h1 {
            color: var(--highlight-color); /* Ubah menjadi biru */
            text-align: center;
            margin-bottom: 40px;
        }

        .card {
            background-color: var(--card-bg-color);
            border: none;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .contact-info h5 {
            color: white; /* Ubah menjadi putih */
        }

        .contact-info p {
            color: var(--secondary-text-color);
        }

        .form-control, .btn {
            border-radius: 5px;
        }

        .btn-submit {
            background-color: var(--button-color);
            color: #000;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: var(--button-hover-color);
            color: #ffffff;
        }
    </style>
</head>
<body>

    @include('components.navbar-landing')

    <div class="container">
        <h1>Kontak Sekolah</h1>
        
        <div class="card contact-info">
            <h5>Alamat Sekolah</h5>
            <p>Jl. Raya Nogosari No. 123, Nogosari, Boyolali, Jawa Tengah, Indonesia</p>

            <h5>Telepon</h5>
            <p>(0276) 123456</p>

            <h5>Email</h5>
            <p>info@smpn1nogosari.sch.id</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
