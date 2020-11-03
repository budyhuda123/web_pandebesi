<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
public function index()
 {
     $galeri = Galeri::latest()->paginate(10);
     return view('galeri.index', compact('galeri'));
 }
}
