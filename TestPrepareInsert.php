<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "michaela";
$password = "rahasia";

$sql = "INSERT INTO admin (username, password) VALUES (:username , :password)";
$statement = $connection->prepare($sql);
// binding parameter
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
// eksekusi perintah sql nya
$statement->execute();

$connection = null;

// selain melakukan query, kita bisa melakukan proses insert, update dan delete menggunakan function prepare()
// dari pada menggunkan function exec() kita lebih direkomendasikan menggunakan function prepare() untuk proses insert, update dan delete karena lebih aman