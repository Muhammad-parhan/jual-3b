@extends('main')
@section('content')

<div class="inner-sidebar mr-3">
        <div class="sidebar-menu-container">
            <div class="card-body">
            <div class="col-sm-12">
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                        <form action="{{url('produk/'.$produk->id)}}" class="form-horizontal mt-4 mb-5" method="POST">
                            <div class="from-groub">
                              @method('patch')
                                @csrf
                                <label>Kode Produk </label>
                            <input type="text" name="kd_brg" class="form-control @error('kd_brg') is-invalid @enderror" value="{{Old('kd_brg',$produk->kd_brg)}}" autofocus >
                                @error('kd_brg')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="from-groub">
                                <label>Nama Produk</label>
                                <input name="nama" class="form-control  @error('nama') is-invalid @enderror" value="{{ Old('nama',$produk->nama)}}" autofocus >
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="from-groub">
                                <label>Harga</label>
                                <input name="harga" class="form-control  @error('harga') is-invalid @enderror" value="{{ Old('harga',$produk->harga)}}" autofocus >
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="from-groub">
                                <label>Kode Kategori</label>
                                <input readonly class="form-control  @error('kd_kategori') is-invalid @enderror" value="{{ Old('kd_kategori',$produk->kd_kategori)}}" autofocus >
                                @error('kd_kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="from-groub">
                                    <select name="kd_kategori" id="" class="custom-select" required>
                                        <option value="">Pilih Kode Kategori</option>
                                        @foreach($kategori as $item)
                                        <option value="{{$item->kd_kategori}}">{{$item->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="from-groub">
                                <label>Stok Produk</label>
                                <input name="stok" class="form-control  @error('stok') is-invalid @enderror" value="{{ Old('stok',$produk->stok)}}" autofocus >
                                @error('stok')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="pull-right">
                            <button type="submit" class="btn btn-success shadow">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection
