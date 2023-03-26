<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $total_mhs              = DB::table('data_mahasiswas')->where('deleted_at', null)->count();
        $total_isi_survey       = DB::table('kuisioners')->where('deleted_at', null)->count();
        $recent_submit          = DB::table('kuisioners')->whereNull('deleted_at')->orderByDesc('created_at')->take(6)->get();
        $total_prodi            = DB::table('data_mahasiswas')->select('kode_prodi')->groupBy('kode_prodi')->get();
        $total_belum_isi_survey = $total_mhs - $total_isi_survey;
        $total_prodi            = count($total_prodi);

        $pai  = DB::table('data_mahasiswas')->where('kode_prodi', 86208)->count();
        $pba  = DB::table('data_mahasiswas')->where('kode_prodi', 88204)->count();
        $mpi  = DB::table('data_mahasiswas')->where('kode_prodi', 86231)->count();
        $sas  = DB::table('data_mahasiswas')->where('kode_prodi', 74230)->count();
        $ekos = DB::table('data_mahasiswas')->where('kode_prodi', 60202)->count();
        $kpi  = DB::table('data_mahasiswas')->where('kode_prodi', 70233)->count();
        $pmi  = DB::table('data_mahasiswas')->where('kode_prodi', 70231)->count();

        // hitung status mhs
        $kerja_full        = Kuisioner::where('f8', 1)->count();
        $belum_kerja       = Kuisioner::where('f8', 2)->count();
        $wiraswasta        = Kuisioner::where('f8', 3)->count();
        $lanjut_pendidikan = Kuisioner::where('f8', 4)->count();
        $tidak_kerja       = Kuisioner::where('f8', 5)->count();

        return view('pages.admin.dashboard', compact([
            'total_prodi', 'total_belum_isi_survey', 'total_isi_survey', 'total_mhs', 'pai', 'pba', 'mpi', 'sas', 'ekos', 'kpi', 'pmi', 'recent_submit',
            'kerja_full', 'belum_kerja', 'wiraswasta', 'lanjut_pendidikan', 'tidak_kerja',
        ]));
    }
}
