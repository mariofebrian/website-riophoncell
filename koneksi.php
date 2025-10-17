<?php
$server   = "localhost";     // biasanya localhost
$username = "root";          // username default XAMPP
$password = "";              // password default kosong
$database = "db_konter";     // nama database

// Membuat koneksi ke database
$conn = mysqli_connect($server, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("<h3 style='color:red;'>Koneksi ke database gagal: " . mysqli_connect_error() . "</h3>");
}
?>
