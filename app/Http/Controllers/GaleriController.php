<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{

 public function index()
 {
    // memanggil data dari tabel galeris
    $galeris = Galeri::latest()->paginate(10);
    // mengirim data galeris ke index
    return view('galeri.index', compact('galeris'));
 }

 // method untuk menampilkan view form tambah galeris
 public function create()
 {
     // memanggil view tambah
     return view('galeri.create');
 }

// method untuk insert data ke table galeris
 public function store(Request $request)
 {
     $this->validate($request, [
         'foto'     => 'required|image|mimes:png,jpg,jpeg',
         'judul'       => 'required',
     ]);

     //upload image
     $foto = $request->file('foto');
     $foto ->storeAs('public/galeris', $foto->hashName());

     $galeri = galeri::create([
         'foto'    => $foto->hashName(),
         'judul'   => $request->judul
     ]);

     if($galeri){
         //redirect dengan pesan sukses
         return redirect()->route('galeri.index')->with(['success' => 'Data Berhasil Disimpan!']);
     }else{
         //redirect dengan pesan error
         return redirect()->route('galeri.index')->with(['error' => 'Data Gagal Disimpan!']);
     }
 }
}
