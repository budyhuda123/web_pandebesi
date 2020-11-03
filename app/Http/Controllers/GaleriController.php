<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{

 public function index()
 {
    $galeris = Galeri::latest()->paginate(10);
    return view('galeri.index', compact('galeris'));
 }
 public function create()
 {
     return view('galeri.create');
 }


 /**
 * store
 *
 * @param  mixed $request
 * @return void
 */
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
