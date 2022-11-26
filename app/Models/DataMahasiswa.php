<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataMahasiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'kode_pt', 'kode_prodi','npm','nama_mahasiswa','no_hp','email','tahun_lulus',
        'nik','npwp','tempat_lahir','tanggal_lahir','alamat'
    ];
}