<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi_akademik = Prestasi::where('kategori', 'Akademik')->get();
        $prestasi_nonakademik = Prestasi::where('kategori', 'Non-Akademik')->get();
        return view('prestasi.index', compact('prestasi_akademik', 'prestasi_nonakademik'));
    }
}
