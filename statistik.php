<?php
// Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "db_buku");

// Contoh pengambilan jumlah agregat (pastikan query ini disesuaikan dengan skema tabel Anda)
$total_buku = 0;
$total_kategori = 0;

if ($conn) {
    $q1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM buku");
    if($q1) { $r1 = mysqli_fetch_assoc($q1); $total_buku = $r1['total']; }

    $q2 = mysqli_query($conn, "SELECT COUNT(DISTINCT kategori) as total FROM buku");
    if($q2) { $r2 = mysqli_fetch_assoc($q2); $total_kategori = $r2['total']; }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover; min-height: 100vh; color: #fff; padding: 30px 20px;
        }
        body::before { content: ''; position: absolute; top:0; left:0; right:0; bottom:0; background: rgba(0,0,0,0.5); z-index: 1; position: fixed; }
        .container { position: relative; z-index: 2; max-width: 900px; margin: 0 auto; }
        
        .back-btn {
            display: inline-flex; align-items: center; gap: 8px; color: #fff; text-decoration: none;
            background: rgba(255,255,255,0.15); padding: 8px 16px; border-radius: 20px;
            backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2); transition: 0.3s; margin-bottom: 20px;
        }
        .back-btn:hover { background: rgba(255,255,255,0.3); transform: translateX(-3px); }

        .glass-box {
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 20px; padding: 40px;
        }
        h2 { font-weight: 600; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; }

        /* Dashboard Widget Grid */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; }
        .stat-card {
            background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15);
            padding: 25px; border-radius: 16px; text-align: center; transition: 0.3s;
        }
        .stat-card:hover { transform: translateY(-5px); background: rgba(255,255,255,0.15); }
        .stat-card i { font-size: 2.5rem; margin-bottom: 15px; opacity: 0.9; }
        .stat-card h3 { font-size: 1.1rem; font-weight: 400; opacity: 0.8; }
        .stat-card .number { font-size: 3rem; font-weight: 700; margin-top: 5px; }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Kembali ke Home</a>

    <div class="glass-box">
        <h2><i class="fa-solid fa-chart-simple"></i> Statistik Perpustakaan</h2>
        
        <div class="stats-grid">
            <div class="stat-card">
                <i class="fa-solid fa-book"></i>
                <h3>Total Koleksi Buku</h3>
                <div class="number"><?php echo $total_buku; ?></div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-tags"></i>
                <h3>Kategori Buku</h3>
                <div class="number"><?php echo $total_kategori; ?></div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-users"></i>
                <h3>Anggota Aktif</h3>
                <div class="number">124</div>
            </div>
        </div>
    </div>
</div>
<footer>
    © 2026 Pendataan Buku - Praktikum Pemrograman Web
</footer>
</body>
</html>