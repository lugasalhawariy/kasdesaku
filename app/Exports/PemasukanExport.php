<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PemasukanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemasukan::select('id', 'keterangan', 'jumlah', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'keterangan',
            'jumlah',
            'dibuat',
            'diperbarui'
        ];
    }
}
