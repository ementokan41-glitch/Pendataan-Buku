<?php
// Koneksi ke Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_buku";

$conn = mysqli_connect($host, $user, $pass, $db);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendataan Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- RESET & BASE STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f6f9; /* Warna abu-abu terang solid */
            color: #333;
            padding: 30px 20px;
        }

        .container {
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
        }

        /* --- TITLE HEADER --- */
        .title-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .title-header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #2c3e50;
        }

        /* --- NAVIGATION BAR (Solid White Kapsul) --- */
        nav {
            background-color: #ffffff; /* Putih Solid */
            border: 1px solid #e0e0e0;
            border-radius: 30px;
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 35px;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        nav a {
            color: #555;
            text-decoration: none;
            padding: 8px 20px;
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border-radius: 25px;
        }

        /* Menu Aktif */
        nav a.active {
            background-color: #1e90ff; /* Biru Solid */
            color: #ffffff;
            font-weight: 600;
        }

        nav a:hover:not(.active) {
            background-color: #f0f2f5;
            color: #1e90ff;
        }

        /* --- FORM SOLID CARD --- */
        .solid-card {
            background-color: #ffffff; /* Putih Solid */
            border: 1px solid #e0e0e0;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .solid-card h2 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 30px;
            border-bottom: 2px solid #f4f6f9;
            padding-bottom: 12px;
        }

        /* --- INPUT FIELDS --- */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        .form-control {
            width: 100%;
            background-color: #f8f9fa; /* Input abu-abu tipis solid */
            border: 1px solid #cccccc;
            border-radius: 8px;
            padding: 12px 18px;
            color: #333;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #1e90ff;
            box-shadow: 0 0 5px rgba(30, 144, 255, 0.2);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* --- SIMPAN BUTTON --- */
        .btn-submit {
            background-color: #1e90ff;
            color: #fff;
            border: none;
            padding: 14px 30px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #107ae6;
        }

        @media (max-width: 768px) {
            .solid-card { padding: 25px; }
            .title-header h1 { font-size: 1.8rem; }
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="title-header">
        <h1>📚 Aplikasi Pendataan Buku</h1>
    </div>

    <nav>
        <a href="index.php">🏠 Home</a>
        <a href="dashboard.php" class="active">📊 Dashboard</a>
        <a href="kelola.php">📚 Kelola Buku</a>
        <a href="proses/logout.php">🚪 Logout</a>
    </nav>

    <div class="solid-card">
        <h2>Form Input Buku</h2>
        
        <form action="proses/tambah.php" method="POST">
            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Buku" required>
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Nama Penulis / Pengarang" required>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun Terbit</label>
                <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Contoh: 2024" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Kategori atau Genre Buku" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Tulis sinopsis atau deskripsi singkat buku..." required></textarea>
            </div>

            <button type="submit" class="btn-submit">Simpan Buku</button>
        </form>
    </div>
</div>
<footer>
    © 2026 Pendataan Buku - Praktikum Pemrograman Web
</footer>
</body>
</html>