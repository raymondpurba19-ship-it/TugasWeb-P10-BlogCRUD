# TugasWeb-P10-BlogCRUD

Tugas Rutin Pertemuan 10 - Blog CRUD pakai Laravel 12.

## Fitur
- CRUD artikel (tambah, lihat, edit, hapus) pakai `Route::resource`
- Layout master Blade (`@extends` / `@yield`)
- Component `x-alert` dan `x-card`
- Validasi form + pesan error per field + old input
- Flash message sukses / gagal
- Route Model Binding + pagination
- Bonus: pencarian, soft delete (menu Sampah), upload gambar

## Cara Menjalankan
```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```
Lalu buka http://127.0.0.1:8000
