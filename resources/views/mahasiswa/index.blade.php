@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<h2>Data Mahasiswa</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<a href="/mahasiswa/create">+ Tambah Mahasiswa</a>

<table border="1" cellpadding="8" style="margin-top:10px; width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $index => $mahasiswa)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->jurusan }}</td>
            <td>{{ $mahasiswa->angkatan }}</td>
            <td>
                <a href="/mahasiswa/{{ $mahasiswa->id }}/edit">Edit</a>
                <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection