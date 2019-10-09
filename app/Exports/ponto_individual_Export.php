<?php

namespace App\Exports;

use App\Models\Admin\RegistrarPonto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet; 
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ponto_individual_Export implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    public function collection()
    {
        return RegistrarPonto::all();
    }
    */

    public function collection()
    {
    	$d = new RegistrarPonto();
        return collect($d->ponto_individual());
    }

    public function headings(): array
    {
        return [
        	
            '#',
            'Numero funcionario',
            'Data',
            'H/Entrada',
            'H/Saida Almoço',
            'H/Regresso Almoço',
            'H/Saida',
            'Status'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
