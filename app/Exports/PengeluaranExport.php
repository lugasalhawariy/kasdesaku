<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengeluaranExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengeluaran::select('id', 'keterangan', 'jumlah', 'created_at', 'updated_at')->get();
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
