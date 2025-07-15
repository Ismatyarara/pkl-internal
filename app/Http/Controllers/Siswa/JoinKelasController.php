<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PermintaanJoin;
use Illuminate\Http\Request;
// atau model pivot kelas_siswa

class JoinKelasController extends Controller
{
    public function form()
    {
        return view('kelas.join'); // tampilkan form input kode kelas
    }

    public function submit(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required',
        ]);

        $kelas = Kelas::where('kode_kelas', $request->kode_kelas)->first();

        if (! $kelas) {
            return back()->withErrors(['kode_kelas' => 'Kode kelas tidak ditemukan']);
        }

        // Simpan permintaan join
        PermintaanJoin::create([
            'kelas_id' => $kelas->id,
            'siswa_id' => auth()->id(), // atau siswa_id manual jika belum login
            'status'   => 'pending',
        ]);

        return redirect()->route('kelas.formJoin')->with('success', 'Permintaan join telah dikirim.');
    }
}
