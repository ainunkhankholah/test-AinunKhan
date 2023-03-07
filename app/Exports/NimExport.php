<?php

namespace App\Exports;

use App\Models\Nim;
use Maatwebsite\Excel\Concerns\FromCollection;

class NimExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nim::all();
    }
}
