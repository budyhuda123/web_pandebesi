<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KomentarController extends Controller
{
  public function index()
  {
      // memanggil data dari tabel komentars
      $komentars = Komentar::latest()->paginate(10);
      // mengirim data komentars ke index
      return view('komentar.index', compact('komentars'));
  }
}
