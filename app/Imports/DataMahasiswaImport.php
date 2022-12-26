<?php

namespace App\Imports;

use App\Models\DataMahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class DataMahasiswaImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'npm';
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Validator::make($row, [
            'kode_pt'        => 'required|numeric',
            'kode_prodi'     => 'required|numeric',
            'npm'            => 'required|numeric',
            'nama_mahasiswa' => 'required',
            'no_hp'          => 'required',
            'email'          => 'required|email',
            'tahun_lulus'    => 'required',
            'nik'            => 'required|numeric|digits:16',
            'npwp'           => 'nullable|numeric',
        ], [
            'required' => ':attribute tidak boleh kosong',
            'numeric'  => ':attribute wajib berupa angka',
            'digits'   => ':attribute wajib berjumlah 16 angka',
            'unique'   => ':attribute terdeteksi ganda/telah terdaftar',
        ])->validate();

        $data_mahasiswa =  DataMahasiswa::updateOrCreate([
            'kode_pt'        => $row['kode_pt'],
            'kode_prodi'     => $row['kode_prodi'],
            'npm'            => $row['npm'],
            'nama_mahasiswa' => $row['nama_mahasiswa'],
            'no_hp'          => $row['no_hp'],
            'email'          => $row['email'],
            'tahun_lulus'    => $row['tahun_lulus'],
            'nik'            => $row['nik'],
            'npwp'           => $row['npwp'],
        ]);

        User::upsert([
            'name'     => $data_mahasiswa->nama_mahasiswa,
            'username' => $data_mahasiswa->npm,
            'email'    => $data_mahasiswa->email,
            'password' => Hash::make($data_mahasiswa->npm),
            'user_id'  => $data_mahasiswa->id,
            'role'     => 'USER',
            'avatar'   => 'default.svg',
        ], ['username', 'email',], ['name', 'user_id']);

        return $data_mahasiswa;
    }
}
