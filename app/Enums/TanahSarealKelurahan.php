<?php

namespace App\Enums;

enum TanahSarealKelurahan: string
{
    case Cibadak = 'Cibadak';
    case Kayumanis = 'Kayumanis';
    case Kebonpedes = 'Kebonpedes';
    case Kedungbadak = 'Kedungbadak';
    case Kedungjaya = 'Kedungjaya';
    case Kedungwaringin = 'Kedungwaringin';
    case Kencana = 'Kencana';
    case Mekarwangi = 'Mekarwangi';
    case Sukadamai = 'Sukadamai';
    case Sukaresmi = 'Sukaresmi';
    case TanahSareal = 'Tanah Sareal';

    /**
     * @return array<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
