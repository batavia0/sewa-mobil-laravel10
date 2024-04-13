# Laravel 10 - Rental Mobil

## Download

Clone Projek

```bash
  git clone https://github.com/batavia0/sewa-mobil-laravel10.git nama_projek
```

Masuk ke folder dengan perintah

```bash
  cd nama_projek
```

-   Copy .env.example menjadi .env kemudia edit databasenya

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan artisan migrate:fresh --seed
```

```bash
    php artisan storage:link
```
Run Development
```bash
    npm install && npm run dev
```
Run Application
```bash
     php artisan serve
```

#### Login Admin

-   email = admin@admin.com
-   password = 123

### Login User Rental

-   email = alice@mail.com
-   password = 123

### Alur User Rental

-   User ke halaman utama mencari Pilih Kategori Mobil dan Jumlah Penumpang
-   Klik Cari
-   Muncul pilihan pilih "Sewa Sekarang"
-   Isi data
-   Submit
-   Register dan Login dengan nomor yang pada pada "Isi Data" peminjaman mobil

### Alur User Admin

-   Admin terlebih dahulu menambahkan Kategori dan Mobil dengan login user admin@admin.com

### Fitur Aplikasi:
1. Registrasi Pengguna:
• Pengguna dapat mendaftar dengan mengisi informasi pribadi seperti nama, alamat,
nomor telepon, dan nomor SIM.
• Informasi pengguna harus disimpan dan dapat diakses kembali.
2. Manajemen Mobil:
• Pengguna dapat menambahkan mobil baru ke dalam sistem dengan mengisi detail mobil
seperti merek, model, nomor plat, dan tarif sewa per hari.
• Data mobil yang ditambahkan harus disimpan dalam sistem dan dapat diakses kembali.
• Pengguna dapat mencari mobil berdasarkan merek, model, atau ketersediaan.
• Pengguna dapat melihat daftar semua mobil yang tersedia untuk disewa.
3. Peminjaman Mobil:
• Pengguna dapat memesan mobil dengan memasukkan tanggal mulai dan tanggal selesai
penyewaan, serta memilih mobil yang tersedia.
• Sistem harus memverifikasi ketersediaan mobil pada tanggal yang diminta.
• Data peminjaman harus disimpan dan dapat diakses kembali.
• Pengguna dapat melihat daftar mobil yang sedang mereka sewa.
4. Pengembalian Mobil:
• Pengguna dapat mengembalikan mobil yang telah mereka sewa dengan memasukkan nomor
plat mobil.
• Sistem harus memverifikasi bahwa mobil tersebut benar-benar disewa oleh pengguna
tersebut dan menghitung jumlah hari penyewaan.
• Data pengembalian harus disimpan dan dapat diakses kembali.
• Sistem harus menghitung jumlah biaya sewa berdasarkan tarif harian dan durasi
sewa.
5. Keluar Aplikasi:
• Pengguna dapat keluar dari aplikasi & login lagi di lain waktu