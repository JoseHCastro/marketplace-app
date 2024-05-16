<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BitacoraExport implements FromCollection, WithHeadings
{

    protected $bitacoras;

    public function __construct($bitacoras)
    {
        $this->bitacoras = $bitacoras;
    }

    public function collection()
    {
        return $this->bitacoras->map(function ($bitacora) {
            return [
                $bitacora->id,
                $bitacora->usuario,
                $bitacora->hora,
                $bitacora->usuario_afectado,
                $bitacora->evento,
                $bitacora->contexto,
                $bitacora->descripcion,
                $bitacora->origen,
                $bitacora->ip,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Usuario',
            'Hora',
            'Usuario Afectado',
            'Evento',
            'Contexto',
            'Descripción',
            'Origen',
            'IP',
        ];
    }
}
