<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query="
                INSERT INTO `provinsis` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
                (1,	10000,	'Prov. D.K.I. Jakarta',	NULL,	NULL),
                (2,	20000,	'Prov. Jawa Barat',	NULL,	NULL),
                (3,	50000,	'Prov. Jawa Timur',	NULL,	NULL),
                (4,	90000,	'Prov. Riau',	NULL,	NULL),
                (5,	100000,	'Prov. Jambi',	NULL,	NULL),
                (6,	200000,	'Prov. Sulawesi Tenggara',	NULL,	NULL),
                (7,	210000,	'Prov. Maluku',	NULL,	NULL),
                (8,	320000,	'Prov. Papua Barat',	NULL,	NULL),
                (9,	330000,	'Prov. Sulawesi Barat',	NULL,	NULL),
                (10,	350000,	'Luar Negeri',	NULL,	NULL),
                (11,	300000,	'Prov. Gorontalo',	NULL,	NULL),
                (12,	80000,	'Prov. Sumatera Barat',	NULL,	NULL),
                (13,	180000,	'Prov. Sulawesi Tengah',	NULL,	NULL),
                (14,	190000,	'Prov. Sulawesi Selatan',	NULL,	NULL),
                (15,	270000,	'Prov. Maluku Utara',	NULL,	NULL),
                (16,	280000,	'Prov. Banten',	NULL,	NULL),
                (17,	70000,	'Prov. Sumatera Utara',	NULL,	NULL),
                (18,	170000,	'Prov. Sulawesi Utara',	NULL,	NULL),
                (19,	250000,	'Prov. Papua',	NULL,	NULL),
                (20,	260000,	'Prov. Bengkulu',	NULL,	NULL),
                (21,	40000,	'Prov. D.I. Yogyakarta',	NULL,	NULL),
                (22,	60000,	'Prov. Aceh',	NULL,	NULL),
                (23,	240000,	'Prov. Nusa Tenggara Timur',	NULL,	NULL),
                (24,	110000,	'Prov. Sumatera Selatan',	NULL,	NULL),
                (25,	30000,	'Prov. Jawa Tengah',	NULL,	NULL),
                (26,	290000,	'Prov. Kepulauan Bangka Belitung',	NULL,	NULL),
                (27,	120000,	'Prov. Lampung',	NULL,	NULL),
                (28,	130000,	'Prov. Kalimantan Barat',	NULL,	NULL),
                (29,	340000,	'Prov. Kalimantan Utara',	NULL,	NULL),
                (30,	310000,	'Prov. Kepulauan Riau',	NULL,	NULL),
                (31,	160000,	'Prov. Kalimantan Timur',	NULL,	NULL),
                (32,	230000,	'Prov. Nusa Tenggara Barat',	NULL,	NULL),
                (33,	140000,	'Prov. Kalimantan Tengah',	NULL,	NULL),
                (34,	150000,	'Prov. Kalimantan Selatan',	NULL,	NULL),
                (35,	220000,	'Prov. Bali',	NULL,	NULL);
        ";
        
        DB::insert($query);
    }
}
