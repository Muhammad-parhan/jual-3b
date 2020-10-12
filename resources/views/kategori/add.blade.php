@extends('main')
@section('content')
    <div class="inner-sidebar mr-3">
        <div class="sidebar-menu-container">
            <div class="card-body">
            <div class="col-sm-12">
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                        <form action="{{url('kategori/addp')}}" method="POST">
                            <div class="from-groub">
                                @csrf
                                <label>Kode Kategori </label>
                            <input type="text" name="kd_kategori" class="form-control @error('kd_kategori') is-invalid @enderror" value="{{Old('kd_kategori')}}" autofocus >
                                @error('kd_kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="from-groub">
                                <label>Nama Kategori</label>
                                <input name="nama_kategori" class="form-control  @error('nama_kategori') is-invalid @enderror" value="{{ Old('nama_kategori')}}" autofocus >
                                @error('nama_kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success shadow">Tambah Kategori</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
</div>

@endsection
