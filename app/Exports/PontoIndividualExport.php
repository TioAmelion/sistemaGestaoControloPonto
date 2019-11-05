<?php

namespace App\Exports;

use App\Models\Admin\RegistrarPonto;
use Maatwebsite\Excel\Concerns\FromCollection;

class PontoIndividualExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RegistrarPonto::all();
    }
}
