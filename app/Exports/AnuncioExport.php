<?php

namespace App\Exports;

use App\Models\Anuncio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnuncioExport implements FromCollection, WithHeadings
{
    protected $anuncios;

    public function __construct($anuncios)
    {
        $this->anuncios = $anuncios;
    }

    public function collection()
    {
        return $this->anuncios->map(function ($anuncio) {
            return [
                $anuncio->usuario->name,
                $anuncio->titulo,
                $anuncio->descripcion,
                $anuncio->precio . $anuncio->Moneda->nombre,
                $anuncio->fecha_publicacion,
                $anuncio->visitas,
                $anuncio->categoria->nombre,
            ];
        });
    }

    public function headings(): array
    {
        return [           
            'Usuario',
            'Ttulo',
            'Descripción',
            'Precio',
            'Fecha de Publicación',
            'Visitas',
            'Categoría',    
        ];
    }
}
