<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function create()
    {
        return view('ppdb.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|unique:ppdbs,nisn|max:20',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'no_hp_ortu' => 'required|string|max:20',
            'alamat_lengkap' => 'required|string',
            'asal_sekolah' => 'nullable|string|max:255',
        ], [
            'nisn.unique' => 'NISN ini sudah terdaftar. Silakan hubungi panitia jika merasa ada kesalahan.',
            'required' => 'Kolom :attribute wajib diisi.'
        ]);

        $validated['status'] = 'pending';

        \App\Models\Ppdb::create($validated);

        return redirect()->route('ppdb.success')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function success()
    {
        return view('ppdb.success');
    }
}
