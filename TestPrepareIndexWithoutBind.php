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
// eksekusi perintah sql dan binding parameter 
$statement->execute([$username, $password]);

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
 * * Binding Parameter tanda function bindParam()
 * kita juga bisa melakukan binding parameter langsung ke function execute dengan memasukkan value parameter kedalam parameter execute() sebagai array (execute(['valueParam1','valueParam2']))
 * note cara ini hanya bisa digunakan pada nama parameter sql nya berupa ? (tanda tanya)
 */