<?php

namespace App\Http\Livewire\Peminjam;
use App\Models\Kategori as ModelsKategori;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Kategori extends Component
{
    protected $listeners = ['tambahKeranjang'];

    public $count;

    public function mount()
    {
        if (auth()->user()) {
            $this->count = DB::table('peminjaman')
                ->join('detail_peminjaman', 'peminjaman.id', '=', 'detail_peminjaman.peminjaman_id')
                ->where('peminjam_id', auth()->user()->id)
                ->where('status', '!=', 3)
                ->count();
        }
    }

    public function semuaKategori()
    {
        $this->emit('semuaKategori');
    }
    public function pilihKategori($id)
    {
        $this->emit('pilihKategori',$id);
    }
    public function render()
    {
        return view('livewire.peminjam.kategori',[
            'kategori' => ModelsKategori::where('id', '!=', 1)->get(),
            'count' => $this->count
        ]);
    }

    public function tambahKeranjang()
    {
        $this->count += 1;
    }
}
