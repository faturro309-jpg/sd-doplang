<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Fasilitas;
use App\Models\Guru;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        $gurus = Guru::all();
        $beritas = Berita::where('status', 'Published')->latest()->take(3)->get();
        $ekstrakurikuler = \App\Models\Ekstrakurikuler::all();
        
        return view('home', compact('fasilitas', 'gurus', 'beritas', 'ekstrakurikuler'));
    }

    public function alur()
    {
        return view('alur');
    }

    public function beritaIndex()
    {
        $beritas = Berita::where('status', 'Published')->latest()->paginate(9);
        return view('berita.index', compact('beritas'));
    }

    public function beritaShow($slug)
    {
        $berita = Berita::where('slug', $slug)->where('status', 'Published')->firstOrFail();
        $recentBeritas = Berita::where('status', 'Published')
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(3)
            ->get();
            
        return view('berita.show', compact('berita', 'recentBeritas'));
    }

    public function visiMisi()
    {
        return view('visi-misi');
    }

    public function sejarah()
    {
        return view('sejarah');
    }

    public function galeriFoto()
    {
        $galeri = \App\Models\Galeri::where('kategori', 'Foto')->latest()->paginate(12);
        return view('galeri.foto', compact('galeri'));
    }

    public function galeriVideo()
    {
        $galeri = \App\Models\Galeri::where('kategori', 'Video')->latest()->paginate(12);
        return view('galeri.video', compact('galeri'));
    }

    public function direktoriGuru()
    {
        $gurus = \App\Models\Guru::all();
        return view('direktori.guru', compact('gurus'));
    }
}
