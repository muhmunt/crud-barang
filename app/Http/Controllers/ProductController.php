<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(5);
        return view('product',compact('products'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'foto' => 'required'
        ]);

        
        $gambar = $request->file('foto');
        $namafile = Carbon::now()->timestamp. '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
        // dd($namafile);
        $gambar->move(public_path('upload/'),$namafile);
        
        // dd($gambar);

        Product::create([
            'nama' => $request->name,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'gambar' => $namafile
        ]);

        return redirect()->route('product')->with('success','Product Create Successfully');
    }

    public function delete($id){
        $getproduct = Product::where('id',$id)->first();
        $foto = $getproduct->gambar;
        unlink(public_path('\upload\\'.$foto));
        Product::where('id',$id)->delete();
        return back()->with('success','Product Delete Successfully');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();                
        return view('edit-product',compact('product'));
    }

    public function update($id,Request $request){        
        $fotoLama = $request->fotolama;
        $foto = $request->file('foto');
        if(empty($foto)){
            $foto = $fotoLama;
            $namabaru = $foto;
        }else{
            $foto = $request->file('foto');
            $namabaru = Carbon::now()->timestamp. '_' . uniqid() . '.' .$foto->getClientOriginalExtension();
            $foto->move(public_path('upload/'),$namabaru);
            unlink(public_path('\upload\\'.$fotoLama));
        }
        
        // dd($foto);
        
        Product::where('id',$id)->update([
            'nama' => $request->name,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'gambar' => $namabaru
        ]);

        return redirect()->route('product')->with('success','Product Update Successfully');
    }

}
