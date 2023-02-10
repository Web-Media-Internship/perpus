<?php

namespace App\Http\Livewire\Peminjam;
use App\Models\Buku as ModelsBuku;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategori as ModelsKategori;
use Illuminate\Support\Facades\DB;

class Buku extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['pilihKategori','semuaKategori'];

    public $kategori_id, $pilih_kategori,$detail_buku,$buku_id, $search;

    public function pilihKategori($id)
    {
        $this->format();
        $this->kategori_id = $id;
        $this->pilih_kategori = true;
        $this->updatingSearch();
    }

    public function semuaKategori()
    {
        $this->format();
        $this->pilih_kategori = false;
        $this->updatingSearch();
    }

    public function detailBuku($id)
    {
        $this->format();
        $this->detail_buku = true;
        $this->buku_id = $id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function keranjang(ModelsBuku $buku)
    {

        //user harus login
        if (auth()->user()) {
            if (auth()->user()->hasRole('peminjam')) {

                //role peminjam
                $peminjaman_lama = DB::table('peminjaman')
                ->join('detail_peminjaman', 'peminjaman.id', '=', 'detail_peminjaman.peminjaman_id')
                ->where('peminjam_id', auth()->user()->id)
                ->where('status','!=',3)
                ->get();

                //jumlah maximal 2
                if ($peminjaman_lama->count() == 2) {

                    session()->flash('gagal', 'Buku yang dipinjam maximal 2');
                } else {

                    //peminjaman sudah ada isinya
                    if ($peminjaman_lama->count() == 0) {
                        $peminjaman_baru = Peminjaman::create([
                            'kode_pinjam' => random_int(10000000,99999999),
                            'peminjam_id' => auth()->user()->id,
                            'status' => 0
                        ]);

                        DetailPeminjaman::create([
                            'peminjaman_id' => $peminjaman_baru->id,
                            'buku_id' => $buku->id
                        ]);
                        // $this->emit('tambahKeranjang');
                        session()->flash('sukses', 'Buku berhasil ditambahkan ke dalam keranjang');
                    } else {
                        if ($peminjaman_lama[0]->buku_id == $buku->id) {
                            session()->flash('gagal', 'Buku tidak boleh sama');
                        } else {
                            DetailPeminjaman::create([
                                'peminjaman_id' => $peminjaman_lama[0]->peminjaman_id,
                                'buku_id' => $buku->id
                            ]);

                            // $this->emit('tambahKeranjang');
                            session()->flash('sukses', 'Buku berhasil ditambahkan ke dalam keranjang');
                        }

                    }

                }


            } else{
                session()->flash('gagal', 'Role user anda bukan peminjam');
            }
        } else {
            session()->flash('gagal', 'Anda harus login terlebih dahulu');
            redirect('/login');
        }

    }

    public function render()
    {
        if ($this->pilih_kategori) {
            $buku = ModelsBuku::latest()->where('kategori_id',$this->kategori_id)->paginate(12);
            $title = ModelsKategori::find($this->kategori_id)->nama;
        }elseif($this->detail_buku){
            $buku = ModelsBuku::find($this->buku_id);
            $title = 'Detail Buku';
        } else {
            if ($this->search) {
                $buku = ModelsBuku::latest()->where('judul','like','%'. $this->search .'%')->paginate(12);
            } else {
                $buku = ModelsBuku::latest()->paginate(12);
            }


            $title = 'Semua Buku';
        }
        return view('livewire.peminjam.buku',compact('buku','title'));
    }

    public function format()
    {
        $this->detail_buku = false;
        $this->pilih_kategori = false;
        unset($this->buku_id);
        unset($this->kategori_id);
    }
}
