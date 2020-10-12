<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class kategorictrl extends Controller
{
    public function awal (Request $request){

    if($request->has('A'))
    {


    $kategori = DB::table("kategoris")->orderBy($request->A,'asc')->paginate(1);

    return view("kategori.awal",["kategori" => $kategori]);
    }else if($request->has('B'))
    {
        $kategori = DB::table("kategoris")->orderBy($request->B,'desc')->paginate(1);
        return view("kategori.awal",["kategori" => $kategori]);

    }else if ($request->has('find')){
        $kategori = DB::table("kategoris")->where("nama_kategori","like","%".$request->find."%")->paginate(1);
        return view("kategori.awal",["kategori" => $kategori]);

    }else{
        $kategori = DB::table("kategoris")->paginate(1);
        return view("kategori.awal",["kategori" => $kategori]);

    }




    }

    public function add(){



        $kategori = DB::table("kategoris")->get();
    return view("kategori.add",["kategori" => $kategori]);


    }

    public function addProcess(Request $request){

        $validatedData = $request->validate([
            'kd_kategori' => 'required|min:2',
            'nama_kategori' => 'required',
        ],['kd_kategori.required'=> 'kode kategori harus di isi']);

        DB::table('kategoris')->insert(
            [
                'kd_kategori' => $request->kd_kategori
                ,'nama_kategori' => $request->nama_kategori


            ]
        );
        return redirect('kategori')->with('status', 'kategori berhasil di tambahkan!');
        //return $request;


    }

    public function edit($id){

        $kategori = DB::table('kategoris')->where('id', $id)->first();
        return view("kategori.edit",["kategori" => $kategori]);


    }

    public function editProcess($id,Request $request){

        $validatedData = $request->validate([
            'kd_kategori' => 'required|min:2',
            'nama_kategori' => 'required',
        ],['kd_kategori.required'=> 'kode kategori harus di isi']);

        DB::table('kategoris')->where("id",$id)->Update(
            [
                'kd_kategori' => $request->kd_kategori
                ,'nama_kategori' => $request->nama_kategori


            ]
        );
        return redirect('kategori')->with('status', 'kategori berhasil di edit!');
        //return $request;

    }

    public function delete($id){

        $produk = DB::table('kategoris')->where('id', $id)->delete();
        return redirect('kategori')->with('status', 'kategori berhasil di hapus!');

    }



}
