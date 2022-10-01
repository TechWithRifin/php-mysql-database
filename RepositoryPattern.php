<?php

require_once __DIR__ . '/GetConnection.php';
require_once __DIR__ . '/Model/Comment.php';
require_once __DIR__ . '/Repository/CommentRepository.php';

use Repository\CommentRepositoryImpl;
use Model\Comment;

$connection  = getConnection();
$repository = new CommentRepositoryImpl($connection);

// test insert
// $comment = new Comment(email: "repository@test.com", comment: "Hi");
// melakukan insert data dengan repository
// $newComment = $repository->insert($comment);
// var_dump($newComment->getId());

// test findById

// $comment = $repository->findById(39);
// var_dump($comment);

// test findAll

$comment = $repository->findAll();
var_dump($comment);

$connection = null;

/**
 * *Repository Pattern
 * Dalam buku Domain-driven design karya eric evans, dia menjelaskan bahwa "repository adalah mekanisme untuk mengenkapsulasi storage, cara pengambilan data dan cara pencarian data dimana dia mengemulasikan atau mensimulasikan collection of object". Jadi intinya kalau kita ingin melakukan manipulasi data di database itu ada baiknya kalau kita coba implementasi repository pattern. jadi nanti kita buat sebuah class untuk repository dimana class tersebut digunakan untuk komunikasi antara aplikasi kita dengan database menggunakan PDO. Jadi nanti dari bisnis logic kita itu nggak butuh lagi ngelakuin query sql cukup manggil si repository class nya
 * Pattern repository ini biasanya digunakan sebagai jembatan antara bisnis logic aplikasi kita dengan semua perintah SQL ke database.
 * jadi semua perintah sql nya itu akan ditulis di repository, sedangkan business logic nya itu cukup menggunakan repository tersebut 
 */

/** 
 * * Penjelasan diagram repository pattern *
 * mula-mula bussines logic akan melakukan pemanggilan ke repository. Biasanya kita akan membuat repository nya dalam bentuk interface dulu
 * kemudian interface repository itu akan menggunakan entity atau model.
 * kemudian kita akan membuat implementasi class repository nya berdasarkan interface repository yang sudah dibuat
 * Pada class repository tersebut kita bisa menggunakan pdo untuk terkoneksi ke database 
 */

// ?note : model dan entity itu sebenarnya sama saja. entity atau model itu adalah class representasi dari tabel yang ada di database. Sebenarnya nanti pada kenyataannya saat kita membuat data tabel didalam database, ideal kita akan bikin representasi classnya didalam aplikasi kita. Jadi misalnya kalau kita buat table comments, kita juga perlu bikin class comments

/**
 * * Entity atau Model
 * dalam bahasa pemrograman berorientasi object, biasanya sebuah table di database akan selalu dibuat representasinya sebagai class entity atau model (rata-rata kalau di php kita menyebut entity dengan sebutan model. Kalau di bahasa pemrograman lain seperti java itu bilangnya entity)
 * model bisa mempermudah kita ketika membuat kode program
 * misalnya ketika kita query ke repository, dibandingkan mengembalikan array yang ribet, alangkah baiknya jika didalam class repository kita melakukan konversi terlebih dahulu hasil querynya di dalam class entity atau model, sehingga yang tadinya array hasil query menggunakan pdo menjadi object entity atau model.     
 * contoh entity atau model ada di class comment didalam file comment.php (class ini merepresentasikan tabel comment didalam database (class ini disebut entity atau model comment)) 
 */