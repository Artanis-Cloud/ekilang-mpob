<?php

namespace App\Exports;

use App\Models\RegPelesen;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BuahExport implements FromCollection, WithHeadings
{

    public function headings():array{
        return[
            'No. Lesen',
            'Nama Premis',
            'Emel',
            'No. Telefon',
            'Kod Pegawai',
            'No. Siri',
            'Status e-Kilang',
            'Status e-Stok',
            'Direktori',
            'Prestasi OER'

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RegPelesen::with('pelesen')->where('e_kat', 'PL91')->get();
        // return collect(RegPelesen::getStatus());

    }

    public function map($row): array
    {
        // row will be the attendance and offers will be the relationship
        $pelesen = array();
        foreach ($row->pelesen as $pelesen) {
            $pelesen[] = $pelesen->e_nl.' : '.$pelesen->e_np;
        }


        return [
            $row->e_nl, // attendance->id
            $row->e_kat, // attendance->created_at
            implode(" | ",$pelesen) // list of offers separated with | base on above logic
        ];
    }
}
