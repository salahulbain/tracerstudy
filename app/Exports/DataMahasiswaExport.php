<?php

namespace App\Exports;

use App\Models\DataMahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataMahasiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataMahasiswa::select("kode_pt", "kode_prodi", "npm", "nama_mahasiswa", "no_hp", "email", "tahun_lulus", "nik", "npwp", "tanggal_lahir", "tempat_lahir", "alamat")->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["kode_pt", "kode_prodi", "npm", "nama_mahasiswa", "no_hp", "email", "tahun_lulus", "nik", "npwp", "tanggal_lahir", "tempat_lahir", "alamat"];
    }
}
