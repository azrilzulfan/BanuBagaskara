<?php

namespace App\Enums;

enum AspirationStatus: string
{
    case Baru = 'Baru';
    case Ditinjau = 'Ditinjau';
    case Selesai = 'Selesai';

    /**
     * @return array<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function badgeClasses(): string
    {
        return match ($this) {
            self::Baru => 'bg-red-50 text-[#BC0202] border border-red-200',
            self::Ditinjau => 'bg-amber-50 text-amber-800 border border-amber-200',
            self::Selesai => 'bg-emerald-50 text-emerald-800 border border-emerald-200',
        };
    }
}
