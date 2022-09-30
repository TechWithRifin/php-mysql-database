<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// valid credential
$username = "admin";
$password = "admin";

// contoh penerapan sql injection
// $username = "admin';#";
// $password = 'passwordnya salah';

$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
$statement = $connection->prepare($sql);
// binding parameter
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
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
 * * Prepare Statement *
 * Cara yang lebih aman untuk membuat SQL dengan input parameter dari user sebenarnya adalah menggunakan function yang bernama prepare("perintahSQLnya") karena function ini dapat menangani celah jika ada sql injection. Jadi aplikasi yang kita buat akan terhindar dari sql injection
 * Function prepare("perintahSQLnya") ini akan menghasilkan sebuah object PDOStatetment, dimana kita bisa melakukan binding parameter ke perintah sql yang sudah kita buat.
 * jadi ini lebih aman dibandingkan menggunakan function quote() secara manual yang rawan lupa
 * namun jika menggunakan function prepare("perintahSQLnya"), pembuatan string sql nya agak sedikit berbeda dari exec() atau query(). Ketika kita ingin menambahkan parameter ke dalam perintah sql nya, kita harus menggunakan format =  :namaParameternya
 * 
 */

/**
 * * Binding Parameter *
 * setelah kita menentukan letak parameternya pada kode perintah sql
 * kita wajib melakukan binding parameter dengan input dari user. Jadi setelah menentukan parameternya di sql, kita wajib memasukkan value pada parameter tersebut
 * nanti secara otomatis semua input dari user akan di quote() oleh prepare() statement. Jadi kita tidak perlu melakukan quote() function secara manual
 * Hal ini membuat penggunaan prepare() statement lebih aman dibandingkan kita melakukan quote() secara manual
 * cara melakukan binding parameter adalah dengan menggunakan function bindParam("namaParameter","valueParameter");
 * kita harus melakukan bindParams sebanyak jumlah parameter nya. Jadi misalnya jumlah parameternya 2 maka kita wajib melakukan bindParam() sebanyak 2 kali
 * setelah kita melakukan binding parameter, maka harus menjalankan function execute() untuk mengeksekusi perintah sql nya 
 */