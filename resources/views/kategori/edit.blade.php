@extends('main')
@section('content')

<div class="inner-sidebar mr-3">
        <div class="sidebar-menu-container">
            <div class="card-body">
            <div class="col-sm-12">
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                        <form action="{{url('kategori/'.$kategori->id)}}" class="form-horizontal mt-4 mb-5" method="POST">
                            <div class="from-groub">
                              @method('patch')
                                @csrf
                                <label>Kode Kategori </label>
                            <input type="text" name="kd_kategori" class="form-control @error('kd_kategori') is-invalid @enderror" value="{{Old('kd_kategori',$kategori->kd_kategori)}}" autofocus >
                                @error('kd_kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="from-groub">
                                <label>Nama Kategri</label>
                                <input name="nama_kategori" class="form-control  @error('nama_kategori') is-invalid @enderror" value="{{ Old('nama_kategori',$kategori->nama_kategori)}}" autofocus >
                                @error('nama_kategori')
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
