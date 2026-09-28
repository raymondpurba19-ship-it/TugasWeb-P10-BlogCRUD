<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'judul' => 'Mengenal Laravel, Framework PHP yang Banyak Dipakai',
            'penulis' => 'Raymond',
            'kategori' => 'Teknologi',
            'isi' => "Laravel adalah framework PHP yang dibuat oleh Taylor Otwell dan pertama kali rilis tahun 2011. Laravel memakai konsep MVC (Model, View, Controller) sehingga kode program jadi lebih rapi karena dipisah sesuai tugasnya.\n\nBeberapa fitur yang bikin Laravel populer antara lain Eloquent ORM untuk mengolah database tanpa harus menulis query SQL manual, Blade sebagai template engine, dan Artisan yaitu command line untuk membuat controller, model, sampai migration dengan cepat.\n\nSelain itu komunitas Laravel juga besar, jadi kalau ada error biasanya sudah ada yang pernah membahas solusinya di internet.",
        ]);

        Post::create([
            'judul' => 'Tips Belajar Coding Buat Mahasiswa Pemula',
            'penulis' => 'Raymond',
            'kategori' => 'Kuliah',
            'isi' => "Belajar coding di awal kuliah memang terasa berat, apalagi kalau sebelumnya belum pernah ngoding sama sekali. Berikut beberapa tips yang bisa dicoba.\n\n1. Jangan cuma nonton tutorial, langsung praktek ketik sendiri kodenya.\n2. Kalau ketemu error, baca pesan errornya dulu baru cari di Google.\n3. Bikin project kecil-kecilan, misalnya aplikasi catatan atau to-do list.\n4. Konsisten, lebih baik belajar 1 jam tiap hari daripada 7 jam sekali seminggu.\n\nYang penting jangan takut salah, karena error itu bagian dari proses belajar.",
        ]);
    }
}
