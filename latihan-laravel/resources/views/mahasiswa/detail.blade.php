@extends('layouts.app')

@section('judul', 'Detail Mahasiswa')

@section('konten')
<h1 class="h3 mb-2">{{ $mahasiswa->nama }}</h1>
<p>
    NIM: {{ $mahasiswa->nim }} |
    Program Studi: {{ $mahasiswa->programStudi->nama }} |
    Angkatan: {{ $mahasiswa->angkatan }} |
    IPK: {{ $mahasiswa->ipk }}
</p>

<h2 class="h5 mt-4">Matakuliah yang Diambil</h2>
<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswa->matakuliah as $mk)
        <tr>
            <td>{{ $mk->kode }}</td>
            <td>{{ $mk->nama }}</td>
            <td>{{ $mk->sks }}</td>
            <td>{{ $mk->pivot->nilai ?? '-' }}</td>
        </tr>
        @empty
        <tr><td colspan="4">Belum ada matakuliah yang diambil.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection