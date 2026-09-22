<?php
// Koneksi ke Database (Sesuaikan dengan konfigurasi Anda)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_buku";

$conn = mysqli_connect($host, $user, $pass, $db);

// Inisialisasi variabel pencarian
$keyword = "";
$result = null;

if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
    // Query mencari di judul atau penulis
    $query = "SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            color: #fff;
            padding: 30px 20px;
        }
        body::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.5); z-index: 1; position: fixed;
        }
        .container { position: relative; z-index: 2; max-width: 900px; margin: 0 auto; }
        
        .back-btn {
            display: inline-flex; align-items: center; gap: 8px; color: #fff; 
            text-decoration: none; background: rgba(255,255,255,0.15); 
            padding: 8px 16px; border-radius: 20px; font-size: 0.9rem;
            backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2);
            transition: 0.3s; margin-bottom: 20px;
        }
        .back-btn:hover { background: rgba(255,255,255,0.3); transform: translateX(-3px); }

        .glass-box {
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px; padding: 30px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        h2 { font-weight: 600; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
        
        /* Search Bar Form */
        .search-form { display: flex; gap: 10px; margin-bottom: 30px; }
        .search-input {
            flex: 1; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
            padding: 12px 20px; border-radius: 12px; color: #fff; font-size: 1rem; outline: none;
        }
        .search-input::placeholder { color: rgba(255,255,255,0.6); }
        .search-input:focus { border-color: rgba(255,255,255,0.5); background: rgba(255,255,255,0.15); }
        .btn-submit {
            background: rgba(255,255,255,0.25); border: 1px solid rgba(255,255,255,0.3);
            color: #fff; padding: 0 25px; border-radius: 12px; font-weight: 500; cursor: pointer; transition: 0.3s;
        }
        .btn-submit:hover { background: #fff; color: #333; }

        /* Table Style */
        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 14px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        th { background: rgba(255,255,255,0.15); font-weight: 600; }
        tr:hover { background: rgba(255,255,255,0.05); }
        .status-msg { text-align: center; padding: 20px; opacity: 0.7; }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Kembali ke Home</a>

    <div class="glass-box">
        <h2><i class="fa-solid fa-magnifying-glass"></i> Pencarian Koleksi Buku</h2>
        
        <form action="" method="GET" class="search-form">
            <input type="text" name="keyword" class="search-input" placeholder="Ketik judul buku atau nama penulis..." value="<?php echo htmlspecialchars($keyword); ?>" required>
            <button type="submit" name="cari" class="btn-submit">Cari</button>
        </form>

        <div class="table-responsive">
            <?php if (isset($_GET['cari'])): ?>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tahun Terbit</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($result && mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$no}</td>
                                        <td>{$row['judul']}</td>
                                        <td>{$row['penulis']}</td>
                                        <td>{$row['tahun']}</td>
                                        <td>{$row['kategori']}</td>
                                      </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='5' class='status-msg'>Data buku tidak ditemukan.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="status-msg">Silakan masukkan kata kunci untuk memulai pencarian.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<footer>
    © 2026 Pendataan Buku - Praktikum Pemrograman Web
</footer>
</body>
</html>