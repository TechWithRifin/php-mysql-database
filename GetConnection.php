<?php


function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $database = "belajar_php_database";
    $username = "root";
    $password = "arifin";

    // membuat koneksi ke database
    return new PDO("mysql:host=$host:$port;dbName=$database", $username, $password);
}