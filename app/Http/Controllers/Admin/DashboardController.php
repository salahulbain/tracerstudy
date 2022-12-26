<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        $pai  = DB::table('data_mahasiswas')->where('kode_prodi', 13201)->count();
        $pba  = DB::table('data_mahasiswas')->where('kode_prodi', 26201)->count();
        $mpi  = DB::table('data_mahasiswas')->where('kode_prodi', 41211)->count();
        $sas  = DB::table('data_mahasiswas')->where('kode_prodi', 56202)->count();
        $ekos = DB::table('data_mahasiswas')->where('kode_prodi', 61201)->count();
        $kpi  = DB::table('data_mahasiswas')->where('kode_prodi', 60404)->count();
        $pmi  = DB::table('data_mahasiswas')->where('kode_prodi', 84203)->count();


        return view('pages.admin.dashboard', compact(['total_prodi', 'total_belum_isi_survey', 'total_isi_survey', 'total_mhs', 'pai', 'pba', 'mpi', 'sas', 'ekos', 'kpi', 'pmi', 'recent_submit']));
    }
}
