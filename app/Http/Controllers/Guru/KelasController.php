<?php
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('guru', 'tugas')->where('guru_id', Auth::id())->get();
        return view('guru.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('guru.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas'     => 'required',
            'mata_pelajaran' => 'required',
        ]);

        $kode_kelas = strtoupper(Str::random(6)); // Contoh: 'XZP8LQ'

        Kelas::create([
            'nama_kelas'     => $request->nama_kelas,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kode_kelas'     => $kode_kelas,
            'guru_id'        => Auth::id(),
        ]);

        return redirect()->route('guru.kelas.index')
            ->with('success', 'Kelas berhasil dibuat.')
            ->with('kode_kelas', $kode_kelas);
    }
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id); //objek

        // Cek hak akses guru
        if ($kelas->guru_id !== Auth::id()) {
            abort(403, 'Anda tidak diizinkan mengedit kelas ini.');
        }

        return view('guru.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        // Cek hak akses guru
        if ($kelas->guru_id !== Auth::id()) {
            abort(403, 'Anda tidak diizinkan mengubah kelas ini.');
        }

        $request->validate(['nama_kelas' => 'required', 'mata_pelajaran' => 'required']);

        $kelas->update([
            'nama_kelas'     => $request->nama_kelas,
            'mata_pelajaran' => $request->mata_pelajaran,
        ]);

        return redirect()->route('guru.kelas.index')->with('success', 'Kelas berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);

        // (Opsional) Cek apakah yang menghapus adalah pembuat kelas
        if ($kelas->guru_id !== Auth::id()) {
            abort(403, 'Anda tidak diizinkan menghapus kelas ini.');
        }

        $kelas->delete();

        return redirect()->route('guru.kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }

    public function lihatPermintaan()
    {
        $kelasSaya = Kelas::where('guru_id', Auth::id())
            ->with('permintaanJoin.siswa')
            ->get();

        return view('guru.permintaan_join', compact('kelasSaya'));
    }

}
