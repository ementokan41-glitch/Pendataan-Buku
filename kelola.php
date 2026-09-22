<?php
// Koneksi ke Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_buku";

$conn = mysqli_connect($host, $user, $pass, $db);

// Mengambil data dari tabel 'buku'
$query = "SELECT * FROM buku ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Buku - Aplikasi Pendataan Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- RESET & BASE STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f6f9; /* Abu-abu terang solid */
            color: #333;
            padding: 25px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* --- NAVBAR SOLID WHITE --- */
        nav {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 30px;
            padding: 10px 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        nav a {
            color: #555;
            text-decoration: none;
            padding: 10px 24px;
            font-weight: 500;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            border-radius: 25px;
        }

        nav a.active {
            background-color: #1e90ff;
            color: #ffffff;
            font-weight: 600;
        }

        nav a:hover:not(.active) {
            background-color: #f0f2f5;
            color: #1e90ff;
        }

        /* --- CONTENT CARD SOLID --- */
        .solid-card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .card-header h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* --- BUTTON TAMBAH DATA --- */
        .btn-add {
            background-color: #2ecc71;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s ease;
        }

        .btn-add:hover {
            background-color: #27ae60;
        }

        /* --- TABLE STYLE --- */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 14px 18px;
            border-bottom: 1px solid #eeeeee;
            color: #333;
        }

        th {
            background-color: #f8f9fa;
            color: #2c3e50;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background-color: #fafdff;
        }

        /* Teks deskripsi agar rapi ber-ellipsis jika terlalu panjang */
        .deskripsi-text {
           .deskripsi-text {
        max-width: 300px;         /* Batas lebar kolom agar tabel tetap proporsional */
        word-wrap: break-word;     /* Memaksa kata yang sangat panjang untuk patah ke bawah */
        white-space: normal;       /* Mengembalikan teks ke mode normal (bisa enter/wrap) */
        line-height: 1.5;          /* Memberi jarak antar baris teks agar enak dibaca */
        text-align: justify;       /* (Opsional) Membuat teks rata kanan-kiri agar rapi */
}
        /* --- ACTION BUTTON HAPUS SOLID --- */
        .btn-delete {
            background-color: #e74c3c;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s ease;
            font-weight: 500;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }

        @media (max-width: 768px) {
            nav { flex-wrap: wrap; padding: 10px; border-radius: 15px; }
            nav a { padding: 8px 15px; font-size: 0.9rem; }
            .card-header { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>

<div class="container">
    
    <nav>
        <a href="index.php"><i class="fa-solid fa-house"></i> Home</a>
        <a href="dashboard.php"><i class="fa-solid fa-chart-simple"></i> Dashboard</a>
        <a href="kelola.php" class="active"><i class="fa-solid fa-book"></i> Kelola Buku</a>
        <a href="proses/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
    </nav>

    <div class="solid-card">
        <div class="card-header">
            <h2><i class="fa-solid fa-database"></i> Daftar Data Buku Perpustakaan</h2>
            <a href="dashboard.php" class="btn-add"><i class="fa-solid fa-plus"></i> Tambah Buku Baru</a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun Terbit</th>
                        <th>Deskripsi</th>
                        <th style="width: 120px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result && mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td><strong>{$row['judul']}</strong></td>
                                    <td>{$row['penulis']}</td>
                                    <td>{$row['kategori']}</td>
                                    <td>{$row['tahun']}</td>
                                    <td><div class='deskripsi-text' title='{$row['deskripsi']}'>{$row['deskripsi']}</div></td>
                                    <td style='text-align: center;'>
                                        <a href='proses/hapus.php?id={$row['id']}' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus buku ini?\")'><i class='fa-solid fa-trash'></i> Hapus</a>
                                    </td>
                                  </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr>
                                <td colspan='7' class='no-data'>
                                    <i class='fa-solid fa-folder-open' style='font-size: 1.5rem; margin-bottom: 5px; display:block;'></i>
                                    Belum ada data buku di dalam sistem.
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer>
    © 2026 Pendataan Buku - Praktikum Pemrograman Web
</footer>
</body>
</html>