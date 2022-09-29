--PHP MYSQL DATABASE--

--Pengenalan PDO

1. pdo adalah singkatan dari php data object
2. yaitu sebuah spesifikasi interface (API) untuk standard komunikasi antara php dengan database. Dengan menggunakan PDO ini, kita dapat melakukan query ke database apapun misalnya mysql, posgre, sqlite dll cuma menggunakan si PDO ini (gampangnya kita tidak perlu membuat query ulang ketika kita ingin pindah ke database lain (kita cuma perlu mengubah perintah sql nya saja sesuai database yang ingin digunakan)).
3. pdo adalah sebuah spesifikasi, sehingga kita butuh implementasinya atau extension nya atau driver nya untuk mengaktifkan pdo. Jadi sebelum menggunakan pdo kita harus memastikan bahwa driver pdo nya sudah terinstall di dalam php kita (kita dapat melihat apakah driver pdo dari database yang ingin kita gunakan sudah terinstall di dalam php kita dengan cara buat file php baru lalu tulis kode phpinfo(); lalu jalankan file tersebut di terminal kemudian cari kata pdo pada result yang diberikan (pastikan driver pdo dari database yang ingin kita gunakan tersebut sudah enabled))
4. PDO menyediakan abstraction layer yang sama untuk semua database. Yang artinya mau menggunakan database apapun, kita akan menggunakan kode PDO yang sama, dan cara kerjanya pun sama.
5. Hal ini membuat penggunaan PDO lebih fleksibel dibandingkan menggunakan function-function bawaan dari driver databasenya.

-- Cara Kerja PDO

1. pertama kode program php kita akan memanggil class-class yang ada di PDO
2. lalu PDO akan memilihkan driver mana yang cocok dengan apa yang kita mau. Jadi waktu kita membuat pdo nanti kita akan menentukan driver mana yang akan kita pakai misalnya mysql
3. lalu pdo driver akan memanggil ke database
4. jadi kode program kita cukup memanggil si pdo nya

-- Mysql

1. kali ini kita akan menggunakan Mysql sebagai database yang akan kita gunakan untuk praktek php database
