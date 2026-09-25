# 📚 Modul 2 Praktikum Pemweb II - Fondasi Laravel 13

[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)

Repositori ini berisi penyelesaian **Modul 2: Fondasi Laravel 13 (Routing, Controller, dan Blade)** pada mata kuliah Praktikum Pemrograman Web II, Jurusan Informatika / Teknik Komputer, Universitas Jenderal Soedirman.

---

## 👨‍🎓 Identitas Praktikan

| Atribut | Detail |
| :--- | :--- |
| **Nama** | Muhammad Zaki Dzulfikar |
| **NIM** | H1D023065 |
| **Kelas** | A ke B |
| **Repository** | [BillyUdin/H1H024062-Nabil-Pemweb-2](https://github.com/BillyUdin/H1H024062-Nabil-Pemweb-2) |

---

## 📸 Tangkapan Layar Aplikasi (Screenshots)

### 1. Halaman Utama & Fitur Pencarian (Index)
![Daftar Matakuliah & Form Pencarian](resources/views/matakuliah/screenshot-index.png)

### 2. Halaman Detail Matakuliah (Show)
![Detail Matakuliah](resources/views/matakuliah/screenshot-show.png)

---

## 🛠️ Implementation & Source Code

### 1. Controller (`app/Http/Controllers/MatakuliahController.php`)
Mengelola data statis matakuliah, logika pencarian query string (`?q=`), serta penyajian detail matakuliah berdasarkan kode.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    // Data array berisi 5 matakuliah
    private array $daftarMatakuliah = [
        ['kode' => 'TK101', 'nama' => 'Pemrograman Web II', 'sks' => 3],
        ['kode' => 'TK102', 'nama' => 'Sistem Operasi', 'sks' => 3],
        ['kode' => 'TK103', 'nama' => 'Jaringan Komputer', 'sks' => 4],
        ['kode' => 'TK104', 'nama' => 'Etika Profesi', 'sks' => 2],
        ['kode' => 'TK105', 'nama' => 'Matematika Diskrit', 'sks' => 2],
    ];

    // Method index dengan fitur pencarian query string 'q'
    public function index(Request $request)
    {
        $q = $request->query('q', '');
        $matakuliah = $this->daftarMatakuliah;

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

    // Method show untuk menampilkan detail matakuliah berdasarkan kode
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
