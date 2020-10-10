@extends('main')
@section('title','Dhasboard')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>kategori</h1>
                <form action="pro" method="get">
                  <input name="find" type="text" placeholder="cari nama ">
                  <button type="submit" class="btn btn-success">cari</button>
                </form>
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

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card ">
            <div class="card-header bg-danger">
                <div class="pull-left">
                    <strong>kategori</strong>
                </div>

                <div class="pull-right">
                  
                    <a href="{{url('kategori/ad')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-pluss"> Add</i>
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered  ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>

                                  <form action="kategori" method="get">
                                  <input type="hidden" name="A" type="text" value="kd_kategori">
                                  <button type="submit" class="btn btn-primary">A</button>
                                  </form>

                                  <form action="kategori" method="get">
                                  <input type="hidden" name="B" type="text" value="kd_kategori">
                                  <button type="submit" class="btn btn-primary">Z</button>
                                  </form>


                            </th>
                            <th> 

                                  <form action="kategori" method="get">
                                  <input type="hidden" name="A" type="text" value="nama_kategori">
                                  <button type="submit" class="btn btn-primary">A</button>
                                  </form>

                                  <form action="kategori" method="get">
                                  <input type="hidden" name="B" type="text" value="nama_kategori">
                                  <button type="submit" class="btn btn-primary">Z</button>
                                  </form>
                                  </th>

                           
                            <th>   </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                        <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{$item->kd_kategori}}</td>
                             <td>{{$item->nama_kategori}}</td>
                            
                             <td>
                                <a href="{{url('kategori/edit/'.$item->id)}}" class="btn btn-warning btn-sm"> 
                                     <i class="fa fa-pencil "> </i>
                                 </a>
                            <form action="{{url('kategori/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('yakin hapus data')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" >
                                <i class="fa fa-trash"></i>
                            </button>
                            </form>
                            </td>
                         </tr>
                        @endforeach
                    </tbody>
                 </table>
                 <div class="pull-left">
                    Showing
                    {{ $kategori->firstitem()}}
                    to
                    {{ $kategori->lastitem()}}
                    of
                    {{$kategori->total()}}
                    entried

                </div>
                <div class="pull-right">{{ $kategori->links() }}</div>
            </div>
        </div>
    </div>
</div>
    
@endsection