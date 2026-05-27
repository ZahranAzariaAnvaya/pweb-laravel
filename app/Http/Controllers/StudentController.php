<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['major', 'subjects'])->get();
        return view('students.index', compact('students'));
        //echo json_encode($students);
    }

    public function show($id)
    {
        $student = Student::with(['major', 'subjects'])->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function create()
    {
        $majors   = Major::all();
        $subjects = Subject::all();
        return view('students.create', compact('majors', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'        => 'required|unique:students',
            'name'       => 'required',
            'address'    => 'required',
            'major_id'   => 'required|exists:majors,id',
            'subjects'   => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student = Student::create($request->only(['nim', 'name', 'address', 'major_id']));
        $student->subjects()->attach($request->subjects);

        return redirect()->route('students.index')->with('success', 'Student berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $student  = Student::with('subjects')->findOrFail($id);
        $majors   = Major::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'majors', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'nim'        => 'required|unique:students,nim,' . $student->id,
            'name'       => 'required',
            'address'    => 'required',
            'major_id'   => 'required|exists:majors,id',
            'subjects'   => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student->update($request->only(['nim', 'name', 'address', 'major_id']));
        $student->subjects()->sync($request->subjects);

        return redirect()->route('students.index')->with('success', 'Student berhasil diupdate!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->subjects()->detach();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student berhasil dihapus!');
    }

    // ── Jadwal ──
    public function jadwal()
    {
        $subjects = Subject::with('jadwal')->get();
        return view('students.jadwal', compact('subjects'));
    }

    // ── Latihan: Query dengan Relationship ──
    public function latihan()
    {
        // Query 1: Semua mahasiswa beserta jurusan dan mata kuliah
        $students = Student::with(['major', 'subjects'])->get();

        // Query 2: Semua jurusan diurutkan dari mahasiswa terbanyak
        $majorTerbanyak = Major::withCount('students')
            ->having('students_count', '>', 0)
            ->orderBy('students_count', 'desc')
            ->get();

        // Query 3: Mata kuliah mahasiswa tertentu berdasarkan input id
        $id = request('id');
        $studentTertentu = $id
            ? Student::with('subjects')->find($id)
            : Student::with('subjects')->first();
        $matkul = $studentTertentu ? $studentTertentu->subjects : collect();

        // Query 4: Total SKS (pakai $students yang sudah ada)

        return view('students.latihan', compact(
            'students',
            'majorTerbanyak',
            'matkul',
            'studentTertentu'
        ));
    }
}
