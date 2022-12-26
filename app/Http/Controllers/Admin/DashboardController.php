<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $pai  = DB::table('data_mahasiswas')->where('kode_prodi', 13201)->count();
        $pba  = DB::table('data_mahasiswas')->where('kode_prodi', 26201)->count();
        $mpi  = DB::table('data_mahasiswas')->where('kode_prodi', 41211)->count();
        $sas  = DB::table('data_mahasiswas')->where('kode_prodi', 56202)->count();
        $ekos = DB::table('data_mahasiswas')->where('kode_prodi', 61201)->count();
        $kpi  = DB::table('data_mahasiswas')->where('kode_prodi', 60404)->count();
        $pmi  = DB::table('data_mahasiswas')->where('kode_prodi', 84203)->count();

        $recent_submit = DB::table('kuisioners')->orderByDesc('created_at')->take(6)->get();

        return view('pages.admin.dashboard', compact(['pai', 'pba', 'mpi', 'sas', 'ekos', 'kpi', 'pmi', 'recent_submit']));
    }
}
