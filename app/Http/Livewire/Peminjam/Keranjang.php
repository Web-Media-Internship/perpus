<?php

namespace App\Http\Livewire\Peminjam;

use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;

class Keranjang extends Component
{
    public function render()
    {
        return view('livewire.peminjam.keranjang',[
            'keranjang' => Peminjaman::latest()->where('peminjam_id', auth()->user()->id)->where('status', '!=', 3)->first()
    ]);
    }

    public function hapus(Peminjaman $peminjaman,DetailPeminjaman $detail_peminjaman){
        if ($peminjaman->detail_peminjaman->count() == 1) {
            $detail_peminjaman->delete();
            $peminjaman->delete();
            session()->flash('sukses', 'Data berhasil di hapus');
            redirect('/');
        } else {
            $detail_peminjaman->delete();
            session()->flash('sukses', 'Data berhasil di hapus');
        }


    }
}
