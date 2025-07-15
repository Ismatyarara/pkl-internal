<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaKelasController extends Controller
{
    public function showFormJoin()
    {
        return view('join'); // halaman input kode join
    }

    public function prosesJoin(Request $request)
    {
        $request->validate(['kode_kelas' => 'required']);

        $kelas = Kelas::where('kode_kelas', $request->kode_kelas)->first();

        if (! $kelas) {
            return back()->with('error', 'Kode kelas tidak ditemukan.');
        }

        $siswa = Auth::user();

        if ($siswa->kelas()->where('kelas_id', $kelas->id)->exists()) {
            return back()->with('error', 'Kamu sudah tergabung di kelas ini.');
        }

        $siswa->kelas()->attach($kelas->id);

        return redirect()->route('siswa.index')->with('success', 'Berhasil join kelas!');
    }

    public function index()
    {
        $kelasSaya = Auth::user()->kelas()->withPivot('created_at')->get();
        return view('index', compact('kelasSaya'));
    }

    public function show($id)
    {
        $kelas = Auth::user()->kelas()->where('kelas.id', $id)->firstOrFail();
        $tugas = $kelas->tugas; // relasi tugas dari model Kelas

        return view('siswa.kelas_detail', compact('kelas', 'tugas'));
    }

}
