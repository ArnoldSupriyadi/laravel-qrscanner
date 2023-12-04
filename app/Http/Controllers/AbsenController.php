<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absens = Absen::all();

        return view ('dashboard', compact('absens'));
    }

    public function store(Request $request)
    {
        //cek data
        $cek = Absen::where([
            'id_siswa' => '100359',
            'lokasi' => $request->lokasi,
            'tanggal' => date('Y-m-d')
        ])->first();

        if($cek) {
            return redirect('/')->with('gagal', 'Anda sudah absen');
        }
    
        Absen::create([
            'id_siswa' => '100359',
            'lokasi' => $request->lokasi,
            'tanggal' => date('Y-m-d')
        ]);
    
        return redirect('/')->with('success', 'Silahkan Masuk');
    }

    public function checkin()
    {
        return view('welcome');
    }

    
}
