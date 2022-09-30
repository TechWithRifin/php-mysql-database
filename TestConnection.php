<?php

$host = "localhost";
$port = 3306;
$database = "belajar_php_database";
$username = "root";
$password = "arifin";

try {
    // membuat koneksi ke database
    $connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
    echo "Sukses terkoneksi ke database MySQL" . PHP_EOL;

    // menutup koneksi ke database
    $connection = null;
} catch (PDOException $exception) {
    echo "Gagal terkoneksi ke database MySQL : " . $exception->getMessage() . PHP_EOL;
}

/**
 * * Koneksi Database
 * sebelum kita melakukan manipulasi data ke database dengan cara mengirimkan perintah sql, hal yang perlu kita lakukan terlebih dahulu adalah membuat koneksi ke database.
 * Untuk membuat koneksi ke database mysql menggunakan pdo itu sangatlah mudah, kita cukup membuat sebuah object dari class PDO.
 * saat kita membuat koneksi ke mysql menggunakan pdo, kita perlu menentukan host nya (lokasi tempat terinstal nya mysql defaultnya adalah localhost (jika diserver tempat lain kita isi dengan ip adress atau domain name nya)), port nya (dimana port mysqlnya itu berjalan (default portnya adalah 3306), nama database nya, username dan password akun mysql)
 * format pembuatan koneksi ke database mysql adalah
 * new PDO("mysql:host='lokasiHostnya':portMysqlnya;dbName='namaDatabasenya'",'usernameAkunMysqlnya','passwordAkunMysqlnya');
 */

/**
 * * Error PDOException *
 * hampir semua error yang terjadi pada PDO itu merupakan class exception dari yang namanya PDOException
 * sehingga jika kita ingin melakukan sesuatu menggunakan pdo misalnya koneksi ke database maka disarankan selalu menggunakan try catch untuk pdoexceptionnya untuk jaga-jaga jika terjadi error kita bisa catch (menangkap) errornya apa 
 */

/**
 * * Menutup Koneksi Ke Database *
 * jika kita sudah selesai melakukan operasi ke database, lalu kita sudah tidak memerlukannya lagi, maka kita wajib menutup koneksi ke databasenya
 * karena setiap database itu memiliki batas maksimal koneksi ke database. Contohnya kalau kita menggunakan mysql itu secara default batas maksimal koneksinya adalah 151 koneksi. Jadi jika koneksinya melebihi batas maksimalnya maka koneksinya akan ditolak oleh mysql
 * Jika kita sampai lupa menutup koneksi sehingga koneksi dianggap masih terbuka, maka lama kelamaan koneksi bisa cepat mencapai batas maksimal koneksi, sehingga ketika kita ingin membuat koneksi baru, maka koneksi tersebut akan ditolak oleh mysql
 * untuk menghentikan koneksi ke database menggunakan pdo, kita cukup mengganti value dari variable tempat menyimpan object pdo menjadi null
 * dengan melakukan itu maka saat request dari user selesai maka php akan menjalankan proses garbage collection dan ketika tahu tidak ada lagi variable yang mengacu ke object pdo tersebut maka otomatis si phpnya akan menutup semua koneksinya (gampangnya pada saat destructor php nya nyala maka secara otomatis koneksi ke database akan di tutup)
 */