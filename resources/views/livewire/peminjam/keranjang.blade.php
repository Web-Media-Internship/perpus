<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Keranjang</h1>
        </div>
    </div>

    @include('adminlte.flash')

    <div class="row" style="margin-top: 10px">
        <div class="col-md-12 mb-4">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input  wire:model="tanggal_pinjam" type="date" class="form-control" id="tanggal_pinjam">
            @error('tanggal_pinjam') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3" >
            @if ($keranjang->tanggal_pinjam)
            <strong>Tanggal Pinjam: {{$keranjang->tanggal_pinjam}}</strong>
            @else
            <button wire:click="pinjam({{$keranjang->id}})" class="btn btn-sm btn-success" >Pinjam</button>
            @endif
            {{-- <strong class="float-right">Kode Pinjam : {{$keranjang->kode_pinjam}}</strong> --}}
        </div>
    </div>
    <div class="row" >
        <table class="table table-hover text-nowrap">

            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Rak</th>
                <th>Baris</th>
                <th>
                    @if(!$keranjang->tanggal_pinjam)

                    @endif
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($keranjang->detail_peminjaman as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                <td>{{$item->buku->judul}}</td>
                <td>{{$item->buku->penulis}}</td>
                <td>{{$item->buku->rak->rak}}</td>
                <td>{{$item->buku->rak->baris}}</td>
                <td>
                    @if(!$keranjang->tanggal_pinjam)
                    <button wire:click="hapus({{$keranjang->id}},{{$item}})" class="btn btn-sm btn-danger">Hapus</button>
                    @endif
                </tr>

                @endforeach
            </tbody>
          </table>

          @if(!$keranjang->tanggal_pinjam)
            <button wire:click="hapusSemua" style="width: 120px" class="btn btn-sm btn-danger">Hapus Semua</button>
          @endif
    </div>

</div>
