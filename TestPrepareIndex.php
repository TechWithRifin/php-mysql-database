<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// valid credential
$username = "admin";
$password = "admin";

// contoh penerapan sql injection
// $username = "admin';#";
// $password = "passwordnya salah";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$statement = $connection->prepare($sql);
// binding parameter
$statement->bindParam(1, $username);
$statement->bindParam(2, $password);
// eksekusi perintah sql nya
$statement->execute();

$success = false;
$find_user = null;

foreach ($statement as $row) {
    // sukses
    $success = true;
    $find_user = $row['username'];
}

if ($success) {
    echo "sukses login : $find_user" . PHP_EOL;
} else {
    echo "Gagal login " . PHP_EOL;
}

$connection = null;

/**
 * * Binding Parameter dengan Index *
 * selain menggunakan bindParam("namaParameter", "valueParameter")
 * untuk melakukan binding parameter, kita juga bisa menggunakan index (angka) yang dimulai dari angka 1
 * namun kita perlu mengganti semua :namaParameter pada perintah sql nya menjadi ? (tanda tanya) 
 * lalu gunakan nomor index untuk melakukan binding parameter nya.
 * format binding parameternya menjadi seperti berikut bindParam(index, value)
 * penentuan value nya adalah urut berdasarkan tanda tanya (urutan tanda tanya didalam perintah sql adalah dimulai dari paling kiri)
 * misalnya jika tanda tanya paling kiri berada di kolom username maka valuenya harus input username
 */