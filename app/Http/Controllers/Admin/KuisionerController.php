<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KuisionerExport;
use App\Http\Controllers\Controller;
use App\Models\DataMahasiswa;
use App\Models\Kuisioner;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class KuisionerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['show', 'create', 'edit', 'destroy', 'delete', 'export']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role == "ADMIN") {
            if ($request->ajax()) {
                // note: add select('tabel.*') untuk menghindari abigu id saat ada relasi di eager yajra datatable
                $data = Kuisioner::query();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($row) {
                        $btn = '<a href="#" class="m-1 badge text-bg-success text-sm">Finish</a>';
                        $btn .= '<a href="#kuisionerModal" class="badge text-bg-danger text-sm" title="Hapus" data-bs-toggle="modal" data-bs-target="#kuisionerModal" data-remote="' . route('kuisioner.delete', $row->id) . '" data-title="Yakin ingin menghapus ?">Hapus</a>';
                        return $btn;
                    })
                    ->rawColumns(['status'])
                    ->make(true);
            }
            return view('pages.admin.kuisioner.index-admin');
        }
        if (Auth::user()->role == "USER") {
            $mahasiswa = DataMahasiswa::findOrFail(Auth::user()->user_id);
            $wilayah   = DB::table('provinsis')->select('kode', 'nama')->get();

            return view('pages.admin.kuisioner.index', compact(['mahasiswa', 'wilayah']));
        }
    }

    public function getkabkota(Request $request)
    {
        $kode    = explode('|', $request->id);
        $kabkota = DB::table('kota_kabupatens')->where('kode_prov', $kode[1])->get();

        foreach ($kabkota as $kab) {
            echo '<option value="' . $kab->nama . '|' . $kab->kode . '">' . $kab->nama . '</option>';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //user mahasiswa
        if (Auth::user()->role == "USER") {
            $request->validate([
                'npwp'        => 'nullable|numeric',
                'f8'          => 'required',
                'f504'        => 'required',
                'f502'        => 'required_if:f504,1',
                'f505'        => 'required_if:f8,1,3',
                'f5a1'        => 'required_if:f8,1,3',
                'f5a2'        => 'required_if:f8,1,3',
                'f1101'       => 'required_if:f8,1,3',
                'f1102'       => 'required_if:f1101,5',
                'f5b'         => 'required_if:f8,1,3',
                'f5c'         => 'required_if:f8,3',
                'f5d'         => 'required_if:f8,1,3',
                'f18a'        => 'required_if:f8,4',
                'f18b'        => 'required_if:f8,4',
                'f18c'        => 'required_if:f8,4',
                'f18d'        => 'required_if:f8,4',
                'f1201'       => 'required',
                'f1202'       => 'required_if:f1201,7',
                'f14'         => 'required',
                'f15'         => 'required',
                'f1761'       => 'required',
                'f1762'       => 'required',
                'f1763'       => 'required',
                'f1764'       => 'required',
                'f1765'       => 'required',
                'f1766'       => 'required',
                'f1767'       => 'required',
                'f1768'       => 'required',
                'f1769'       => 'required',
                'f1770'       => 'required',
                'f1771'       => 'required',
                'f1772'       => 'required',
                'f1773'       => 'required',
                'f1774'       => 'required',
                'f21'         => 'required',
                'f22'         => 'required',
                'f23'         => 'required',
                'f24'         => 'required',
                'f25'         => 'required',
                'f26'         => 'required',
                'f27'         => 'required',
                'f301'        => 'required',
                'f302'        => 'required_if:f301,1',
                'f303'        => 'required_if:f301,2',
                'f416'        => 'required_if:f415,1',
                'f6'          => 'required',
                'f7'          => 'required',
                'f1001'       => 'required',
                'f1002'       => 'required_if:f1001,5',
                'f1614'       => 'required_if:f1613,1',
            ], [
                'required'    => 'kuisioner :attribute wajib diisi',
                'required_if' => 'kuisioner :attribute wajib di isi apabila :other di jawab :value',
                'numeric'     => ':attribute wajib berupa angka',
                'email'       => ':attribute wajib berupa email',
                'digits'      => ':attribute wajib berjumlah :value',
            ]);

            $provinsi = explode('|', $request->f5a1);
            $kabkota  = explode('|', $request->f5a2);
            $prov     = $provinsi[1];
            $kot      = $kabkota[1];

            Kuisioner::create([
                'kdptimsmh'   => $request->kdptimsmh,
                'kdpstmsmh'   => $request->kdpstmsmh,
                'nimhsmsmh'   => $request->nimhsmsmh,
                'nmmhsmsmh'   => $request->nmmhsmsmh,
                'telpomsmh'   => $request->telpomsmh,
                'emailmsmh'   => $request->emailmsmh,
                'tahun_lulus' => $request->tahun_lulus,
                'nik'         => $request->nik,
                'npwp'        => $request->npwp,
                'f8'          => $request->f8,
                'f504'        => $request->f504,
                'f502'        => $request->f502,
                'f505'        => $request->f505,
                'f506'        => $request->f506,
                'f5a1'        => $prov,
                'f5a2'        => $kot,
                'f1101'       => $request->f1101,
                'f1102'       => $request->f1102,
                'f5b'         => $request->f5b,
                'f5c'         => $request->f5c,
                'f5d'         => $request->f5d,
                'f18a'        => $request->f18a,
                'f18b'        => $request->f18b,
                'f18c'        => $request->f18c,
                'f18d'        => $request->f18d,
                'f1201'       => $request->f1201,
                'f1202'       => $request->f1202,
                'f14'         => $request->f14,
                'f15'         => $request->f15,
                'f1761'       => $request->f1761,
                'f1762'       => $request->f1762,
                'f1763'       => $request->f1763,
                'f1764'       => $request->f1764,
                'f1765'       => $request->f1765,
                'f1766'       => $request->f1766,
                'f1767'       => $request->f1767,
                'f1768'       => $request->f1768,
                'f1769'       => $request->f1769,
                'f1770'       => $request->f1770,
                'f1771'       => $request->f1771,
                'f1772'       => $request->f1772,
                'f1773'       => $request->f1773,
                'f1774'       => $request->f1774,
                'f21'         => $request->f21,
                'f22'         => $request->f22,
                'f23'         => $request->f23,
                'f24'         => $request->f24,
                'f25'         => $request->f25,
                'f26'         => $request->f26,
                'f27'         => $request->f27,
                'f301'        => $request->f301,
                'f302'        => $request->f302,
                'f303'        => $request->f303,
                'f401'        => $request->f401,
                'f402'        => $request->f402,
                'f403'        => $request->f403,
                'f404'        => $request->f404,
                'f405'        => $request->f405,
                'f406'        => $request->f406,
                'f407'        => $request->f407,
                'f408'        => $request->f408,
                'f409'        => $request->f409,
                'f410'        => $request->f410,
                'f411'        => $request->f411,
                'f412'        => $request->f412,
                'f414'        => $request->f414,
                'f415'        => $request->f415,
                'f416'        => $request->f416,
                'f6'          => $request->f6,
                'f7'          => $request->f7,
                'f7a'         => $request->f7a,
                'f1001'       => $request->f1001,
                'f1002'       => $request->f1002,
                'f1601'       => $request->f1601,
                'f1602'       => $request->f1602,
                'f1603'       => $request->f1603,
                'f1604'       => $request->f1604,
                'f1605'       => $request->f1605,
                'f1606'       => $request->f1606,
                'f1607'       => $request->f1607,
                'f1608'       => $request->f1608,
                'f1609'       => $request->f1609,
                'f1610'       => $request->f1610,
                'f1611'       => $request->f1611,
                'f1612'       => $request->f1612,
                'f1613'       => $request->f1613,
                'f1614'       => $request->f1614,
            ]);

            return redirect()->route('kuisioner.index')->with('success', 'kuisioner berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function show(Kuisioner $kuisioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Kuisioner $kuisioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kuisioner $kuisioner)
    {
        //
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        $data = DB::table('kuisioners')->where('deleted_at', null)->count();
        if (!$data == null) {
            return Excel::download(new KuisionerExport, 'file_upload_kuisioner_tracer.xlsx');
        } else {
            return redirect()->route('kuisioner.index')->with('error', 'Data Responden Kosong');
        }
    }

    public function delete(Kuisioner $kuisioner, $id)
    {
        $item = Kuisioner::findOrFail($id);
        return view('pages.admin.kuisioner.delete', compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->delete();
        return redirect()->route('kuisioner.index')->with('success', 'Data responden berhasil dihapus');
    }
}
