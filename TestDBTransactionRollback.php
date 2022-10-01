<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// jika kita tiba tiba ingin membatalkan semua proses manipulasi data didalam transaksi, maka kita bisa menggunakan function rollback()

$connection->beginTransaction();

$connection->exec("INSERT INTO comments(email, comment) VALUES ('carl@test.com', 'hello')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('carl@test.com', 'hello')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('carl@test.com', 'hello')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('carl@test.com', 'hello')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('carl@test.com', 'hello')");

//melakukan rollback
$connection->rollBack(); //secara otomatis semua query sql diatas akan dibatalkan (datanya tidak akan masuk ke dalam database)

$connection = null;

/**
 * * Transaction Rollback *
 * jika kita ingin membatalkan proses transaksi, misalnya ada kesalahan dan kita ingin membatalkan semua proses transaksi nya (rollback). Kita bisa menggunakan function rollback() di PDO nya
 */