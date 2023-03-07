<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Mahasiswa::all();
        return Mahasiswa::select('nama_mahasiswa', 'NIK', 'Alamat')->get();
    }
    public function headings(): array
    {
        return ["nama_mahasiswa", "NIK", 'Alamat'];
    }
}
