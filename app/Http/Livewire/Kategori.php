<?php

namespace App\Http\Livewire;
Use App\Models\Kategori as ModelsKategori;
use App\Models\Rak;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class Kategori extends Component
{
    public $create,$edit,$nama,$kategori_id,$delete;

    protected $rules = [
        'nama' => 'required|min:5',
    ];

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function store(){
        $this->validate();

        ModelsKategori::create([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan');

        $this->format();
    }

    public function create()
    {
        $this->format();
        $this->create = true;
    }

    public function render()
    {

        return view('livewire.kategori',[
            'kategori' => ModelsKategori::latest()->paginate(5) //mengubah row table

        ]);
    }

    public function format(){
        unset($this->nama);
        unset($this->create);
        unset($this->kategori_id);
        unset($this->edit);
        unset($this->delete);
    }

    public function edit(ModelsKategori $kategori){
        $this->format();
        $this->edit = true;
        $this->nama = $kategori->nama;
        $this->kategori_id = $kategori->id;
    }

    public function update(ModelsKategori $kategori){


        $this->validate();
        $kategori->update([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil diubah');

        $this->format();
    }

    public function delete($id){

        $this->format();

        $this->delete = true;
        $this->kategori_id = $id;
    }

    public function destroy(ModelsKategori $kategori){

        $rak = Rak::where('kategori_id', $kategori->id)->get();
        foreach ($rak as $key => $value) {
            $value->update([
                'kategori_id' => 1
            ]);
        }

        // $buku = Buku::where('kategori_id', $kategori->id)->get();
        // foreach ($buku as $key => $value) {
        //     $value->update([
        //         'kategori_id' => 1
        //     ]);
        // }

        $kategori->delete();

        session()->flash('sukses', 'Data berhasil dihapus');

        $this->format();
    }
}
