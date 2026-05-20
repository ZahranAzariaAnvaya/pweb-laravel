@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<h2>Edit Mahasiswa</h2>

<form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
    @csrf
    @method('PUT')
    <table cellpadding="6">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="{{ $mahasiswa->nama }}" required></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="nim" value="{{ $mahasiswa->nim }}" required></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td><input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}" required></td>
        </tr>
        <tr>
            <td>Angkatan</td>
            <td><input type="text" name="angkatan" value="{{ $mahasiswa->angkatan }}" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">Update</button>
                <a href="/mahasiswa">Batal</a>
            </td>
        </tr>
    </table>
</form>
@endsection