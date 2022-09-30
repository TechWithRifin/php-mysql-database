<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = "SELECT id, name, email FROM customers";

$statement = $connection->query($sql);

foreach ($statement as $row) {
    var_dump($row); // isi variable $row adalah sebuah array key dan value yang key nya adalah nama kolom dari table customers dan value nya adalah value dari nama kolom yang ada pada keynya

    // terdapat 2 cara untuk mendapatkan data yang ada didalam array $row

    // cara pertama dengan menggunakan key berupa index array nya
    $id = $row[0]; //data id
    $name = $row[1]; //data name
    $email = $row[2]; //data email

    // cara kedua dengan menggunakan key berupa nama kolom nya
    $id = $row['id']; //data id
    $name = $row['name']; //data name
    $email = $row['email']; //data email

    // printout data
    echo "id = $id" . PHP_EOL;
    echo "name = $name" . PHP_EOL;
    echo "email = $id" . PHP_EOL;
}

$connection = null;

/**
 * * Query SQL (query($sql)) *
 * setelah kita tahu bagaiman cara mengirim SQL ke database MYSQL yang tidak membutuhkan result data yaitu insert , update, delete (menggunakan function exec). 
 * Sekarang bagaimana kalau melakukan Query SQL yang membutuhkan result data contohnya query SELECT ?
 * Untungnya PDO memiliki function yang namanya query("perintahSQLnya"), function ini digunakan untuk melakukan query data dari database
 * return value dari function query("perintahSQLnya") adalah sebuah object yang namanya PDOStatement
 */

/**
 * * PDOStatement *
 * PDOStatement itu adalah sebuah class turunan dari IteratorAggregate <- pernah dibahas di php oop
 * Seperti yang sudah kita bahas di php oop, bahwa turunan dari IteratorAggregate secara otomatis bisa menggunakan perulangan foreach. Jadi kita bisa melakukan foreach langsung ke PDOStatement nya
 * oleh karena itu, untuk melakukan iterasi data hasil query, kita bisa langsung melakukan perulangan foreach untuk tiap baris record hasil dari query sql nya ke si PDOStatementnya
 */