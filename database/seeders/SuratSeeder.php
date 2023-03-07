<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surat = Surat::create([
            'no_surat' => '01/MSA/II/202303/1001',
            'judul_surat' => 'contoh surat',
            'isi' => 'ini isi surat',
        ]);
    }
}
