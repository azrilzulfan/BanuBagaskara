<?php

namespace App\Enums;

enum AspirationPriority: string
{
    case Biasa = 'Biasa';
    case Sedang = 'Sedang';
    case Tinggi = 'Tinggi';

    /**
     * @return array<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
