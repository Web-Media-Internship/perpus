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
            'judul' => 'Dreams',
            'slug' => Str::slug('Dreams'),
            'sampul' => 'buku\Dreams.jpeg',
            'penulis' => 'tere liye',
            'penerbit_id' => 2,
            'kategori_id' => 2,
            'rak_id' => 2,
            'stok' => 10
        ]);
        Buku::create([
            'judul' => 'Fall',
            'slug' => Str::slug('Fall'),
            'sampul' => 'buku\Fall.jpeg',
            'penulis' => 'Jared Muralt',
            'penerbit_id' => 2,
            'kategori_id' => 3,
            'rak_id' => 3,
            'stok' => 10
        ]);
        Buku::create([
            'judul' => 'Nobody Knows But You',
            'slug' => Str::slug('Nobody-Knows-But-You'),
            'sampul' => 'buku\Nobody_Knows_but_you.png',
            'penulis' => 'tere liye',
            'penerbit_id' => 2,
            'kategori_id' => 4,
            'rak_id' => 2,
            'stok' => 10
        ]);
        Buku::create([
            'judul' => 'Not Here to Be Liked',
            'slug' => Str::slug('Not-Here-to Be-Liked'),
            'sampul' => 'buku\Not_here_to_be_like.jpeg',
            'penulis' => 'Michelle Quach',
            'penerbit_id' => 2,
            'kategori_id' => 5,
            'rak_id' => 2,
            'stok' => 10
        ]);
        Buku::create([
            'judul' => 'The Loneliest Girl In The World',
            'slug' => Str::slug('The-Loneliest-Girl-In-The-World'),
            'sampul' => 'buku\The_loneliest.jpeg',
            'penulis' => 'tere liye',
            'penerbit_id' => 2,
            'kategori_id' => 6,
            'rak_id' => 2,
            'stok' => 10
        ]);
        Buku::create([
            'judul' => 'Utopia',
            'slug' => Str::slug('Utopia'),
            'sampul' => 'buku\Utopia.jpeg',
            'penulis' => 'Andre Hiotis',
            'penerbit_id' => 2,
            'kategori_id' => 2,
            'rak_id' => 2,
            'stok' => 10
        ]);
    }
}
