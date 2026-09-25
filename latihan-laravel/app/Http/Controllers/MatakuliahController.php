<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MahasiswaWebController;

class MatakuliahController extends Controller
{
    private array $daftarMatakuliah = [
        ['kode' => 'TK101', 'nama' => 'Pemrograman Web II', 'sks' => 3],
        ['kode' => 'TK102', 'nama' => 'Sistem Operasi', 'sks' => 3],
        ['kode' => 'TK103', 'nama' => 'Jaringan Komputer', 'sks' => 4],
        ['kode' => 'TK104', 'nama' => 'Etika Profesi', 'sks' => 2],
        ['kode' => 'TK105', 'nama' => 'Matematika Diskrit', 'sks' => 2],
    ];

    public function index(Request $request)
    {
        $q = $request->query('q', '');
        
        $matakuliah = $this->daftarMatakuliah;

        // Fitur Pencarian Sederhana
        if (!empty($q)) {
            $matakuliah = array_filter($matakuliah, function ($item) use ($q) {
                return stripos($item['nama'], $q) !== false || stripos($item['kode'], $q) !== false;
            });
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $matakuliah,
            'q' => $q
        ]);
    }

    public function show(string $kode)
    {
        $detail = null;
        foreach ($this->daftarMatakuliah as $item) {
            if (strtoupper($item['kode']) === strtoupper($kode)) {
                $detail = $item;
                break;
            }
        }

        if (!$detail) {
            abort(404, 'Matakuliah tidak ditemukan');
        }

        return view('matakuliah.show', ['matakuliah' => $detail]);
    }
}