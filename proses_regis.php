<?php

$dsn = "mysql:host=localhost;dbname=restoranif330";
$kunci = new PDO($dsn, "root", "");

$email = $_POST["email"];

// Memeriksa apakah email sudah ada dalam database
$cek_sql = "SELECT email FROM user WHERE email = ?";
$cek_stmt = $kunci->prepare($cek_sql);
$cek_stmt->execute([$email]);

if ($cek_stmt->rowCount() > 0) {
    // Email sudah ada dalam database, Anda bisa menangani ini sesuai kebutuhan
    // Misalnya, menampilkan pesan kesalahan atau mengarahkan pengguna ke halaman lain
    echo "Email sudah terdaftar";
} else {
    // Email belum ada dalam database, Anda bisa melanjutkan proses sisip data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $date = $_POST["date"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    $sql = "INSERT INTO user (email, password, nama_depan, nama_belakang, tanggal_lahir, alamat) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $kunci->prepare($sql);
    $data = [$email, $password, $firstname, $lastname, $date, $address];
    $stmt->execute($data);

    // Data berhasil disisipkan
    echo "Registrasi berhasil";
}
