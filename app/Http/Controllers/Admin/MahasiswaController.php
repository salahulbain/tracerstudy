<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['show','create','edit','destroy','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // jika user admin ambil semua data mahasiswa load ke datatable
        if(Auth::user()->role == "ADMIN"){
            if ($request->ajax()) {
                // note: add select('tabel.*') untuk menghindari abigu id saat ada relasi di eager yajra datatable
                $data = DataMahasiswa::query();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . route('mahasiswa.edit', $row->id) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square p-1 text-warning"></i></a>';
                        $btn .= '<a href="#dataMahasiswaModal" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-toggle="modal" data-bs-target="#dataMahasiswaModal" data-remote="' . route('mahasiswa.show', $row->id) . '" data-title="Detail Data Mahasiswa"><i class="bi bi-eye p-1"></i></a>';
                        $btn .= '<a href="#dataMahasiswaModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" data-bs-toggle="modal" data-bs-target="#dataMahasiswaModal" data-remote="' . route('mahasiswa.destroy', $row->id) . '" data-title="Yakin ingin menghapus ?"><i class="bi bi-trash-fill p-1 text-danger"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('pages.admin.datamahasiswa.index');
        }
        // jika user Mahasiswa ambil satu data
        if(Auth::user()->role == "USER"){
            $item = DataMahasiswa::where('id',Auth::user()->user_id)->first();
            return view('pages.admin.datamahasiswa.index',compact('item'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.datamahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(DataMahasiswa $dataMahasiswa)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(DataMahasiswa $dataMahasiswa)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataMahasiswa $dataMahasiswa)
    {
        //jika user ADMIN
        if(Auth::user()->role == 'ADMIN'){
            // 
        }
        // jika user USER
        elseif(Auth::user()->role == 'USER'){
            $request->validate([
                'nama_mahasiswa' => 'required',
                'tempat_lahir'   => 'required',
                'tanggal_lahir'  => 'required',
                'nik'            => 'required|numeric|digits:16',
            ],[
                'required' => ':attribute tidak boleh kosong',
                'numeric'  => ':attribute wajib berupa angka',
                'digits'   => ':attribute wajib berjumlah 16 angka',
            ]);
            if($request->npwp){
                $request->validate([
                    'npwp' => 'numeric',
                ],[
                    'numeric'  => ':attribute wajib berupa angka',
                ]);
            }
            $dataMahasiswa = DataMahasiswa::findOrFail(Auth::user()->user_id);
            $datauser = User::where('user_id',Auth::user()->user_id)->first();
            $dataMahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
            $datauser->name = $request->nama_mahasiswa;
            $dataMahasiswa->tempat_lahir = $request->tempat_lahir;
            $dataMahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $dataMahasiswa->nik = $request->nik;
            $dataMahasiswa->no_hp = $request->no_hp;
            $dataMahasiswa->email = $request->email;
            $datauser->email = $request->email;
            $dataMahasiswa->alamat = $request->alamat;
            if($request->npwp){
                $dataMahasiswa->npwp = $request->npwp;
            }
            $dataMahasiswa->save();
            $datauser->save();

            return redirect()->route('mahasiswa.index')->with('success','Data berhasil disimpan');
        }else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataMahasiswa $dataMahasiswa)
    {
        // 
    }
}
