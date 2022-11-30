<?php

namespace App\Exports;

use App\Models\Kuisioner;
use Maatwebsite\Excel\Concerns\FromCollection;

class KuisionerExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        Kuisioner::all();
    }
}
