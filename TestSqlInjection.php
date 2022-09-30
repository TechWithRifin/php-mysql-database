<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// $username = "admin";
// $password = "admin";

// contoh penerapan sql injection
// $username = "admin'; #";
// $password = ''; // <- variable ini dapat diisi dengan value apapun

// $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'"; //jangan membuat query dengan cara seperti ini karena query dengan cara seperti ini akan rentan terjadinya sql injection

// menangani sql injection secara manual menggunakan function quote

$username = $connection->quote("admin'; #");
$password = $connection->quote('');

$sql = "SELECT * FROM admin WHERE username = $username AND password = $password";

$statement = $connection->query($sql);

// ! peringatan : menangani masalah sql injection dengan cara diatas sangat tidak direkomendasikan karena rawan terjadinya lupa menambahkan function quote pada semua input user

$success = false;
$find_user = null;

foreach ($statement as $row) {
    // sukses
    $success = true;
    $find_user = $row['username'];
}

if ($success) {
    echo "Sukses login : " . $find_user . PHP_EOL;
} else {
    echo "Gagal login" . PHP_EOL;
}

$connection = null;

/**
 * * SQL dengan Parameter *
 * saat membuat aplikasi, kita tidak mungkin akan melakukan hardcode perintah sql nya di kode php kita seperti yang sebelumnya kita lakukan (pada saat itu kita melakukan proses insert data dengan cara melakukan hardcode data nya pada perintah SQL nya) <- lihat file TestExec.php
 * pada aplikasi biasanya kita akan menerima input data dari user, lalu menerima perintah SQL dari input usernya dan mengirim data input dari user tersebut menggunakan perintah SQL 
 */

/**
 * * SQL Injection
 * apa itu sql injection ?
 * sql injection adalah sebuah teknik yang menyalahgunakan sebuah celah keamanan yang terjadi dalam lapisan basis data sebuah aplikasi (Biasanya gara-gara query sqlnya bisa dimanipulasi menggunakan sql injection).
 * biasanya SQL injection dilakukan dengan cara mengirim input dari user menggunakan perintah yang salah, sehingga menyebabkan hasil SQL yang kita buat menjadi tidak valid
 * SQL injection ini sangat berbahaya, jika sampai kita salah membuat kode sql, bisa jadi data kita menjadi tidak aman karena nanti orang bisa masuk ke aplikasi kita tanpa harus melakukan login yang benar
 */

/** Contoh SQL Injection
 * ganti value dari variable $username menjadi admin'; # dan hapus value dari variable $password kemudian jalankan diterminal
 * saat program dijalankan maka hasil yang didapatkan adalah sukses login padahal seharusnya hasil yang didapatkan gagal login karena username admin'; # tidak tersedia didalam database
 * kenapa hal ini bisa terjadi ?
 * hal ini bisa terjadi karena sql script yang kita buat dimanipulasi si variable $username
 * pada value dari variable $username terdapat tanda '; # setelah kata admin. saat tanda '; # dimasukkan pada perintah sql yang sudah kita buat, maka perintah sql yang dijalankan hanya SELECT * FROM admin WHERE username = 'admin';
 * perintah setelahnya menjadi tidak dijalankan karena sudah ada tanda ; setelah value admin pada username
 * lalu tanda # pada sql itu menandakan komentar jadi perintah setelah tanda # akan dikomentar dan tidak dijalankan
 */

/**
 * *Solusi Untuk Mengatasi masalah sql injection*
 * jangan membuat query sql secara manual dengan menggabungkan string secara bulat bulat
 * function query() dan function exec() tidak bisa menangani celah sql injection. Jika kita tetap maksa ingin menggunan function query() dan exec(), maka kita harus menangani celah sql injectionnya secara manual
 * contohnya kita harus mengecek terlebih dahulu semua input yang dimasukkan oleh user apakah ada karakter karakter yang mencurigakan dengan menggunakan funtion quote(inputUser). Function quote akan secara otomatis mengquote (memberi tanda \) semua karakter-karakter yang mencurigakan
 * Dari pada menangani sql injection secara manual, direkomendasikan untuk mengganti function query() dan exec() dengan function prepare("perintahSQLnya") pada saat perintah sql nya membutuhkan parameter dari input user. Karena function prepare() dapat menangani sql injection
 * gunakan function query() dan exec() hanya pada saat perintah sql nya tidak membutuhkan parameter dari input user. 
 */