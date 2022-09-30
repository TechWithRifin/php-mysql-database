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

if ($row = $statement->fetch()) {
    echo "sukses login : " . $row['username'] . PHP_EOL;
} else {
    echo "Gagal login " . PHP_EOL;
}

$connection = null;


/**
 * Fetch Data
 * Sebelumnya saat kita melakukan query, kita biasanya menggunakan perulangan foreach untuk melakukan iterasi terhadap object PDOStatement
 * Permasalahannya adalah foreach akan melakukan seluruh perulangan di hasil resultnya. Bagaimana jika kita ada kasus dimana kita ingin hanya mengambil data pertama saja ? Jika masalahnya begini maka kita harus membuat counter secara manual 
 * untungnya PDOStatement itu memiliki function yang bernama fetch(). function fetch ini berfungsi untuk menarik 1 data saja dari hasil query
 * function fetch dapat dipanggil lebih dari sekeli misalnya kita memanggil fetch pertama maka data yang ditarik adalah data pertama, kemudian kita memanggil fetch lagi maka data yang ditarik adalah data kedua dan seterusnya
 * Jika function fetch() mengembalikan nilai false, itu artinya tidak ada data yang bisa diambil dari hasil query.
 */