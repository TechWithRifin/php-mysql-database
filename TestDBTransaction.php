<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// memulai transaksi
$connection->beginTransaction();

// semua data dibawah ini akan dimasukkan ke database asalkan tidak ada satupun query yang error. Jika ada satu saja query yang error, maka semua data dibawah tidak akan dimasukkan ke dalam database
$connection->exec("INSERT INTO comments(email, comment) VALUES ('michaela@test.com', 'hello')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('michaela@test.com', 'hello')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('michaela@test.com', 'hello')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('michaela@test.com', 'hello')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('michaela@test.com', 'hello')");

// melakukan commit
$connection->commit();

$connection = null;

/**
 * Database Transaction
 * Salah satu fitur andalan kalau kita menggunakan database relational itu adalah transaction termasuk di mysql
 */

/**
 * Transaction di PDO
 * secara default, semua perintah sql yang kita kirimkan menggunakan PDO itu akan otomatis di commit (disimpan secara permanen didalam database), atau istilahnya auto commit. jadi setiap kita melakukan perintah seperti insert, update dan delete itu semuanya akan otomatis di commit.
 * namun kita bisa menggunakan fitur transaksi atau database transaction sehingga perintah sql yang kita kirim tidak secara otomatis di commit ke dalam database. Jadi ditunggu dulu sampai nanti kita melakukan commit baru dia akan dilakukan commit secara permanen ke dalam database
 * untuk memulai proses transaksi, kita bisa menggunakan function beginTransaction() di PDO.
 * setelah melakukan beginTransaction(), kita akan melakukan beberapa proses manipulasi data misalnya beberapa insert atau update atau delete kemudian kalau kita sudah selesai melakukan proses manipulasi tersebut dan ingin melakukan commit, kita bisa menggunakan function commit() milik PDO. Jadi ketika melakukan commit, maka semua query yang sudah kita lakukan sebelumnya akan dicommit secara permanen ke dalam database
 * 
 */