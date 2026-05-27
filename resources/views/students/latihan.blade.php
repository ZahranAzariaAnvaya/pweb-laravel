@extends('layouts.student')

@section('content')
<div class="container mt-4">

    {{-- Query 1 --}}
    <h4 class="mb-3">1. Semua Mahasiswa beserta Jurusan dan Mata Kuliah</h4>
    <table class="table table-bordered table-striped mb-5">
        <thead class="table-dark">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Mata Kuliah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->major->name }}</td>
                <td>
                    @foreach ($student->subjects as $subject)
                    <span class="badge bg-secondary me-1">{{ $subject->name }}</span>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Query 2 --}}
    <h4 class="mb-3">2. Jurusan dengan Mahasiswa Terbanyak</h4>
    <table class="table table-bordered mb-5">
        <thead class="table-dark">
            <tr>
                <th>Jurusan</th>
                <th>Jumlah Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($majorTerbanyak as $major)
            <tr>
                <td>{{ $major->name }}</td>
                <td>{{ $major->students_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Query 3 --}}
    <h4 class="mb-3">3. Mata Kuliah Mahasiswa Tertentu</h4>
    <form method="GET" action="/latihan" class="mb-3">
        <div class="input-group" style="max-width: 350px;">
            <input type="number" name="id" class="form-control"
                placeholder="Masukkan ID mahasiswa"
                value="{{ request('id') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    @if($studentTertentu)
    <p>Menampilkan mata kuliah milik: <strong>{{ $studentTertentu->name }}</strong></p>
    @else
    <div class="alert alert-warning">Mahasiswa dengan ID tersebut tidak ditemukan.</div>
    @endif

    <table class="table table-bordered mb-5">
        <thead class="table-dark">
            <tr>
                <th>Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($matkul as $mk)
            <tr>
                <td>{{ $mk->name }}</td>
                <td>{{ $mk->sks }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Query 4 --}}
    <h4 class="mb-3">4. Total SKS Setiap Mahasiswa</h4>
    <table class="table table-bordered mb-5">
        <thead class="table-dark">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Total SKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->subjects->sum('sks') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection