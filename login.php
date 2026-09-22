<?php
session_start();

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "12345"){
        $_SESSION['login'] = true;
        header("Location: dashboard.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>🔐 Login Admin</h1>
</header>

<div class="container login-box">

    <h2>Silakan Login</h2>

    <form method="POST">

        <input type="text" name="username" placeholder="Masukkan Username">

        <input type="password" name="password" placeholder="Masukkan Password">

        <button type="submit" name="login">
            Login
        </button>

        <p style="color:red; margin-top:15px;">
            <?= $error ?>
        </p>

    </form>

</div>

<footer>
    © 2026 Pendataan Buku - Praktikum Pemrograman Web
</footer>

</body>
</html>