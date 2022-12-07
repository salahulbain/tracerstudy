<?php

namespace App\Exports;

use App\Models\Kuisioner;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KuisionerExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kuisioner::all();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return [
            'kdptimsmh',
            'kdpstmsmh',
            'nimhsmsmh',
            'nmmhsmsmh',
            'telpomsmh',
            'emailmsmh',
            'tahun_lulus',
            'nik',
            'npwp',
            'f8',
            'f504',
            'f502',
            'f505',
            'f506',
            'f5a1',
            'f5a2',
            'f1101',
            'f1102',
            'f5b',
            'f5c',
            'f5d',
            'f18a',
            'f18b',
            'f18c',
            'f18d',
            'f1201',
            'f1202',
            'f14',
            'f15',
            'f1761',
            'f1762',
            'f1763',
            'f1764',
            'f1765',
            'f1766',
            'f1767',
            'f1768',
            'f1769',
            'f1770',
            'f1771',
            'f1772',
            'f1773',
            'f1774',
            'f21',
            'f22',
            'f23',
            'f24',
            'f25',
            'f26',
            'f27',
            'f301',
            'f302',
            'f303',
            'f401',
            'f402',
            'f403',
            'f404',
            'f405',
            'f406',
            'f407',
            'f408',
            'f409',
            'f410',
            'f411',
            'f412',
            'f414',
            'f415',
            'f416',
            'f6',
            'f7',
            'f7a',
            'f1001',
            'f1002',
            'f1601',
            'f1602',
            'f1603',
            'f1604',
            'f1605',
            'f1606',
            'f1607',
            'f1608',
            'f1609',
            'f1610',
            'f1611',
            'f1612',
            'f1613',
            'f1614',
        ];
    }
}
