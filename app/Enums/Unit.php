<?php

namespace App\Enums;

enum Unit: string
{
    case M2 = 'm2';
    case LEMBAR = 'lembar';
    case ROLL = 'roll';
    case KG = 'kg';
    case METER = 'meter';
    case PCS = 'pcs';

    public function label(): string
    {
        return match($this) {
            self::M2 => 'Meter Persegi (m²)',
            self::LEMBAR => 'Lembar',
            self::ROLL => 'Roll',
            self::KG => 'Kilogram (kg)',
            self::METER => 'Meter',
            self::PCS => 'Pcs',
        };
    }

    public static function options(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }
        return $options;
    }
}
