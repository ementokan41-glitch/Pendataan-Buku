<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pendataan Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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
            background: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            color: #fff;
            overflow: hidden;
        }

        /* Overlay gelap agar teks lebih mudah dibaca */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 1;
        }

        /* Menjaga konten utama tetap di atas overlay */
        .wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: space-between;
            padding: 20px;
        }

        /* --- HEADER & NAVIGATION --- */
        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            flex-direction: column;
        }

        .logo h1 {
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .logo p {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-left: 10px;
            border: 1px solid transparent;
        }

        nav a.active, nav a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* --- MAIN HERO CARD --- */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 40px;
            max-width: 850px;
            width: 100%;
            text-align: center;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }

        .glass-card h2 {
            font-size: 2.2rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .glass-card p {
            font-size: 1.05rem;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 40px;
            font-weight: 300;
        }

        /* --- QUICK ACTION BUTTONS --- */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
        }

        .feature-btn {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 15px;
            border-radius: 15px;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .feature-btn i {
            font-size: 1.2rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 8px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .feature-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .feature-btn:hover i {
            background: #fff;
            color: #333;
        }

        /* --- FOOTER INDICATOR --- */
        footer {
            text-align: center;
            padding: 10px 0;
        }

        footer i {
            font-size: 1.5rem;
            animation: bounce 2s infinite;
            opacity: 0.7;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-8px); }
            60% { transform: translateY(-4px); }
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .glass-card {
                padding: 25px;
            }
            .glass-card h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <header>
            <div class="logo">
                <h1>📚 Aplikasi Pendataan Buku</h1>
                <p>Kelola data buku dengan mudah dan modern</p>
            </div>
            <nav>
                <a href="#" class="active">Home</a>
                <a href="login.php">Login</a>
            </nav>
        </header>

        <div class="main-content">
            <div class="glass-card">
                <h2>Selamat Datang </h2>
                <p>Website ini dibuat menggunakan HTML, CSS, PHP dan MySQL untuk membantu melakukan pendataan buku secara cepat, mudah, dan efisien.</p>
                
                <div class="features-grid">
                    <a href="pencarian.php" class="feature-btn">
                        <i class="fa-solid fa-magnifying-glass"></i> Pencarian Cepat
                    </a>
                    <a href="statistik.php" class="feature-btn">
                        <i class="fa-solid fa-chart-simple"></i> Statistik Data
                    </a>
                    <a href="login.php" class="feature-btn">
                        <i class="fa-solid fa-book-bookmark"></i> Kelola Koleksi
                    </a>
                </div>
            </div>
        </div>

        <footer>
            <i class="fa-solid fa-angle-down"></i>
        </footer>
    </div>
<footer>
    © 2026 Pendataan Buku - Praktikum Pemrograman Web
</footer>
</body>
</html>