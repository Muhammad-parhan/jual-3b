<?php

namespace App\Http\Controllers;

use App\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kategori;

class produkctrl extends Controller
{
    public function awal (Request $request){


        if($request->has('A'))
        {
        $produk = produk::with('kategori')->orderBy($request->A,'asc')->paginate(4);
        return view("produk.index",["produk" => $produk]);
        }else if($request->has('B'))
        {
            $produk = produk::with('kategori')->orderBy($request->B,'desc')->paginate(4);
            return view("produk.index",["produk" => $produk]);

        }else if ($request->has('find')){
            $produk = produk::with('kategori')->where("nama","like","%".$request->find."%")->paginate(4);
            return view("produk.index",["produk" => $produk]);

        }else{
            $produk = produk::with('kategori')->paginate(4);
            return view("produk.index",["produk" => $produk]);
        }
    }

    public function add(){



    $produk = DB::table("produks")->get();
    $kategori = DB::table("kategoris")->get();
    return view("produk.add", compact('kategori', 'produk'));


    }

    public function addProcess(Request $request){

        $validatedData = $request->validate([
            'kd_brg' => 'required|min:2',
            'nama' => 'required|min:2',
            'harga' => 'required',
            'stok' => 'required',
            'kd_kategori' => 'required',
        ],['kd_kategori.required'=> 'kode kategori harus di isi']);

        DB::table('produks')->insert(
            [
                'kd_brg' => $request->kd_brg,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kd_kategori' => $request->kd_kategori,


            ]
        );
        return redirect('produk')->with('status', 'Produk berhasil di tambahkan!');
        //return $request;
    }

    public function edit($id){

        $kategori = DB::table('kategoris')->get();
        $produk = DB::table('produks')->where('id', $id)->first();
        return view("produk.edit", compact('kategori', 'produk'));


    }

    public function editProcess($id,Request $request){

        $validatedData = $request->validate([
            'kd_brg' => 'required|min:2',
            'nama' => 'required|min:2',
            'harga' => 'required',
            'stok' => 'required',
            'kd_kategori' => 'required',
        ],['kd_kategori.required'=> 'kode kategori harus di isi']);

        DB::table('produks')->where("id",$id)->Update(
            [
                'kd_brg' => $request->kd_brg,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kd_kategori' => $request->kd_kategori,
            ]
        );
        return redirect('produk')->with('status', 'Produk berhasil di edit!');
        //return $request;

    }

    public function delete($id){

        $produk = DB::table('produks')->where('id', $id)->delete();
        return redirect('produk')->with('status', 'Produk berhasil di hapus!');

    }
}
