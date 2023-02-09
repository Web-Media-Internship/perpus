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
            <input type="date" class="form-control" id="tanggal_pinjam">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3" >
            <button wire:click="hapusSemua" class="btn btn-sm btn-danger">Hapus Semua</button>
            <strong style="float-right">Kode Pinjam : {{$keranjang->kode_pinjam}}</strong>
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
                <th></th>
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
                <td><button wire:click="hapus({{$keranjang->id}},{{$item}})" class="btn btn-sm btn-danger">Hapus</button></td>
                </tr>

                @endforeach
            </tbody>
          </table>
          <button class="btn btn-sm btn-success" style="width: 140px">Pinjam</button>
    </div>
</div>
