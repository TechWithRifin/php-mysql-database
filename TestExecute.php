<?php



/**
 * * Execute SQL
 * setelah kita terkoneksi ke database, sudah pasti kita ingin mengirim perintah SQL ke database tersebut menggunakan aplikasi php yang kita buat
 * untuk mengirim perintah SQL, kita bisa menggunakan sebuah function didalam PDO yang bernama execute("perintahSQLnya"). Function ini nanti secara otomatis mengirim perintah SQL tersebut ke database mysql nya
 * perlu diperhatikan bahwa function execute("perintahSQLnya") ini bisa kita gunakan untuk semua jenis perintah SQL misalnya select, insert, update, delete dan lain-lain. Hanya saja masalahnya adalah function execute itu tidak memiliki return value nya. Jadi jika kita mengirim perintah select maka nggak ada hasil valuenya. Maka dari itu function execute itu cocok untuk perintah - perintah sql yang tidak butuh kembalian data dari database misalnya create table, insert data, update data, delete data dan lain - lain
 * Khusus untuk select terdapat function sendiri untuk melakukan proses query data
 */

// ?note : kita tidak disarankan untuk melakukan Data Definition Language seperti create table, alter table dan lain lain di aplikasi PHP nya. Jika kita ingin melakukan DDL maka disarankan membuat semacam migration tools. Pada aplikasi PHP nya kita lebih fokus pada Data Manipulation Languange seperti Insert data, update data, delete data dan lain - lain.