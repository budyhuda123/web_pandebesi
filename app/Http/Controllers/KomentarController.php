<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KomentarController extends Controller
{
  public function index()
  {
      $komentars = Komentar::latest()->paginate(10);
      return view('komentar.index', compact('komentars'));
  }
}
