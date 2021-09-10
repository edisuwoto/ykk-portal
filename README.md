<p align="center">
YKK-PORTAL
</p>

## Persyaratan Sistem

YKK-Portal dapat dijalankan di perangkat dengan aplikasi yang sudah terinstal sebagai berikut :

- PHP versi 7.4
- Composer versi 2.1.6
- NPM versi 7.18.1
- NodeJS versi 16.4.1
- MariaDB versi 10 atau MySQL versi 5
- Git versi 2.25.1

## Langkah Instalasi

- Siapkan database dengan collation di MariaDB atau MySQL <code>utf8mb4_general_ci</code>,
- Salin repositori ini dengan menjalankan Git di terminal Anda dengan menggunakan perintah ;
  <code>git clone https://github.com/wafiqamrillah/ykk-portal.git</code>
- Arahkan terminal ke direktori repositori yang telah Anda salin,
- Pada direktori tersebut, instal paket-paket yang dibutuhkan aplikasi dengan Composer menggunakan perintah ;
  <code>composer install</code>
- Setelah composer berhasil instal paket-paket aplikasi, instal paket-paket yang dibutuhkan aplikasi dengan NPM menggunakan perintah ;
  <code>npm install</code>
- Setelah NPM berhasil instal paket-paket aplikasi, susun aset-aset yang dibutuhkan aplikasi dengan NPM menggunakan perintah ;
  <code>npm run prod</code>
- Setelah NPM berhasil menyusun aset, salin file <code>.env.example</code> menjadi <code>.env</code> dengan menggunakan perintah ;
  Linux :
  <code>cp .env.example .env</code>
  Windows :
  <code>copy .env.example .env</code>
  atau melalui Windows Explorer
- Setelah menyalin file, konfigurasi file <code>.env</code> Anda, sesuaikan DB_HOST, DB_PORT, DB_USERNAME, dan DB_PASSWORD dengan konfigurasi database Anda,
- Setelah konfigurasi, lakukan <span style="font-style : italic;">generate key app</span> dengan menggunakan perintah ;
  <code>php artisan key:generate</code>
- Setelah itu, jalankan perintah migrasi dan seeder untuk membuat tabel-tabel yang akan dibuatkan dan mengisi data-data oleh aplikasi dengan menggunakan perintah ;
  <code>php artisan migrate --seed</code>
- Pastikan database server sudah berjalan,
- Anda dapat menjalankan aplikasi dengan menggunakan perintah ;
  <code>php artisan serve</code>
  Untuk membuka aplikasi pada browser Anda, secara default alamatnya adalah <code>http://127.0.0.1:8000</code>. Namun, Anda bisa kustom dengan webserver yang Anda ketahui.
