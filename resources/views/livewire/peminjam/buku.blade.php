<div class="container">
    @include('adminlte.flash')
    <div class="row">
        <div class="col-md-8 mb-4">
            <h1>{{$title}}</h1>
        </div>
        @if (!$detail_buku)
            <div class="col-md-4">
              <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2">
                  <input wire:model="search" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cari Buku">
                  <div class="input-group-prepend">
                    <button class="input-group-text">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
            </div>
        @endif
        
    </div>

   @if ($detail_buku)

    <div class="row">
        <div class="col-md-4">
            <img src="/storage/{{$buku->sampul}}" alt="{{$buku->judul}}" width="300" height="400">
        </div>
        <div class="col-md-8">
            <table class="table">
                </thead>
                <tbody>
                  <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td>{{$buku->judul}}</td>
                  </tr>
                  <tr>
                    <td>Penulis</td>
                    <td>:</td>
                    <td>{{$buku->penulis}}</td>
                     </tr>
                  <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    <td>{{$buku->kategori->nama}}</td>
                </tr>
                  <tr>
                    <td>Penerbit</td>
                    <td>:</td>
                    <td>{{$buku->penerbit->nama}}</td>
                </tr>
                  <tr>
                    <td>Rak</td>
                    <td>:</td>
                    <td>{{$buku->rak->rak}}</td>
                </tr>
                  <tr>
                    <td>Baris</td>
                    <td>:</td>
                    <td>{{$buku->rak->baris}}</td>
                </tr>
                  <tr>
                    <td>Stok</td>
                    <td>:</td>
                    <td>{{$buku->stok}}</td>
                </tr>
                </tbody>
              </table>

              <button wire:click="keranjang({{$buku->id}})" class="btn btn-success">Keranjang</button>
        </div>
    </div>

   @else

        @if ($buku->isNotEmpty())
        <div class="row">
        @foreach ($buku as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div wire:click="detailBuku({{$item->id}})"class="card mb-4 shadow" style="cursor: pointer">
                    <img src="/storage/{{$item->sampul}}" class="card-img-top" alt="{{$item->judul}}" width="200" height="400">
                    <div class="card-body">
                      <h5 class="card-title"><strong>{{$item->judul}}</strong></h5>
                      <p class="card-text">{{$item->penulis}}</p>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            {{$buku->links()}}
        </div>

        @else

        <div class="alert alert-danger">
            Data tidak ada
        </div>

        @endif
   @endif


</div>
