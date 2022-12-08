<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DataMahasiswaExport;
use App\Http\Controllers\Controller;
use App\Imports\DataMahasiswaImport;
use App\Models\DataMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Return_;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['show', 'create', 'edit', 'destroy', 'store', 'import', 'export']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // jika user admin ambil semua data mahasiswa load ke datatable
        if (Auth::user()->role == "ADMIN") {
            if ($request->ajax()) {
                // note: add select('tabel.*') untuk menghindari abigu id saat ada relasi di eager yajra datatable
                $data = DataMahasiswa::query();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . route('mahasiswa.edit', $row->id) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square p-1 text-warning"></i></a>';
                        $btn .= '<a href="#dataMahasiswaModal" title="Detail" data-bs-toggle="modal" data-bs-target="#dataMahasiswaModal" data-remote="' . route('mahasiswa.show', $row->id) . '" data-title="Detail Data Mahasiswa"><i class="bi bi-eye p-1"></i></a>';
                        $btn .= '<a href="#dataMahasiswaModal" title="Hapus" data-bs-toggle="modal" data-bs-target="#dataMahasiswaModal" data-remote="' . route('mahasiswa.delete', $row->id) . '" data-title="Yakin ingin menghapus ?"><i class="bi bi-trash-fill p-1 text-danger"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('pages.admin.datamahasiswa.index');
        }
        // jika user Mahasiswa ambil satu data
        if (Auth::user()->role == "USER") {
            $item = DataMahasiswa::where('id', Auth::user()->user_id)->first();
            return view('pages.admin.datamahasiswa.index', compact('item'));
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
        $request->validate([
            'kode_pt'        => 'required|numeric',
            'kode_prodi'     => 'required|numeric',
            'npm'            => 'required|numeric|unique:users,username|unique:data_mahasiswas,npm,NULL,id,deleted_at,NULL',
            'nama_mahasiswa' => 'required',
            'no_hp'          => 'required',
            'email'          => 'required|email|unique:users,email|unique:data_mahasiswas,email,NULL,id,deleted_at,NULL',
            'tahun_lulus'    => 'required',
            'nik'            => 'required|numeric|digits:16|unique:data_mahasiswas,nik,NULL,id,deleted_at,NULL',
        ], [
            'required' => ':attribute tidak boleh kosong',
            'numeric'  => ':attribute wajib berupa angka',
            'digits'   => ':attribute wajib berjumlah 16 angka',
            'unique'   => ':attribute sudah terdaftar',
        ]);
        if ($request->npwp) {
            $request->validate([
                'npwp' => 'numeric',
            ], [
                'numeric'  => ':attribute wajib berupa angka',
            ]);
        }
        if ($request->no_hp) {
            $request->validate([
                'no_hp' => 'numeric',
            ], [
                'numeric'  => ':attribute wajib berupa angka',
            ]);
        }

        $dataMHS = DataMahasiswa::create([
            'kode_pt'        => $request->kode_pt,
            'kode_prodi'     => $request->kode_prodi,
            'npm'            => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'no_hp'          => $request->no_hp,
            'email'          => $request->email,
            'tahun_lulus'    => $request->tahun_lulus,
            'nik'            => $request->nik,
            'npwp'           => $request->npwp,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'         => $request->alamat,
        ]);

        User::create([
            'name'     => $request->nama_mahasiswa,
            'username' => $request->npm,
            'email'    => $request->email,
            'password' => Hash::make($request->npm),
            'user_id'  => $dataMHS->id,
            'role'     => 'USER',
            'avatar'   => 'default.svg',
        ]);

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data mahasiswa berhasil ditambah', 'info' => 'Data mahasiswa berhasil ditambah, gunakan npm untuk username & password']);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_mahasiswa' => 'required|mimes:csv|max:10000',
        ], [
            'mimes'    => 'file :attribute harus bertype .csv',
            'required' => 'file :attribute tidak boleh kosong',
            'max'      => ':attribute maksimal :value',
        ]);

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.index')->with('error', $validator->errors()->first());
        }

        try {
            Excel::import(new DataMahasiswaImport, request()->file('data_mahasiswa'));
            return redirect()->route('mahasiswa.index')->with('success', 'Import data berhasil');
        } catch (\Throwable $th) {
            return redirect()->route('mahasiswa.index')->with('error', $th->getMessage());
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        $data = DB::table('data_mahasiswas')->where('deleted_at', null)->count();
        if (!$data == null)
            return Excel::download(new DataMahasiswaExport, 'Data_Mahasiswa.xlsx');
        else
            return redirect()->route('mahasiswa.index')->with('error', 'Data mahasiswa kosong');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(DataMahasiswa $dataMahasiswa, $id)
    {
        $item = DataMahasiswa::findOrFail($id);
        return view('pages.admin.datamahasiswa.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(DataMahasiswa $dataMahasiswa, $id)
    {
        $item = DataMahasiswa::findOrFail($id);
        return view('pages.admin.datamahasiswa.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataMahasiswa $dataMahasiswa, $id)
    {
        //jika user ADMIN
        if (Auth::user()->role == 'ADMIN') {
            $request->validate([
                'kode_pt'        => 'required|numeric',
                'kode_prodi'     => 'required|numeric',
                'npm'            => 'required|numeric|unique:users,username|unique:data_mahasiswas,npm,NULL,id,deleted_at,NULL',
                'nama_mahasiswa' => 'required',
                'no_hp'          => 'required',
                'email'          => 'required|email|unique:users,email|unique:data_mahasiswas,email,NULL,id,deleted_at,NULL',
                'tahun_lulus'    => 'required',
                'nik'            => 'required|numeric|digits:16|unique:data_mahasiswas,nik,NULL,id,deleted_at,NULL',
            ], [
                'required' => ':attribute tidak boleh kosong',
                'numeric'  => ':attribute wajib berupa angka',
                'digits'   => ':attribute wajib berjumlah 16 angka',
                'unique'   => ':attribute sudah terdaftar',
            ]);
            if ($request->npwp) {
                $request->validate([
                    'npwp' => 'numeric',
                ], [
                    'numeric'  => ':attribute wajib berupa angka',
                ]);
            }
            if ($request->no_hp) {
                $request->validate([
                    'no_hp' => 'numeric',
                ], [
                    'numeric'  => ':attribute wajib berupa angka',
                ]);
            }

            $dataMahasiswa = DataMahasiswa::findOrFail($id);
            $datauser = User::where('user_id', $id)->first();
            $dataMahasiswa->kode_pt = $request->kode_pt;
            $dataMahasiswa->kode_prodi = $request->kode_prodi;
            $dataMahasiswa->npm = $request->npm;
            $datauser->username = $request->npm;
            $dataMahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
            $dataMahasiswa->no_hp = $request->no_hp;
            $dataMahasiswa->email = $request->email;
            $datauser->email = $request->email;
            $dataMahasiswa->tahun_lulus = $request->tahun_lulus;
            $dataMahasiswa->nik = $request->nik;
            $dataMahasiswa->npwp = $request->npwp;
            $dataMahasiswa->tempat_lahir = $request->tempat_lahir;
            $dataMahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $dataMahasiswa->alamat = $request->alamat;
            $dataMahasiswa->save();
            $datauser->save();

            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diubah');
        }
        // jika user USER
        elseif (Auth::user()->role == 'USER') {
            $request->validate([
                'nama_mahasiswa' => 'required',
                'tempat_lahir'   => 'required',
                'tanggal_lahir'  => 'required',
                'nik'            => 'required|numeric|digits:16',
            ], [
                'required' => ':attribute tidak boleh kosong',
                'numeric'  => ':attribute wajib berupa angka',
                'digits'   => ':attribute wajib berjumlah 16 angka',
            ]);
            if ($request->npwp) {
                $request->validate([
                    'npwp' => 'numeric',
                ], [
                    'numeric'  => ':attribute wajib berupa angka',
                ]);
            }
            $dataMahasiswa = DataMahasiswa::findOrFail(Auth::user()->user_id);
            $datauser = User::where('user_id', Auth::user()->user_id)->first();
            $dataMahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
            $datauser->name = $request->nama_mahasiswa;
            $dataMahasiswa->tempat_lahir = $request->tempat_lahir;
            $dataMahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $dataMahasiswa->nik = $request->nik;
            $dataMahasiswa->no_hp = $request->no_hp;
            $dataMahasiswa->email = $request->email;
            $datauser->email = $request->email;
            $dataMahasiswa->alamat = $request->alamat;
            if ($request->npwp) {
                $dataMahasiswa->npwp = $request->npwp;
            }
            $dataMahasiswa->save();
            $datauser->save();

            return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil disimpan');
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function delete(DataMahasiswa $dataMahasiswa, $id)
    {
        $item = DataMahasiswa::findOrFail($id);
        return view('pages.admin.datamahasiswa.delete', compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataMahasiswa  $dataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataMahasiswa $dataMahasiswa, $id)
    {
        $dataMahasiswa = DataMahasiswa::findOrFail($id);
        $dataUser      = User::where('user_id', $id)->first();
        $dataMahasiswa->delete();
        $dataUser->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
