<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
  /**
   * index
   *
   * @return void
   */
 public function index()
 {
    $galeris = Galeri::latest()->paginate(10);
    return view('galeri.index', compact('galeris'));
 }
}
