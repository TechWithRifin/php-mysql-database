<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$connection->exec("INSERT INTO comments(email, comment) VALUES ('mark@test.com','hi')");
$id = $connection->lastInsertId(); //mengambil data id terakhir yang sudah diinsert ke dalam database (mengambil data id dari data yang telah dimasukkan diatas)

$connection = null;

/**
 * * Auto Increment *
 * Kadang kita membuat sebuah table dengan id nya itu auto increment
 * dan kadang pula, kita ingin mengambil data id yang sudah kita insert ke dalam mysql. Jadi setelah kita insert data nya ke mysql lalu kita ingin tahu nih id terakhir dari data yang sudah kita insert itu apa
 * sebenarnya di mysql kita bisa melakukan query ulang ke database menggunalan SELECT LAST_INSERT_ID(). Namun jika kita melakukan hal itu, otamatis kita harus melakukan query ulang (jadinya kita harus mekukan 2 kali kerja dan itu tidak wort it)
 * tapi untungnya di PDO itu ada cara yang lebih mudah
 * kita bisa menggunakan sebuah function yang namanya lastInsertId(). function ini berfungsi untuk mendapatkan id terakhir yang dibuat secara auto increment (dengan ini kita tidak perlu lagi melakukan query ulang)
 * 
 */