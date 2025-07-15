<?php
namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{

    public function show($id)
    {
        $tugas = \App\Models\Tugas::with('pengumpulan_tugas')->findOrFail($id);
        return view('siswa.tugas_detail', compact('tugas'));
    }

    public function kumpulkan(Request $request, $id)
    {
        // $request->validate([
        //     'file' => 'required|file|mimes:pdf,doc,docx,zip',
        //     'catatan' => 'nullable|string',
        // ]);

        $path = $request->file('file')->store('tugas_siswa', 'public');

        \App\Models\PengumpulanTugas::create([
            'tugas_id' => $id,
            'siswa_id' => Auth::id(),
            'file'     => $path,
            'catatan'  => $request->input('catatan'),
            'status'   => 'dikirim',
        ]);

        return back()->with('success', 'Tugas berhasil dikumpulkan.');

    }

}
