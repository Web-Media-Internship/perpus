<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'judul' => 'bulan',
            'slug' => Str::slug('bulan'),
            'sampul' => 'buku/Bulan.jpg',
            'penulis' => 'tere liye',
            'penerbit_id' => 1,
            'kategori_id' => 2,
            'rak_id' => 1,
            'stok' => 10
        ]);

        Buku::create([
            'judul' => 'matahari',
            'slug' => Str::slug('matahari'),
            'sampul' => 'buku/matahari.jpg',
            'penulis' => 'tere liye',
            'penerbit_id' => 1,
            'kategori_id' => 2,
            'rak_id' => 1,
            'stok' => 10
        ]);
    }
}
