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

class PontoExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
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
        return collect($d->dados());
    }

    

    public function headings(): array
    {
        return [
        	'Nome',
        	'Numero funcionario',
        	'Empresa',
        	'Nº de Precenças',
        	'Nº de Faltas',
        	'Salario'
            // '#',
            // 'Numero funcionario',
            // 'Data',
            // 'H/Entrada',
            // 'H/Saida Almoço',
            // 'H/Regresso Almoço',
            // 'H/Saida',
            // 'Status'
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
    //SELECT COUNT(status), f.nome from registro r, funcionario f WHERE r.func_id = 8 AND 8 = f.id AND status = 'ausente'
    // SELECT f.nome, f.id,
//(SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = 'presente') As presencas, 
//(SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = 'ausente')  as ausencias
//FROM funcionario f
    /*
   SELECT f.nome, f.id,
(SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = 'presente') As presencas, 
(SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = 'ausente')  as ausencias,
(SELECT COUNT(func_id)-f.faixa_salarial FROM registro r WHERE r.func_id = f.id AND status = 'ausente')  as salario,
(SELECT COUNT(r.data) FROM registro r WHERE r.func_id = f.id AND r.data BETWEEN '2019-09-01' AND '2019-09-31') as data
FROM funcionario f*/
}
