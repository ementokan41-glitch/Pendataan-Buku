<?php
$conn = mysqli_connect("localhost", "root", "", "db_buku");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>