<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
  /**
   * index
   *
   * @return void
   */
  public function index()
  {
      $produks = Produk::latest()->paginate(10);
      return view('produk.index', compact('produks'));
  }

  /**
  * create
  *
  * @return void
  */
  public function create()
  {
      return view('produk.create');
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
          'gambar_pdk'     => 'required|image|mimes:png,jpg,jpeg',
          'nama_pdk'       => 'required',
          'type_pdk'       => 'required',
          'deskripsi_pdk'  => 'required',
          'harga_pdk'      => 'required',
          'jumlah_pdk'     => 'required'
      ]);

      //upload image
      $gambar_pdk = $request->file('gambar_pdk');
      $gambar_pdk->storeAs('public/produks', $gambar_pdk->hashName());

      $produk = Produk::create([
          'gambar_pdk'    => $gambar_pdk->hashName(),
          'nama_pdk'      => $request->nama_pdk,
          'type_pdk'      => $request->type_pdk,
          'deskripsi_pdk' => $request->deskripsi_pdk,
          'harga_pdk'     => $request->harga_pdk,
          'jumlah_pdk'    => $request->jumlah_pdk
      ]);

      if($produk){
          //redirect dengan pesan sukses
          return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
      }else{
          //redirect dengan pesan error
          return redirect()->route('produk.index')->with(['error' => 'Data Gagal Disimpan!']);
      }
  }

  /**
  * edit
  *
  * @param  mixed $produk
  * @return void
  */
  public function edit(Produk $produk)
  {
      return view('produk.edit', compact('produk'));
  }


  /**
  * update
  *
  * @param  mixed $request
  * @param  mixed $produk
  * @return void
  */
  public function update(Request $request, Produk $produk)
  {
      $this->validate($request, [
        'nama_pdk'       => 'required',
        'type_pdk'       => 'required',
        'deskripsi_pdk'  => 'required',
        'harga_pdk'      => 'required',
        'jumlah_pdk'     => 'required'
      ]);

      //get data Produk by ID
      $produk = Produk::findOrFail($produk->id);

      if($request->file('gambar_pdk') == "") {

          $produk->update([
            'nama_pdk'      => $request->nama_pdk,
            'type_pdk'      => $request->type_pdk,
            'deskripsi_pdk' => $request->deskripsi_pdk,
            'harga_pdk'     => $request->harga_pdk,
            'jumlah_pdk'    => $request->jumlah_pdk
          ]);

      } else {

          //hapus old image
          Storage::disk('local')->delete('public/produks/'.$produk->gambar_pdk);

          //upload new image
          $gambar_pdk = $request->file('gambar_pdk');
          $gambar_pdk->storeAs('public/produks', $gambar_pdk->hashName());

          $produk->update([
            'gambar_pdk'    => $gambar_pdk->hashName(),
            'nama_pdk'      => $request->nama_pdk,
            'type_pdk'      => $request->type_pdk,
            'deskripsi_pdk' => $request->deskripsi_pdk,
            'harga_pdk'     => $request->harga_pdk,
            'jumlah_pdk'    => $request->jumlah_pdk
          ]);

      }

      if($produk){
          //redirect dengan pesan sukses
          return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diupdate!']);
      }else{
          //redirect dengan pesan error
          return redirect()->route('produk.index')->with(['error' => 'Data Gagal Diupdate!']);
      }
  }

  /**
  * destroy
  *
  * @param  mixed $id
  * @return void
  */
  public function destroy($id)
  {
    $produk = Produk::findOrFail($id);
    Storage::disk('local')->delete('public/produks/'.$produk->gambar_pdk);
    $produk->delete();

    if($produk){
       //redirect dengan pesan sukses
       return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('produk.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
  }
}
