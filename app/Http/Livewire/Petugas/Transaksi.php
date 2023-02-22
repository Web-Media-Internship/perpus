<?php

namespace App\Http\Livewire\Petugas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Peminjaman;

class Transaksi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // public $belum_dipinjam,$sedang_dipinjam,$selesai_dipinjam;

    // public function belumDipinjam(Type $var = null)
    // {
    //     $this->format();
    //     $this->belum_dipinjam = true;
    // }
    // public function sedangDipinjam(Type $var = null)
    // {
    //     $this->format();
    //     $this->sedang_dipinjam = true;
    // }
    // public function selesaiDipinjam(Type $var = null)
    // {
    //     $this->format();
    //     $this->selesai_dipinjam = true;
    // }

    public function render()
    {
        // if ($this->belum_dipinjam) {
        //     $transaksi = Peminjaman::latest()->where('status', 1)->paginate(5);
        // }elseif ($this->sedang_dipinjam) {
        //     $transaksi = Peminjaman::latest()->where('status', 2)->paginate(5);
        // }elseif ($this->selesai_dipinjam) {
        //     $transaksi = Peminjaman::latest()->where('status', 3)->paginate(5);
        // } else {
        //     $transaksi = Peminjaman::latest()->where('status', '!=', 0)->paginate(5);
        // }

            //'transaksi=>$transaksi'
        return view('livewire.petugas.transaksi', [
            'transaksi' => Peminjaman::latest()->where('status', '!=', 0)->paginate(5)
        ]);


    }

    public function format()
    {
        $this->sedang_dipinjam = false;
        $this->belum_dipinjam = false;
        $this->selesai_dipinjam = false;
    }
}
