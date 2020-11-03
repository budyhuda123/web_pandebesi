<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
  public function index()
  {
      $beritas = Berita::latest()->paginate(10);
      return view('berita.index', compact('beritas'));
  }
}
