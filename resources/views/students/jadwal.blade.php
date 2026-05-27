@extends('layouts.student')

@section('content')
<h2>Jadwal Mata Kuliah</h2>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Ruangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->sks }}</td>
                @if($subject->jadwal)
                <td>{{ $subject->jadwal->hari }}</td>
                <td>{{ $subject->jadwal->jam_mulai }}</td>
                <td>{{ $subject->jadwal->jam_selesai }}</td>
                <td>{{ $subject->jadwal->ruangan }}</td>
                @else
                <td colspan="4" class="text-muted">Belum ada jadwal</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection