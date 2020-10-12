@extends('main')
@section('title','Dhasboard')

@section('content')

<style>
.btn-group button {
  background-color: #4CAF50; /* Green background */
  border: 1px white; /* Green border */
  color: white; /* White text */
  padding: 1px 1px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: right; /* Float the buttons side by side */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}
</style>

<!-- //--------------------------------------------------------------- -->
            <div class="col-sm-12">
            <h5 class="mb-0" ><strong></strong></h5>
                <span class="text-secondary"><i class="fa fa-angle-right"></i> </span>
                <!--Datatable-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <h6 class="mb-2"></h6>
            <div class="table-responsive">
            <a href="/kategori/ad"><button class="btn btn-success shadow">Tambah</button></a>
            <form action="/kategori" method="get">
            <div class="form-group row">
                <div class="col-sm-10">
                    <input class="form-control" name="find" type="text" placeholder="Cari...">
                </div>
                <div class="">
                <button type="submit" class="btn btn-success icon-round shadow"><i class="fa fa-search"></i> </button>
                </div>
            </div>
            </form>
                <table class="table table-bordered  ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>
                                  <form action="kategori" method="get">
                                  <input type="hidden" name="A" type="text" value="kd_kategori">
                                  <div class="btn-group pull-right">
                                  <div class="pull-right">KODE</div>
                                  <div class="pull-right text-white">123456789123456789123456</div>
                                  <button type="submit">A</button>
                                  </form>
                                  <form action="kategori" method="get">
                                  <input type="hidden" name="B" type="text" value="kd_kategori">
                                  <button type="submit" >Z</button>
                                  </div>
                                  </form>
                            </th>
                            <th>
                                  <form action="kategori" method="get">
                                  <input type="hidden" name="A" type="text" value="kd_kategori">
                                  <div class="btn-group pull-right">
                                  <div>NAMA</div>
                                  <div class="pull-right text-white">12345678912</div>
                                  <button type="submit">A</button>
                                  </form>
                                  <form action="kategori" method="get">
                                  <input type="hidden" name="B" type="text" value="kd_kategori">
                                  <button type="submit" >Z</button>
                                  </div>
                                  </form>
                                  </th>
                                  <th>
                                  Action
                                  </th>
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
