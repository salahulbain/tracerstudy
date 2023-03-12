<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataMahasiswa;
use App\Models\Kuisioner;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class LaporanController extends Controller
{
    public function index()
    {
        $user   = DataMahasiswa::findOrFail(Auth::user()->user_id);
        $finish = Kuisioner::where('nimhsmsmh', $user->npm)->count();
        if ($finish < 1)
            return redirect()->route('kuisioner.index')->with('errors', 'Anda belum isi survey, silahkan isikan survey terlebih dahulu');
        else
            return view('pages.laporan.index');
    }

    public function generateLaporan(Request $request)
    {
        $user   = DataMahasiswa::findOrFail(Auth::user()->user_id);
        $tracer = Kuisioner::select('created_at')->where('nimhsmsmh', $user->npm)->first();

        $data = [
            'title' => 'Bukti Isi Survey Tracer Study ' . $user->npm,
            'user'  => $user,
            'tracer' => $tracer,
        ];

        $pdf = Pdf::loadView('pages.laporan.mahasiswa', $data)->setOption(['defaultFont' => 'cambria']);

        return $pdf->stream('Bukti isi Survey ' . $user->npm . '.pdf');
    }
}
