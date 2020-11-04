<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
  public function index()
  {
      // memanggil data dari tabel beritas
      $beritas = Berita::latest()->paginate(10);
      // mengirim data beritas ke index
      return view('berita.index', compact('beritas'));
  }
}
