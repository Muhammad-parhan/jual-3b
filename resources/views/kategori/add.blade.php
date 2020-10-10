@extends('main')
@section('title','Dhasboard')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kategori</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')
<div class="content mt-3">

    <div class="animated fadeIn">

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>tambah kategori</strong>
                </div>
                <div class="pull-right">
                    <a href="{{url('kategori')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-pluss"> back</i>
                    </a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-4 offset-md-4">
                        <form action="{{url('kategori/addp')}}" method="POST">
                            <div class="from-groub">
                                @csrf
                                <label>kode kategori </label>
                            <input type="text" name="kd_kategori" class="form-control @error('kd_kategori') is-invalid @enderror" value="{{Old('kd_kategori')}}" autofocus >
                                @error('kd_kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="from-groub">
                                <label>nama kategori</label>
                                <input name="nama_kategori" class="form-control  @error('nama_kategori') is-invalid @enderror" value="{{ Old('nama_kategori')}}" autofocus >
                                @error('nama_kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">save</button>
                        </form>
                    </div>
                </div>

         
            </div>
        </div>
    </div>
</div>
    
@endsection