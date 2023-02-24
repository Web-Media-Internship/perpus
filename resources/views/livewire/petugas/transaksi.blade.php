<div class="row">
    <div class="col-12">

    @include('adminlte/flash')

    {{-- @include('petugas.rak.create')
    @include('petugas.rak.edit')
    @include('petugas.rak.delete') --}}

    {{-- <div class="btn-group mb-3">
        <button wire:click="format" class="btn btn-sm bg-teal mr-2">Semua</button>
        <button wire:click="belumDipinjam" class="btn btn-sm bg-indigo mr-2">Belum Dipinjam</button>
        <button wire:click="sedangDipinjam" class="btn btn-sm bg-olive mr-2">Sedang Dipinjam</button>
        <button wire:click="selesaiDipinjam" class="btn btn-sm bg-fuchsia mr-2">Selesai Dipinjam</button>
    </div> --}}

    <div class="card">
        <div class="card-header">
        <span wire:click="create" class="btn btn-sm btn-primary">Tambah</span>

        @if ($transaksi->isNotEmpty())
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            <select wire:model="search" class="form-control float-right" id="exampleFormControlSelect1">
                {{-- @foreach ($count as $item)
                    <option value="{{$item->rak}}">{{$item->rak}}</option>
                @endforeach --}}
            </select>

            <div class="input-group-append">
                <button wire:click="formatSearch" type="submit" class="btn btn-default">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
        </div>
        </div>
        <!-- /.card-header -->
        @if ($transaksi->isNotEmpty())
        <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th width="10%">No</th>
                <th>Kode Pinjam</th>
                <th>Buku</th>
                <th>Lokasi</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Status</th>
                <th width="15%">Aksi</th>
                {{-- @if (!$selesai_dipinjam)
                    <th width="15%">Aksi</th>
                @endif --}}
            </tr>
            </thead>
            <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->kode_pinjam}}</td>
                    <td>
                        <ul>
                            @foreach ($item->detail_peminjaman as $detail_peminjaman )
                                    <li>{{$detail_peminjaman->buku->judul}}</li>
                            @endforeach
                        </ul>

                    </td>
                    <td>
                        <ul>
                            @foreach ($item->detail_peminjaman as $detail_peminjaman )
                                    {{-- <li>Rak : {{$detail_peminjaman->buku->rak->rak}}, Baris : {{$detail_peminjaman->buku->rak->baris}}</li> --}}
                                    <li>{{$detail_peminjaman->buku->rak->lokasi}}</li>
                            @endforeach
                        </ul>
                    </td>

                    {{-- <td>{{\Carbon\Carbon::create($item->tanggal_pinjam)->format('d-m-Y')}}</td>
                    <td>{{\Carbon\Carbon::create($item->tanggal_kembali)->format('d-m-Y')}}</td> --}}
                    {{-- <td>Rp. {{$item->denda ? number_format($item->denda) : '-' }}</td> --}}
                    <td>{{$item->tanggal_pinjam}}</td>
                    <td>{{$item->tanggal_kembali}}</td>
                    <td>{{$item->denda}}</td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge bg-indigo">Belum Dipinjam</span>
                        @elseif ($item->status == 2)
                        <span class="badge bg-olive">Sedang Dipinjam</span>
                        @else
                        <span class="badge bg-fuchsia">Selesai Dipinjam</span>
                        @endif
                    </td>
                    {{-- @if (!$selesai_dipinjam)
                    <td>
                        @if ($item->status == 1)
                        <span wire:click="edit({{$item->id}})" class="btn btn-sm btn-success mr-2">Pinjam</span>
                        @elseif($item->status == 2)
                        <span wire:click="edit({{$item->id}})" class="btn btn-sm btn-primary mr-2">Kembali</span>
                        @endif

                    </td>
                    @endif --}}
                    <td>
                        @if ($item->status == 1)
                        <span wire:click="edit({{$item->id}})" class="btn btn-sm btn-success mr-2">Pinjam</span>
                        @elseif($item->status == 2)
                        <span wire:click="edit({{$item->id}})" class="btn btn-sm btn-primary mr-2">Kembali</span>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif

        </div>
        <!-- /.card-body -->
      @endif
      <!-- /.card -->
    </div>
      <div class="row justify-content-center">
        {{$transaksi->links()}}
      </div>

    </div>

    @if ($transaksi->isEmpty())
        <div class="card">
            <div class="card-body">
                <div class="alert alert-warning">
                    Anda tidak memiliki data
                </div>
            </div>
        </div>
    @endif

    </div>
</div>
<!-- /.row -->

