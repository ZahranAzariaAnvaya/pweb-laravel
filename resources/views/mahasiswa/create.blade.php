@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<h2>Tambah Mahasiswa</h2>

<form action="/mahasiswa" method="POST">
    @csrf
    <table cellpadding="6">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" required></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="nim" required></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td><input type="text" name="jurusan" required></td>
        </tr>
        <tr>
            <td>Angkatan</td>
            <td><input type="text" name="angkatan" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">Simpan</button>
                <a href="/mahasiswa">Batal</a>
            </td>
        </tr>
    </table>
</form>
@endsection